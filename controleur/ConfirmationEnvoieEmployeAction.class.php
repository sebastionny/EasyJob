<?php
require_once('controleur/Action.Interface.php');

class ConfirmationEnvoieEmployeAction implements Action{
    public function execute(){

        if (!ISSET($_SESSION)) session_start();
        if (ISSET($_SESSION["connected"])){

            // recuperation d'information en session pour afficher les donnees!
            if(ISSET($_REQUEST['sendDemande'])){
                return "restoConfirmationEnvoieEmploye";
            }

        }
        return "connecter";
  
    }
}