<?php
/**
 * Description of CompteDAO.class
 *
 * @author Meryem, Am�lia, Assia et S�bastien
 */
class Compte{
    private $idCompte;
    private $nom;
    private $prenom;
    private $motDePasse;
    private $courriel;
    private $active;
    private $estEmploye;


    public function getEstEmploye()
    {
        return $this->estEmploye;
    }

    public function setEstEmploye($estEmploye)
    {
        $this->estEmploye = $estEmploye;
    }

    //constructeur
  /*  function __construct($idCompte, $nom, $prenom, $motDePasse, $courriel, $active, $estEmploye) {
        $this->idCompte = $idCompte;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->motDePasse = $motDePasse;
        $this->courriel = $courriel;
        $this->active = $active;
        $this->estEmploye = $estEmploye;
    }*/
    function getIdCompte() {
        return $this->idCompte;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getMotDePasse() {
        return $this->motDePasse;
    }

    function getCourriel() {
        return $this->courriel;
    }

    function getActive() {
        return $this->active;
    }

    function setIdCompte($idCompte) {
        $this->idCompte = $idCompte;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
    }

    function setCourriel($courriel) {
        $this->courriel = $courriel;
    }

    function setActive($active) {
        $this->active = $active;
    }

        public function loadFromArray($tab)
	{
        $this->idCompte = $tab["idCompte"];
        $this->nom =$tab["nom"];
        $this->prenom = $tab["prenom"];
        $this->motDePasse = $tab["motDePasse"];
        $this->courriel = $tab["courriel"];
        $this->active = $tab["active"];
        $this->estEmploye = $tab ["estEmploye"];
	}
       
	public function loadFromObject($x)
	{
        $this->idCompte = $x->idCompte;
        $this->nom =$x->nom;
        $this->prenom = $x->prenom;
        $this->motDePasse = $x->motDePasse;
        $this->courriel =$x->courriel;
        $this->active =$x->active;
        $this->estEmploye =$x->estEmploye;
	}	

}