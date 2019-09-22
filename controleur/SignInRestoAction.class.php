<?php
require_once('controleur/Action.Interface.php');
class SignInRestoAction implements Action {
    public function execute(){
       if (!ISSET($_REQUEST["nom"]))
            return "inscriptionResto";
        if (!$this->valide())
        {
            //$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";
            return "inscriptionResto";
        }
	require_once('modele/CompteDAO.class.php');
        $udao = new CompteDAO();
        $compte=new Compte();
		
		$user = $udao->find($_REQUEST["email"]);
		if ($user != null)
			{
				$_REQUEST["field_messages"]["email"] = "l'adresse Courriel est deja AttribuĂ©";	
				return "inscriptionResto";
			}
		$compte->setNom($_REQUEST["nom"]);
		$compte->setPrenom($_REQUEST["prenom"]);
		$compte->setMotDePasse($_REQUEST["motPasse"]);
		$compte->setCourriel($_REQUEST["email"]);
		$compte->setIdCompte(rand(1,10000));
		$compte->setActive(1);
		$compte->setEstEmploye(0);
		
      $udao->create($compte);
 return "connection";
    }
    public function valide()
    {

        $result = true;
        if ($_REQUEST['nom'] == "")
        {
            $_REQUEST["field_messages"]["nom"] = "Entrez votre nom";
            $result = false;
        }
		 if ($_REQUEST['prenom'] == "")
        {
            $_REQUEST["field_messages"]["prenom"] = "Entrez votre prenom";
            $result = false;
        }
		 if ($_REQUEST['email'] == "")
        {
            $_REQUEST["field_messages"]["email"] = "Entrez votre email";
            $result = false;
        }
		 if ($_REQUEST['nomResto'] == "")
        {
            $_REQUEST["field_messages"]["nomResto"] = "Entrez le Nom de Votre Restaurant";
            $result = false;
        }
		 if ($_REQUEST['motPasse'] == "")
        {
            $_REQUEST["field_messages"]["motPasse"] = "Entrez votre Mot de Passe";
            $result = false;
        }
		 if ($_REQUEST['motPasse1'] == "")
        {
            $_REQUEST["field_messages"]["motPasse1"] = "Confirmer Votre Mot de Passe";
            $result = false;
        }else if ($_REQUEST['motPasse1'] !=$_REQUEST['motPasse'])
        {
            $_REQUEST["field_messages"]["motPasse1"] = "Le Mot de Passe est Incorrect";
            $result = false;
        }
        
        return $result;
    }
}
?>