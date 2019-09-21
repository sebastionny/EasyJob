<?php
require_once('/controleur/DefaultAction.class.php');
require_once('/controleur/LoginAction.class.php');
require_once('/controleur/SignInRestoAction.class.php');
require_once('/controleur/SignInEmployeAction.class.php');
require_once('/controleur/LogoutAction.class.php');

class ActionBuilder{
    public static function getAction($nomAction){
        switch ($nomAction)
        {
            case "connecter" :
                return new LoginAction();
                break;
            case "singInResto":
                return new SignInRestoAction();
                break;
            case "singInEmploye":
                return new SignInEmployeAction();
                break;
            case "logout":
                return new LogoutAction();
                break;
            default :
                return new DefaultAction();
        }
    }
}
?>
