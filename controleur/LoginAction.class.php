<?php
require_once('./controleur/Action.Interface.php');
require_once ('./modele/CompteDAO.class.php');

class LoginAction implements Action {
    public function execute()
    {
        if (!ISSET($_REQUEST['username']))
            return "connection";
        if (!$this->valide()){
            return  'connection';
        }

        $userDAO = new CompteDAO();
        $user = $userDAO->find($_REQUEST['username']);
        if($user == NULL){
            $_REQUEST['field_messages']['username'] = 'Utilisateur inexistant.';
            return 'connection';
        }else if($user->getMotDePasse() != $_REQUEST['password']){
            $_REQUEST['field_messages']['password'] = 'Mot de passe incorrect.';
            return 'connection';
        }
        if (!ISSET($_SESSION)) session_start();
        $_SESSION['connected'] = $_REQUEST['username'];

        return 'profilEmploye';
    }

    public function valide()
    {
        $result = true;
        if ($_REQUEST['username'] == "")
        {
            $_REQUEST["field_messages"]["username"] = "Donnez votre nom d'utilisateur";
            $result = false;
        }
        if ($_REQUEST['password'] == "")
        {
            $_REQUEST["field_messages"]["password"] = "Mot de passe obligatoire";
            $result = false;
        }
        return $result;
    }
}
?>