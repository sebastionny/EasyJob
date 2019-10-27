<?php
class ProfilEmployeurAction implements Action {
    public function execute(){

        if (!ISSET($_SESSION)) session_start();
        if (ISSET($_SESSION["connected"])){

            $restDAO = new RestaurantDAO();
            $compteDAO = new CompteDAO();
            $employeurDAO = new EmployeurDAO();
            $serviceDAO = new ServiceDAO();         
            $accepteDAO = new AccepteDAO();          

            $compte = $compteDAO->findById($_SESSION["infoCompte"]->getIdCompte());
            $employeur = $employeurDAO->find($_SESSION["infoEmployeur"]->getIdEmployeur());
            $restaurant = $restDAO->find($_SESSION["infoResto"]->getIdRest());
            

            // Elle enregistre la nouvel information du Restaurant
            $this->loadInfoResto($restaurant);
            $restDAO->update($restaurant);

            // Elle enregistre la nouvel information de la compte du employeur
            $this->loadInfoCompteEmployeur($compte , $employeur);
            $compteDAO->update($compte);
            $employeurDAO->update($employeur);

            // Elle vas charger la photo du profil restaurent
            $this->loadPhotoProfilResto($employeur);
            $employeurDAO->update($employeur);

            // Elle va finir la demande de service
            $this->closeDemande($serviceDAO);

            // Elle va accepter ou refusser un employer interesser par une demande et confirme avec courriel.
            $this->changerDemande($serviceDAO, $accepteDAO, $compteDAO, $restDAO );
            
            // Elle donne tous le services qui appartient au Employeur. Dans la table Accepte. Alors Ca veut dire il sont en attends de reponse
            $this->loadServiceEnAttends($serviceDAO, $accepteDAO);
             
            // recuperation d'information en session pour afficher les donnees!
            $_SESSION["infoResto"] = $restaurant;
            $_SESSION["infoEmployeur"] = $employeur;
            $_SESSION["infoCompte"] = $compte;
            

            return "profilResto";
        }
        return "connecter";
    }

    private function closeDemande($serviceDAO){
        if(isset($_REQUEST['closeDemande'])){
            $service = $serviceDAO->find($_REQUEST['idS']);
            $service->setActive(0);
            $serviceDAO->update($service);
            $_REQUEST["field_messages"]["closeDemande"] = "Le ". $_REQUEST['idS'] . " service a été fermé.";

        }
    }
    private function changerDemande($sDAO, $aDAO, $cDAO, $rDAO){
        if(isset($_REQUEST['accepter'])){
            $accepter = $aDAO->find($_REQUEST['idE'],$_REQUEST['idS']);
            $accepter->setFait(1);
            $aDAO->update($accepter);

            $employe = $cDAO->findById($_REQUEST['idEComp']);
            $service = $sDAO->find($_REQUEST['idS']);
            $resto = $rDAO->findByIdEmployeur($service->getIdEmployeur());
                     

            $this->mailRestoEmploye($employe, $service, $resto);
        }
        if(isset($_REQUEST['refuser'])){
            $accepter = $aDAO->find($_REQUEST['idE'],$_REQUEST['idS']);
            $aDAO->delete($accepter);
        }
    }
    private function loadServiceEnAttends($serviceDAO, $accepteDAO){
        $s = $serviceDAO->findAllByIdEmployeurActive($_SESSION["infoEmployeur"]->getIdEmployeur());
        $a = $accepteDAO->findAll();
        
        $idSer = '';
        $infoSerEmp = array(); 
        $emp = array(); 
        
        $_SESSION['mesService'] = array();
        
        foreach($a as $objA){
            foreach($s as $objS){
                if($objA->getIdService() == $objS->getIdService()){
                        $infoSer = array(); 
                        array_push($infoSer, $objS->getIdService());
                        array_push($infoSer, $objS->getDate());
                        array_push($infoSer, $objS->getTypeService());
                        
                        $_SESSION['mesService'][$objA->getIdService()]['i'] = $infoSer;
     
                        $daoEmploye = new EmployeDAO;
                        $e = $daoEmploye->find($objA->getIdEmploye());
                        $daoCompte = new CompteDAO;
                        $c = $daoCompte->findById($e->getIdCompte());

                        if($objA->getIdService() != $idSer) {
                            $infoSerEmp = array(); 
                            $emp = array(); 
                        }

                        array_push($infoSerEmp, $e->getIdEmploye());
                        array_push($infoSerEmp, $c->getPrenom());
                        array_push($infoSerEmp, $c->getNom());
                        array_push($infoSerEmp, $e->getSexe());
                        array_push($infoSerEmp, $e->getVille());
                        array_push($infoSerEmp, $e->getExperience());
                        array_push($infoSerEmp, $e->getQualite());
                        array_push($infoSerEmp, $e->getPhoto());
                        array_push($infoSerEmp, $objA->getFait());
                        array_push($infoSerEmp, $c->getIdCompte());
                        
                        array_push($emp, $infoSerEmp);

                        $idSer =  $objA->getIdService();   // Il faut savoir s'il id existe déjá
                        $_SESSION['mesService'][$objA->getIdService()]['e'] = $emp;
                        $infoSerEmp = array(); 
                }
            }
        }
        
    }
    private function valideInfo($section){
        $result = true;
        switch ($section){
            case 1:
                if(ISSET($_REQUEST['nomResto']) == NULL  || ISSET($_REQUEST['telResto']) == NULL || ISSET($_REQUEST['villeResto']) == NULL  || ISSET($_REQUEST['provinceResto']) == NULL ||
                   $_REQUEST['nomResto'] == ''  || $_REQUEST['telResto'] == '' || $_REQUEST['villeResto'] == ''  || $_REQUEST['provinceResto'] == '' ){
                
                    $_REQUEST["field_messages"]["infoResto"] = "Les champ Nom, Province, Ville, Téléphone sont requises";
                    $result = false;
                } break;
            case 2:
                if(ISSET($_REQUEST['nomEmployeur']) == NULL  || ISSET($_REQUEST['prenomEmployeur']) == NULL || ISSET($_REQUEST['courrielEmployeur']) == NULL  || ISSET($_REQUEST['passEmployeur']) == NULL  ||
                  $_REQUEST['nomEmployeur'] == ''  || $_REQUEST['prenomEmployeur'] == '' || $_REQUEST['courrielEmployeur'] == ''  || $_REQUEST['passEmployeur'] == ''  ){
                    $_REQUEST["field_messages"]["infoEmployeur"] = "Les champ Nom, Prenom, Courriel, Mot de passe et Téléphone sont requises";
                    $result = false;
                } break;

            case 3:
                if( isset($_FILES['photoProfilFile']) && $_FILES['photoProfilFile']['error'] === UPLOAD_ERR_OK){
                    $result = false;
                }break;
        }
        return $result;
    }
    private function loadInfoResto($restaurant){
        if (isset($_REQUEST['loadInfoResto'])){
            if (!$this->valideInfo(1))
            {   return "profilResto";  }
            else {
                $restaurant->setNomRest($_REQUEST["nomResto"]);
                $restaurant->setAdresseRest($_REQUEST["adresseResto"]);
                $restaurant->setProvinceRest($_REQUEST["provinceResto"]);
                $restaurant->setVilleRest($_REQUEST["villeResto"]);
                $restaurant->setCodePostalRest($_REQUEST["codeResto"]);
                $restaurant->setTelRest($_REQUEST["telResto"]);
                $restaurant->setDescRest($_REQUEST["descResto"]);
            }
        }
    }
    private function loadInfoCompteEmployeur($comp, $emp){
        if (isset($_REQUEST['loadInfoCompteResto'])){
            if (!$this->valideInfo(2))
            {   return "profilResto";  }
            else {
                $comp->setNom($_REQUEST["nomEmployeur"]);
                $comp->setPrenom($_REQUEST["prenomEmployeur"]);
                $comp->setCourriel($_REQUEST["courrielEmployeur"]);
                $comp->setMotDePasse($_REQUEST["passEmployeur"]);

                $emp->setTel($_REQUEST["telEmployeur"]);
            }
        }
    }
    private function loadPhotoProfilResto($employeur){
        if (isset($_REQUEST['uploadBtn'])){
            if ($this->valideInfo(3))
            { $_REQUEST["field_messages"]["upPhoto"] = "Il faut choisir une image (.img, .png, .gif).";
                return "profilEmploye";}
            else {
                $fileTmpPath = $_FILES['photoProfilFile']['tmp_name'];
                $fileName = $_FILES['photoProfilFile']['name'];
                $fileSize = $_FILES['photoProfilFile']['size'];
                $fileType = $_FILES['photoProfilFile']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $newFileName = $employeur->getIdEmployeur().'.' . $fileExtension;
                $extention =  array('jpg', 'gif' , 'png');

                if (in_array($fileExtension, $extention)){
                    $upLoadFileDir = 'img/profilResto/';
                    $dest_path = $upLoadFileDir . $newFileName;
                    if (move_uploaded_file($fileTmpPath, $dest_path)){
                        $employeur->setPhoto($dest_path);
                    }else
                        echo `<h1> Ooops, je peux pas placer le fichier</h1>`;
                }else
                    echo `<h1> Telechergement imposible!</h1>`;

                $employeur->setPhoto($upLoadFileDir .$newFileName);
            }
        }
    }
    private function mailRestoEmploye($employe, $service , $resto){
        //var_dump($_SESSION);
        $courriels = $employe->getCourriel() . ' , ' . $_SESSION['connected'];
        $suject = 'EasyJob vous confirme les coordonnées du service! ';
        $msg = '<!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
        </head>
        <body style="font-size: 17px; font-family: Helvetica, sans-serif; color: #41133c;"> 

        <img align="center" alt="Image" border="0" class="center autowidth fullwidth" src="https://tallern.com/clientes/easyjob/img/EMAIL.jpg" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 700px; display: block;" title="Header" width="700">

        <div >
        
            <p style="font-size: 18px;">Hey Salut, <strong>'. $employe->getPrenom() .' </strong> ton service sera à <strong><span style=" color: #ee3168; ">'. $resto->getNomRest() . '<span></strong> </p>
            <p style="font-size: 18px;"> Voici les coordonnées du service à la date '. $service->getDate() .'</p>

        </div>

        <div style="font-size: 18px;" >
        <strong>Prénom et nom employé:</strong> ' . $employe->getPrenom() . ' '. $employe->getNom() .'. <br>
        <strong>Heure de debut:</strong> '. $service->getHeureDebut(). ' H . <br>
        <strong>Heure de fin:</strong> '. $service->getHeureFin(). ' H . <br>
        <strong>Remuneration:</strong> $ '. $service->getRemuneration(). ' . <br>
        <strong>Description:</strong> '. $service->getDescription(). ' H . <br>
        
        </div>

        <div style="font-size: 18px;" >
        <strong>Information du Restaurant</strong> <br><br>
        <strong>Téléphone: </strong>'. $resto->getTelRest(). '. <br>
        <strong>Adresse:</strong> '. $resto->getAdresseRest(). '. <br>
        <strong>Ville:</strong> '. $resto->getVilleRest(). ' . <br>
        <strong>Code Postal:</strong> '. $resto->getCodePostalRest(). ' . <br>
        <strong>Courriel:</strong> ' . $_SESSION['connected'] . ' <br>

        </div>
 
        <div style=" font-size: 18px; line-height: 24px; text-align: left; margin: 0;">
            Merci d avoir utilisé notre service.
        </div>
       
        <img align="center" alt="Image" border="0" class="center autowidth fullwidth" src="https://tallern.com/clientes/easyjob/img/signagure.jpg" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 350px; display: block;" title="Image" width="350">
    

    </body> 
    </html>  ';

        SendEmail::send($msg , $courriels , $suject );
    }
}
?>