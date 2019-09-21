<?php
/**
 * Description of EmployE
 *
 * @author Meryem, Amélia, Assia et Sébastien
 */
class Employe{
    private $idEmploye;
    private $dateNaissance;
    private $photo;
    private $tel;
    private $fonction;
    private $experience;
    private $qualite;
    private $nomRef;
    private $telRef;
    private $idCompte;
    //constructeur
    function __construct($idEmploye, $dateNaissance, $photo, $tel, $fonction, $experience, $qualite, $nomRef, $telRef, $idCompte) {
        $this->idEmploye = $idEmploye;
        $this->dateNaissance = $dateNaissance;
        $this->photo = $photo;
        $this->tel = $tel;
        $this->fonction = $fonction;
        $this->experience = $experience;
        $this->qualite = $qualite;
        $this->nomRef = $nomRef;
        $this->telRef = $telRef;
        $this->idCompte = $idCompte;
    }
    function getIdEmploye() {
        return $this->idEmploye;
    }

    function getDateNaissance() {
        return $this->dateNaissance;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getTel() {
        return $this->tel;
    }

    function getFonction() {
        return $this->fonction;
    }

    function getExperience() {
        return $this->experience;
    }

    function getQualite() {
        return $this->qualite;
    }

    function getNomRef() {
        return $this->nomRef;
    }

    function getTelRef() {
        return $this->telRef;
    }

    function getIdCompte() {
        return $this->idCompte;
    }

    function setIdEmploye($idEmploye) {
        $this->idEmploye = $idEmploye;
    }

    function setDateNaissance($dateNaissance) {
        $this->dateNaissance = $dateNaissance;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setFonction($fonction) {
        $this->fonction = $fonction;
    }

    function setExperience($experience) {
        $this->experience = $experience;
    }

    function setQualite($qualite) {
        $this->qualite = $qualite;
    }

    function setNomRef($nomRef) {
        $this->nomRef = $nomRef;
    }

    function setTelRef($telRef) {
        $this->telRef = $telRef;
    }

    function setIdCompte($idCompte) {
        $this->idCompte = $idCompte;
    }

        public function loadFromArray($tab)
	{
        $this->idEmploye = $tab["idEmploye"];
        $this->dateNaissance = $tab["dateNais"];
        $this->photo = $tab["photo"];
        $this->tel = $tab["tel"];
        $this->fonction = $tab["fonction"];
        $this->experience = $tab["experience"];
        $this->qualite = $tab["qualite"];
        $this->nomRef = $tab["nomRef"];
        $this->telRef = $tab["telRef"];
        $this->idCompte =$tab["idCompte"];
        	}	
	public function loadFromObject($x)
	{
        $this->idEmploye = $x->idEmploye;
        $this->dateNaissance = $x->dateNais;
        $this->photo = $x->photo;
        $this->tel = $x->tel;
        $this->fonction = $x->fonction;
        $this->experience =$x->experience;
        $this->qualite = $x->qualite;
        $this->nomRef = $x->nomRef;
        $this->telRef = $x->telRef;
        $this->idCompte =$x->idCompte;
                
       }	

}