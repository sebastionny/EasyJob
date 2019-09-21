<?php
/**
 * Description of Restaurant
 *
 * @author Meryem, Amélia, Assia et Sébastien
 */
class Restaurant{
    private $idRest;
    private $nomRest;
    private $adresseRest;
    private $telRest;
    private $descRest;
    private $idEmployeur;
    function __construct($idRest, $nomRest, $adresseRest, $telRest, $descRest, $idEmployeur) {
        $this->idRest = $idRest;
        $this->nomRest = $nomRest;
        $this->adresseRest = $adresseRest;
        $this->telRest = $telRest;
        $this->descRest = $descRest;
        $this->idEmployeur = $idEmployeur;
    }
    function getIdRest() {
        return $this->idRest;
    }

    function getNomRest() {
        return $this->nomRest;
    }

    function getAdresseRest() {
        return $this->adresseRest;
    }

    function getTelRest() {
        return $this->telRest;
    }

    function getDescRest() {
        return $this->descRest;
    }

    function getIdEmployeur() {
        return $this->idEmployeur;
    }

    function setIdRest($idRest) {
        $this->idRest = $idRest;
    }

    function setNomRest($nomRest) {
        $this->nomRest = $nomRest;
    }

    function setAdresseRest($adresseRest) {
        $this->adresseRest = $adresseRest;
    }

    function setTelRest($telRest) {
        $this->telRest = $telRest;
    }

    function setDescRest($descRest) {
        $this->descRest = $descRest;
    }

    function setIdEmployeur($idEmployeur) {
        $this->idEmployeur = $idEmployeur;
    }

        public function loadFromArray($tab)
	{
        $this->idRest = $tab["idRestaurant"];
        $this->nomRest = $tab["nomRestaurant"];
        $this->adresseRest = $tab["adrRestaurant"];
        $this->telRest = $tab["telRestaurant"];
        $this->descRest = $tab["descRestaurant"];
        $this->idEmployeur =$tab["idEmployeur"];
        	}	
	public function loadFromObject($x)
	{
        $this->idRest = $x->idRestaurant;
        $this->nomRest = $x->nomRestaurant;
        $this->adresseRest = $x->adrRestaurant;
        $this->telRest = $x->telRestaurant;
        $this->descRest = $x->descRestaurant;
        $this->idEmployeur = $x->idEmployeur;
                        
       }	
}

