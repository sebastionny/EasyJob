<?php
require_once('controleur/Action.Interface.php');
require_once('modele/CompteDAO.class.php');
require_once('modele/DisponibiliteDAO.class.php');
require_once('modele/EmployeDAO.class.php');
class LoginAction implements Action
{
    public function execute()
    {

        if (!ISSET ($_REQUEST ["username"])) {
            return "connection";
        }
        if (!$this->valide()) {
            return "connection";
        }
        $udao = new CompteDAO();
        $user = $udao->find($_REQUEST ["username"]);
        if ($user == null) {
            $_REQUEST ["field_messages"] ["username"] = "Utilisateur inexistant";
            return "connection";
        } elseif ($user->getMotDePasse() != $_REQUEST ["password"]) {
            $_REQUEST ["field_messages"] ["password"] = "Mot de passe incorrect";
            return "connection";
        }
            if (!ISSET ($_SESSION))
            session_start();
            $_SESSION ["connected"] = $_REQUEST ["username"];
            if ($user->getEstEmploye() == 1) {
                $_REQUEST["estEmploye"] = true;

                //---- Il aide a chargé la disponibilité si il y a.
                $disDAO     = new DisponibiliteDAO();
                $empDAO     = new EmployeDAO();
                $objEmplo   = $empDAO->findByIdCompte($user->getIdCompte());
                $_SESSION["compteUser"]  = $user;
                $_SESSION["dispo"]  = $disDAO->findEmploye($objEmplo->getIdEmploye());
                // ------------------- fin
                return "profilEmploye";
            } else {
                $_REQUEST ["estEmploye"] = false;
                return "profilResto";
            }
    }


    public function valide()
    {
        $result = true;
        if ($_REQUEST ['username'] == "") {
            $_REQUEST ["field_messages"] ["username"] = "Donnez votre nom d'utilisateur";
            $result = false;
        }
        if ($_REQUEST ['password'] == "") {
            $_REQUEST ["field_messages"] ["password"] = "Donnez votre mot de passe";
            $result = false;
        }
        return $result;
    }

  /*  public function verifierEmploye (){
        $resultE = true;
        require_once('modele/CompteDAO.class.php');
        $udao = new CompteDAO();
        $user = $udao->find($_REQUEST ["username"]);
        if ($user->getEstEmploye()==1){
            $resultE = true;
        }
        else {
            $resultE = false;
        }
        return $resultE;
    }*/
}
?>