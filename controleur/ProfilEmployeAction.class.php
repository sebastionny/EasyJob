<?php
require_once('controleur/Action.Interface.php');
require_once('modele/DisponibiliteDAO.class.php');
require_once('modele/EmployeDAO.class.php');
class ProfilEmployeAction implements Action {
    public function execute(){

        if (!ISSET($_SESSION)) session_start();
        if (ISSET($_SESSION["connected"])){
            $disDAO     = new DisponibiliteDAO();
            if(ISSET($_SESSION['dispo']) && sizeof($_SESSION['dispo']) != 0) {

                $Employe = $_SESSION['dispo'][0];

                // Il enlève tous les registres de la table disponibilité qui appartient à  l'employé
                $disDAO->deleteById($Employe->getIdEmploye());
                $this->dispoNew($disDAO);

            } else {
                $this->dispoNew($disDAO);
            }

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

            $objEmplo = $empDAO->findByIdCompte($_SESSION["compteUser"]->getidCompte());
            for ($i = 0; $i < sizeof($days); $i++) {
                $d = $this->today($days[$i]);
                $hd = $this->hourStartEnd($hours[$days[$i]]);
                $dObj = new Disponibilite();
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
}
?>