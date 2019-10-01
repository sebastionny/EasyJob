<?php
require_once('controleur/Action.Interface.php');
class SignInEmployeAction implements Action {
    public function execute(){
     if (!ISSET($_REQUEST["nom"]))
            return "inscriptionEmploye";
        if (!$this->valide())
        {
            //$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";
            return "inscriptionEmploye";
        }
	require_once('modele/CompteDAO.class.php');
	require_once('modele/EmployeDAO.class.php');
        $cdao = new CompteDAO();
        $compte=new Compte();
		
		 $edao = new EmployeDAO();
        $emp=new Employe();
		
		$x=rand(1,100000);
		$y=rand(1,100000);
		
		$user = $cdao->find($_REQUEST["email"]);
		if ($user != null)
			{
				$_REQUEST["field_messages"]["email"] = "l'adresse Courriel est deja Attribué";	
				return "inscriptionEmploye";
			}
		$compte->setNom($_REQUEST["nom"]);
		$compte->setPrenom($_REQUEST["prenom"]);
		$compte->setMotDePasse($_REQUEST["motPasse"]);
		$compte->setCourriel($_REQUEST["email"]);
		$compte->setIdCompte($x);
		$compte->setActive(1);
		$compte->setEstEmploye(1);
	    $cdao->create($compte);
		
		$emp->setIdEmploye($y);
		$emp->setIdCompte($x);
		$emp->setVille("");
		$emp->setCodePostal("");
		$emp->setDateNaissance("");
		$emp->setPhoto("");
		$emp->setTel("");
		$emp->setFonction("");
		$emp->setExperience("");
		$emp->setQualite("");
		$emp->setNomRef("");
		$emp->setTelRef("");
		$emp->setSexe("");
		$emp->setAdresse("");
		$emp->setProvince("");
		
		$edao->create($emp);
		
		
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
