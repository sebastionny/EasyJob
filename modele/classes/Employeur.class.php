<?php
/**
 * Description of EmployeuR
 *
 * @author Meryem, Amélia, Assia et Sébastien
 */
class Employeur{
    private $idEmployeur;
    private $photo;
    private $tel;
    //private $adresse;
    private $idCompte;


    //constructeur
  /*  function __construct($idEmployeur, $photo, $tel, $idCompte) {
        $this->idEmployeur = $idEmployeur;
        $this->photo = $photo;
        $this->tel = $tel;
       // $this->adresse = $adresse;
        $this->idCompte = $idCompte;
    }*/

    function getIdEmployeur() {
        return $this->idEmployeur;
    }

    function getIdCompte() {
        return $this->idCompte;
    }

    function setIdCompte($idCompte) {
        $this->idCompte = $idCompte;
    }

        
    function getPhoto() {
        return $this->photo;
    }

    function getTel() {
        return $this->tel;
    }

  /*  function getAdresse() {
        return $this->adresse;
    }*/

    function setIdEmployeur($idEmployeur) {
        $this->idEmployeur = $idEmployeur;
    }

    
    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

   /* function setAdresse($adresse) {
        $this->adresse = $adresse;
    }*/

        public function loadFromArray($tab)
	{
        $this->idEmployeur = $tab["idEmployeur"];
        $this->photo = $tab["photo"];
        $this->tel = $tab["tel"];
        //$this->adresse = $tab["adresse"];
        $this->idCompte = $tab["idCompte"];
        	}	
	public function loadFromObject($x)
	{
        $this->idEmployeur = $x->idEmployeur;
        $this->photo = $x->photo;
        $this->tel = $x->tel;
       // $this->adresse = $x->adresse;
        $this->idCompte = $x->idCompte;
                
       }	

}