<?php
require_once('./controleur/DefaultAction.class.php');
require_once('./controleur/LoginAction.class.php');
require_once('./controleur/ProfilRestoAction.class.php');
require_once('./controleur/ProfilEmployeAction.class.php');

class ActionBuilder{
    public static function getAction($nomAction){
        switch ($nomAction)
        {
            case "connecter" :
                return new LoginAction();
                break;

            case "profilResto" :
                return new ProfilRestoAction();
                break;

            case "profilEmploye" :
                return new ProfilEmployeAction();
                break;

            default :
                return new DefaultAction();
        }
    }
}
?>
