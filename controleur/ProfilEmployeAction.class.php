<?php
require_once('controleur/Action.Interface.php');
require_once('modele/DisponibiliteDAO.class.php');
class ProfilEmployeAction implements Action {
    public function execute(){

        if ( ISSET($_REQUEST ["jours"]) == null){
            $_REQUEST ["field_messages"] ["checkedDay"] = "Il faut selectionner le(s) jour(s) pour mettre a jour votre disponibilite";
            return "profilEmploye";
        }
        if (ISSET($_REQUEST ["jours"])) {
            $days = $_REQUEST ["jours"];
            $hours = $_REQUEST["tabHeure"];

            var_dump($days);
            var_dump($hours);

            for ($i=0; $i < count($days); $i++) {
                $d = $this->today($days[$i]);
                $hd = $hours[$i];
                echo $d;
                echo $hd;
                echo $i ."\n";
            }
        }

        return "profilEmploye";
    }

    public function today($day){
        $res = "";
        if ($day === 0)
            return "lundi";
        if ($day === 1)
            return "mardi";
        if ($day === 2)
            return "mercredi";
        if ($day === 3)
            return "jeudi";
        if ($day === 4)
            return "vendredi";
        if ($day === 5)
            return "samedi";
        if ($day === 6)
            $res = "dimache";
        return $res;
    }
}
?>