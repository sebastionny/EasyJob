<?php
require_once('controleur/DefaultAction.class.php');
require_once('controleur/LoginAction.class.php');
require_once('controleur/SignInRestoAction.class.php');
require_once('controleur/SignInEmployeAction.class.php');
require_once('controleur/LogoutAction.class.php');
require_once('controleur/ProfilEmployeAction.class.php');
require_once('controleur/ProfilEmployeurAction.class.php');
require_once('controleur/DemadeServiceAction.class.php');
require_once('controleur/DemadeServiceAction.class.php');
require_once('controleur/ContactUsAction.class.php');
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
            case "profilEmploye":
                return new ProfilEmployeAction();
                break;
            case "profilResto":
                return new ProfilEmployeurAction();
                break;
            case "demandeService":
                return new DemadeServiceAction();
                break;
            case "contactUs":
                return new ContactUsAction();
                break;
            default :
                return new DefaultAction();
        }
    }
}
?>
