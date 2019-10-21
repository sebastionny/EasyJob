<?php
require_once('controleur/Action.Interface.php');
require_once('modele/ServiceDAO.class.php');
require_once('modele/EmployeDAO.class.php');
require_once('modele/CompteDAO.class.php');


class DemandeServiceAction implements Action{
    public function execute(){

        if (!ISSET($_SESSION)) session_start();
        if (ISSET($_SESSION["connected"])){

            $serviceDAO = new ServiceDAO();

            if (isset($_REQUEST['searchEmploye'])){
            
                // recuperation d'information du servis pour l enregristre sur  vue confirmationDemande
                $_SESSION['Service'] = array();
                $_SESSION['Service']['info'] = $this->loadService();
                
                // Il vas rechercher aux employes disponibles, si il la trouve on demande la vue confirmationDemande
                if ($this->employesDispo($serviceDAO))
                    return "confirmationService";
            }
            return "demandeService";
        }
        return "connecter";
    }





    private function employesDispo($servicedao){

        $date = explode(" ", $_REQUEST['txtDateService']);
        $heur = $this->hourStartEnd($_REQUEST['txtHeureDebutFin']);


        $x= $date[0];
        $y= $_REQUEST['txtFonction'];
        $z= (int)$_REQUEST['txtExperience'];
        $a= $_REQUEST['txtVille'];
        $h= (int)$heur[0];
        $e= (int)$heur[1];
    
        if (!$this->valide(1))
        {   return "demandeService";  }
        else {
            
            $user= array();
            $user = $servicedao->findDispo($x,$y,$z-1,$a,$h+1,$e-1);
            $mailsInfo= '';

            $employeDAO = new EmployeDAO();
            $compteDAO = new CompteDAO();

            for($i =0 ; $i < Count($user); $i++){
                $employe = $employeDAO->find($user[$i]->getidEmploye());
                $compte = $compteDAO->findById($employe->getIdCompte());
                $mailsInfo .= $compte->getCourriel().',';
            }
                $mails =  substr($mailsInfo, 0, -1);
                $count=Count($user);

            $_SESSION['Service']['qtDispo']=$count;
            $_SESSION['Service']['courriels']=$mails;
            if ($count!=0)
                return true;
            }
            $_REQUEST["field_messages"]["sendDemande"] = "On n'a pas trouvé d'employés répondant à vous critères. Modifiez-les et lancez encore la recherche.";
        
        return false;
    }

    private function loadService(){
        $s = new Service();
        
        $date = explode(" ", $_REQUEST['txtDateService']);
        $idRandom = rand(1,100000);   
        $heur = $this->hourStartEnd($_REQUEST['txtHeureDebutFin']);

        $s->setIdService($idRandom);
        $s->setTypeService($_REQUEST['txtFonction']);
        $s->setDate($date[1]);
        $s->setHeureDebut((int)$heur[0]);
        $s->setHeureFin((int)$heur[1]);
        $s->setSexe('h');
        $s->setRemuneration($_REQUEST['txtSalaire']);
        $s->setDescription($_REQUEST['txtDescription']);
        $s->setExperience((int)$_REQUEST['txtExperience']);
        $s->setActive(1);
        $s->setIdEmployeur($_SESSION['infoEmployeur']->getIdEmployeur());
        return $s;
    }



    public function valide($section)
    {
        $result = true;
        switch ($section){
            case 1:
                if(ISSET($_REQUEST['nomResto']) == NULL  || ISSET($_REQUEST['telResto']) == NULL || ISSET($_REQUEST['villeResto']) == NULL  || ISSET($_REQUEST['provinceResto']) == NULL ||
                   $_REQUEST['nomResto'] == ''  || $_REQUEST['telResto'] == '' || $_REQUEST['villeResto'] == ''  || $_REQUEST['provinceResto'] == '' ){
                
                    $_REQUEST["field_messages"]["infoResto"] = "Les champ Nom, Province, Ville, Téléphone sont requises";
                    $result = true;    //  ATTENTION IL FAUT CHECHER
                } break;
            
        }
        return $result;
    }

    public function hourStartEnd($hours){
        $hours_arr = explode(";", $hours);
        $res = array( $s = substr($hours_arr[0], 0,-1),
                      $e = substr($hours_arr[1] , 0, -1));
        return $res;
    }
}