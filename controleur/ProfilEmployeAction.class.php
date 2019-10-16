<?php
require_once('controleur/Action.Interface.php');
require_once('modele/DisponibiliteDAO.class.php');
require_once('modele/EmployeDAO.class.php');
require_once('modele/CompteDAO.class.php');
class ProfilEmployeAction implements Action {
    public function execute(){

        if (!ISSET($_SESSION)) session_start();
        if (ISSET($_SESSION["connected"])){

            $disDAO     = new DisponibiliteDAO();
            $eDAO       = new EmployeDAO();
            $DAOCompte  = new CompteDAO();


            $employe = $eDAO->findByIdCompte($_SESSION["infoCompte"]->getidCompte());

            if(ISSET($_SESSION['dispo']) && sizeof($_SESSION['dispo']) != 0 && ISSET($_REQUEST['saveDispo'])) {

                $Employe = $_SESSION['dispo'][0];

                // Il enlève tous les registres de la table disponibilité qui appartient à  l'employé
                $disDAO->deleteById($Employe->getIdEmploye());
                $this->dispoNew($disDAO);

            } elseif(ISSET($_REQUEST['saveDispo'])) {
                $this->dispoNew($disDAO);
            }

            if (isset($_REQUEST['mesExperiences'])) {
                if (!$this->valideInfoCompte(1))
                {   return "profilEmploye";}
                else {
                    $employe->setFonction($_REQUEST["fonction"]);
                    $employe->setExperience($_REQUEST["experience"]);
                    $employe->setQualite($_REQUEST["description"] . ' Experience ' .' Information de Mois : ' . $_REQUEST["quantiter"]);
                    $eDAO->update($employe);
                }
            }

            if (isset($_REQUEST['mesReference'])){
                if (!$this->valideInfoCompte(2))
                {   return "profilEmploye";  }
                else {
                    $employe->setNomRef($_REQUEST["nomRef"]);
                    $employe->setTelRef($_REQUEST["telRef"]);
                    $eDAO->update($employe);
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
                    $eDAO->update($employe);
                }
            }

            if (isset($_REQUEST['uploadBtn'])){
                if ($this->valideInfoCompte(4))
                { return "profilEmploye";}
                else {
                    $fileTmpPath = $_FILES['photoProfilFile']['tmp_name'];
                    $fileName = $_FILES['photoProfilFile']['name'];
                    $fileSize = $_FILES['photoProfilFile']['size'];
                    $fileType = $_FILES['photoProfilFile']['type'];
                    $fileNameCmps = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));
                    $newFileName = $employe->getIdEmploye().'.' . $fileExtension;
                    $extention =  array('jpg', 'gif' , 'png');

                    if (in_array($fileExtension, $extention)){
                        $upLoadFileDir = 'img/profil/';
                        $dest_path = $upLoadFileDir . $newFileName;
                        if (move_uploaded_file($fileTmpPath, $dest_path)){
                            $employe->setPhoto($dest_path);
                        }else
                            echo `<h1> Ooops, je peux pas placer le fichier</h1>`;
                    }else
                        echo `<h1> Telechergement imposible!</h1>`;

                    $employe->setPhoto($upLoadFileDir .$newFileName);
                    $eDAO->update($employe);
                }
            }

            $_SESSION["infoCompte"]  = $DAOCompte->findById($_SESSION["infoCompte"]->getIdCompte());
            $_SESSION["infoEmploye"]  = $eDAO->find($employe->getIdEmploye());
            $_SESSION["dispo"]  = $disDAO->findEmploye($employe->getIdEmploye());
            return "profilEmploye";

        } else{
            return "connection";
        }

    }


    public function dispoNew($disDAO){
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
                $disDAO->create($dObj);
                $_SESSION["dispo"]  = $disDAO->findEmploye($objEmplo->getIdEmploye());
            }

        }
    }


    public function today($day){
        $res =  array ("lundi","mardi", "mercredi" , "jeudi" , "vendredi" , "samedi", "dimache");
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
                if(ISSET($_REQUEST['fonction']) == NULL|| ISSET($_REQUEST['quantiter']) == NULL  || ISSET($_REQUEST['description']) == NULL ){
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

}
?>