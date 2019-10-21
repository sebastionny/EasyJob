<?php

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
                return new DemandeServiceAction();
                break;
            case "confirmationService":
                return new ConfirmationServiceAction();
                break;
            case "restoConfirmationEnvoieEmploye":
                return new ConfirmationEnvoieEmployeAction();
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
