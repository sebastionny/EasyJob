<?php
require_once('controleur/Action.Interface.php');
require_once('modele/DisponibiliteDAO.class.php');
require_once('modele/EmployeDAO.class.php');
class ProfilEmployeAction implements Action {
    public function execute(){

        if (!ISSET($_SESSION)) session_start();
        if (ISSET($_SESSION["connected"])){

            $disDAO     = new DisponibiliteDAO();
            $empDAO     = new EmployeDAO();
            $compDAO    = new CompteDAO();
            $_SESSION["dispo"]  = $disDAO->findAll();


            if ( ISSET($_REQUEST ["jours"]) == null){
                $_REQUEST ["field_messages"] ["checkedDay"] = "Il faut selectionner le(s) jour(s) pour mettre a jour votre disponibilite";
                return "profilEmploye";
            }
            if (ISSET($_REQUEST ["jours"])) {
                $days = $_REQUEST ["jours"];
                $hours = $_REQUEST["tabHeure"];
                $user       = $compDAO->find($_SESSION["connected"]);
                $objEmplo   = $empDAO->findByIdCompte($user->getIdCompte());

                for ($i=0; $i < sizeof($days); $i++) {
                    $d = $this->today($days[$i]);
                    $hd = $this->hourStartEnd($hours[$days[$i]]);
                    $dispo = new Disponibilite($d,$hd[0],$hd[1],$objEmplo->getIdEmploye());
                    $disDAO->create($dispo);
                }
            }
            return "profilEmploye";
        } else{
            return "connection";
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
}
?>