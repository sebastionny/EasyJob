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

            // Elle va accepter ou refusser un employer interesser par une demande.
            $this->changerDemande($serviceDAO, $accepteDAO);
            
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
    private function changerDemande($sDAO, $aDAO){
        if(isset($_REQUEST['accepter'])){
            $accepter = $aDAO->find($_REQUEST['idE'],$_REQUEST['idS']);
            $accepter->setFait(1);
            $aDAO->update($accepter);
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
}
?>