<?php
class ProfilEmployeAction implements Action {
    public function execute(){

        if (!ISSET($_SESSION)) session_start();
        if (ISSET($_SESSION["connected"])){

            $DAODispo     = new DisponibiliteDAO();
            $DAOEmploye   = new EmployeDAO();
            $DAOCompte    = new CompteDAO();
            $DAOService   = new ServiceDAO();
            $DAOAccepte   = new AccepteDAO();
            $DAOEmployeur = new EmployeurDAO();

           
            $employe = $DAOEmploye->findByIdCompte($_SESSION["infoCompte"]->getidCompte());

            if(ISSET($_SESSION['dispo']) && sizeof($_SESSION['dispo']) != 0 && ISSET($_REQUEST['saveDispo'])) {
                $Employe = $_SESSION['dispo'][0];

                // Il enlève tous les registres de la table disponibilité qui appartient à  l'employé
                $DAODispo->deleteById($Employe->getIdEmploye());
                $this->dispoNew($DAODispo);

            } elseif(ISSET($_REQUEST['saveDispo'])) {
                $this->dispoNew($DAODispo);
            }

            if (isset($_REQUEST['mesExperiences'])) {
                if (!$this->valideInfoCompte(1))
                {   return "profilEmploye";}
                else {
                    $employe->setFonction($_REQUEST["fonction"]);
                    $employe->setExperience($_REQUEST["experience"]);
                    $employe->setQualite($_REQUEST["description"]);
                    $DAOEmploye->update($employe);
                }
            }

            if (isset($_REQUEST['mesReference'])){
                if (!$this->valideInfoCompte(2))
                {   return "profilEmploye";  }
                else {
                    $employe->setNomRef($_REQUEST["nomRef"]);
                    $employe->setTelRef($_REQUEST["telRef"]);
                    $DAOEmploye->update($employe);
                }
            }

            if (isset($_REQUEST['monCompte'])){
                if (!$this->valideInfoCompte(3))
                {   return "profilEmploye";}
                else {
                    $compte = $DAOCompte->find($_SESSION["infoCompte"]->getCourriel());
                    $compte->setNom($_REQUEST["nom"]);
                    $compte->setPrenom($_REQUEST["prenom"]);
                    $compte->setCourriel($_REQUEST["courriel"]);
                    $compte->setMotDePasse($_REQUEST["motDePasse"]);

                    $employe->setSexe($_REQUEST["sexeSelect"]);
                    $employe->setDateNaissance($_REQUEST["dateNaissance"]);
                    $employe->setTel($_REQUEST["tel"]);
                    $employe->setAdresse($_REQUEST["adresse"]);
                    $employe->setProvince($_REQUEST["provice"]);
                    $employe->setVille($_REQUEST["ville"]);
                    $employe->setCodePostal($_REQUEST["codePostal"]);

                    $DAOCompte->update($compte);
                    $DAOEmploye->update($employe);
                }
            }

            if (isset($_REQUEST['uploadBtn'])){
                if ($this->valideInfoCompte(4))
                {   $_REQUEST["field_messages"]["upPhoto"] = "Il faut choisir une image (.img, .png, .gif).";                    
                    return "profilEmploye";}
                else {
                    $fileTmpPath = $_FILES['photoProfilFile']['tmp_name'];
                    $fileName = $_FILES['photoProfilFile']['name'];
                    $fileSize = $_FILES['photoProfilFile']['size'];
                    $fileType = $_FILES['photoProfilFile']['type'];
                    $fileNameCmps = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));
                    $newFileName = $employe->getIdEmploye().'.' . $fileExtension;
                    $extention =  array('jpeg', 'jpg', 'gif' , 'png');

                    if (in_array($fileExtension, $extention)){
                        $upLoadFileDir = 'img/profil/';
                        $dest_path = $upLoadFileDir . $newFileName;
                        if (move_uploaded_file($fileTmpPath, $dest_path)){
                            $employe->setPhoto($upLoadFileDir .$newFileName);
                            $DAOEmploye->update($employe);
                        }else
                            echo `<h1> Ooops, je peux pas placer le fichier</h1>`;
                    }else
                        $_REQUEST["field_messages"]["upPhoto"] = "Il faut choisir une image (.img, .png, .gif)."; 
                }
            }
            
            // Il enregistre met a jour le service acepter
            if (isset($_REQUEST['idService'])){

                $s = $DAOService->find($_REQUEST['idService']);
                $a = new Accepte;

                // $this->loadAccepte($a);
                // $DAOAccepte->create($a);
                // $DAOService->update($s);
                
                $r = $DAOEmployeur->find($s->getIdEmployeur()); 
                $c = $DAOCompte->findById($r->getIdCompte());
               
                $msg = '<html> 
                <body style="font-size: 17px; line-height: 14px; font-family: Helvetica, sans-serif; color: #41133c;"> 
    
                <img align="center" alt="Image" border="0" class="center autowidth fullwidth" src="https://tallern.com/clientes/easyjob/img/EMAIL.jpg" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 700px; display: block;" title="Header" width="700">
    
    
                <div >
                    <p style="font-size: 18px;">Hey Salut!,</p>
                    <p style="font-size: 18px;">On a une belle nouvelle pour toi</p>
    
                </div>
    
                <div style="font-size: 18px;" >
                       On a bien trouvé un nouveau candidat pour ton service. <br>
                </div>
    
                <div style="margin-top: 25px; margin-bottom: 25px;">
                    <a href="https://tallern.com/clientes/easyjob?action=profilResto&profil=mesService">
                        <img align="center" alt="Image" border="0" class="center autowidth fullwidth" src="https://tallern.com/clientes/easyjob/img/btnEmploye.jpg" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 150px; display: block;" title="Image" width="150">
                    </a>
                </div>
    
     
                <div style=" font-size: 18px; line-height: 24px; text-align: left; margin: 0;">
                    Bonne nouvelle : ton service est bien demandé ! 
                </div>
               
                <img align="center" alt="Image" border="0" class="center autowidth fullwidth" src="https://tallern.com/clientes/easyjob/img/signagure.jpg" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 350px; display: block;" title="Image" width="350">
            
    
            </body> 
            </html>  ';
                $subject = $c->getPrenom() . ', on a trouvé un employé pour ton restaurant';

                $send = new SendEmail;
                //$send::send(,$c->getCourriel(),);
                               
            }

            
             $_SESSION["infoCompte"]  = $DAOCompte->findById($_SESSION["infoCompte"]->getIdCompte());
             $_SESSION["infoEmploye"]  = $DAOEmploye->find($employe->getIdEmploye());
             $_SESSION["dispo"]  = $DAODispo->findEmploye($employe->getIdEmploye());
             $_SESSION["Service"]  = $this->loadMesServices($DAOService);
            
            return "profilEmploye";

        } else{
            return "connection";
        }

    }

    public function loadAccepte($a){
        
        $a->setIdEmploye( (int)$_SESSION["infoEmploye"]->getIdEmploye());
        $a->setIdService( (int)$_REQUEST['idService']);
        $a->setFait(0);
        $a->setEtoile(4);
        $a->setCommentaire("");
    }

    public function dispoNew($DAODispo){
        $this->valide();
        if (ISSET($_REQUEST ["jours"])) {
            $days = $_REQUEST ["jours"];
            $hours = $_REQUEST["tabHeure"];
            $empDAO = new EmployeDAO();
            $objEmplo = $empDAO->findByIdCompte($_SESSION["infoCompte"]->getidCompte());
            for ($i = 0; $i < sizeof($days); $i++) {
                $d = $this->today($days[$i]);
                $hd = $this->hourStartEnd($hours[$days[$i]]);
                $dObj = new Disponibilite();
                $idRandom = rand(1,100000);
                $dObj->setIdDispo($idRandom);
                $dObj->setJour($d);
                $dObj->setHeureDebut($hd[0]);
                $dObj->setHeureFin($hd[1]);
                $dObj->setIdEmploye($objEmplo->getIdEmploye());
                $DAODispo->create($dObj);
                $_SESSION["dispo"]  = $dObj;
            }

        }
    }

    public function today($day){
        $res =  array ("lundi","mardi", "mercredi" , "jeudi" , "vendredi" , "samedi", "dimanche");
        return $res[$day];
    }

    public function hourStartEnd($hours){
        $hours_arr = explode(";", $hours);
        $res = array( $s = substr($hours_arr[0], 0,-1),
                      $e = substr($hours_arr[1] , 0, -1));
        return $res;
    }

    public function valide(){
        if ( ISSET($_REQUEST ["jours"]) == null){
            $_REQUEST ["field_messages"] ["checkedDay"] = "Il faut selectionner le(s) jour(s) pour mettre a jour votre disponibilite";
            return "profilEmploye";
        }
    }

    public function valideInfoCompte($section){
        $result = true;
        switch ($section){
            case 1:
                if(ISSET($_REQUEST['fonction']) == NULL|| ISSET($_REQUEST['experience']) == NULL  || ISSET($_REQUEST['description']) == NULL ){
                    $_REQUEST["field_messages"]["mesExp"] = "Il faut choisir la fonction et la quantité de mois ou années d'expérience.";
                    $result = false;
                } break;

            case 2:
                if( ($_REQUEST['telRef'] == "") || $_REQUEST['nomRef'] == "") {
                    $_REQUEST ["field_messages"] ["mesRef"] = "Il faut ajouter minumum 1 référence";
                    $result = false;
                }break;

            case 3:
                if(  !isset($_REQUEST['nom']) || !isset($_REQUEST['prenom'])  || !isset($_REQUEST['courriel'])  ||
                     !isset($_REQUEST['motDePasse']) || !isset($_REQUEST['sexeSelect'])  || !isset($_REQUEST['dateNaissance'])  ||
                     !isset($_REQUEST['tel']) || !isset($_REQUEST['adresse'])  || !isset($_REQUEST['provice'])  ||
                     !isset($_REQUEST['ville']) || !isset($_REQUEST['codePostal']) ){
                    $result = false;
                }break;
            case 4:
                if( isset($_FILES['photoProfilFile']) && $_FILES['photoProfilFile']['error'] === UPLOAD_ERR_OK){
                    $result = false;
                }break;
        }
        return $result;
    }

    public function loadMesServices($DAO){
        $fonction   = $_SESSION['infoEmploye']->getFonction();
        $experience = (int)$_SESSION['infoEmploye']->getExperience();
        $active     = 1;
        return $DAO->findServices($fonction, $experience+1 , $active);
    }

    public static function getJour($date){
        $d = strtotime($date);
        switch (date('w', $d)){
            case 0: return "dimanche"; break;
            case 1: return "lundi"; break;
            case 2: return "mardi"; break;
            case 3: return "mercredi"; break;
            case 4: return "jeudi"; break;
            case 5: return "vendredi"; break;
            case 6: return "samedi"; break;
        }  
    }

}
?>