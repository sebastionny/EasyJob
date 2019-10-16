<?php
require_once('controleur/Action.Interface.php');
require_once('modele/ServiceDAO.class.php');

class LanceServiceAction implements Action{
    public function execute(){

        if (!ISSET($_SESSION)) session_start();
        if (ISSET($_SESSION["connected"])){

            $serviceDAO = new ServiceDAO();
        
            // Il enregistre la nouvel information du Restaurant
            $serviceDAO->create($this->loadService());

            // recuperation d'information en session pour afficher les donnees!
            $_SESSION["infoService"] = $this->loadService();
            return "restoConfirmationEnvoieDemande";

        }
        return "connecter";
  
    }

    private function loadService(){
        $s = new Service();

        $idRandom = rand(1,100000);   
        $s->setIdService($idRandom);
        $s->setTypeService('Cuisinier');
        $s->setDate('2019-10-14');
        $s->setHeureDebut(22);
        $s->setHeureFin(23);
        $s->setSexe('h');
        $s->setRemuneration(15);
        $s->setDescription('Cest la description du service');
        $s->setExperience(3);
        $s->setActive(1);
        return $s;
    }
}