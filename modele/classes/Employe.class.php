<?php
/**
 * Description of EmployE
 *
 * @author Meryem, Am?lia, Assia et S?bastien
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
    private $sexe;
    private $adresse;
    private $province;
    private $ville;
    private $codePostal;
    private $idCompte;

    //constructeur

    public function __construct()
    {    }


//    public function __construct($idEmploye, $dateNaissance, $photo, $tel, $fonction, $experience, $qualite, $nomRef, $telRef, $sexe, $adresse, $province, $ville, $codePostal, $idCompte)
//    {
//        $this->idEmploye = $idEmploye;
//        $this->dateNaissance = $dateNaissance;
//        $this->photo = $photo;
//        $this->tel = $tel;
//        $this->fonction = $fonction;
//        $this->experience = $experience;
//        $this->qualite = $qualite;
//        $this->nomRef = $nomRef;
//        $this->telRef = $telRef;
//        $this->sexe = $sexe;
//        $this->adresse = $adresse;
//        $this->province = $province;
//        $this->ville = $ville;
//        $this->codePostal = $codePostal;
//        $this->idCompte = $idCompte;
//    }


    public function getSexe()
    {
        return $this->sexe;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }


    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince($province)
    {
        $this->province = $province;
    }


    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }


    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param mixed $codePostal
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
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
        $this->dateNaissance = $tab["dateNaissance"];
        $this->photo = $tab["photo"];
        $this->tel = $tab["tel"];
        $this->fonction = $tab["fonction"];
        $this->experience = $tab["experience"];
        $this->qualite = $tab["qualite"];
        $this->nomRef = $tab["nomRef"];
        $this->telRef = $tab["telRef"];
        $this->adresse = $tab["adresse"];
        $this->province = $tab["province"];
        $this->ville = $tab["ville"];
        $this->codePostal = $tab["codePostal"];
        $this->sexe = $tab["sexe"];
        $this->idCompte =$tab["idCompte"];
        	}	
	public function loadFromObject($x)
	{
        $this->idEmploye = $x->idEmploye;
        $this->dateNaissance = $x->dateNaissance;
        $this->photo = $x->photo;
        $this->tel = $x->tel;
        $this->fonction = $x->fonction;
        $this->experience =$x->experience;
        $this->qualite = $x->qualite;
        $this->nomRef = $x->nomRef;
        $this->telRef = $x->telRef;
        $this->adresse = $x->adresse;
        $this->province = $x->province;
        $this->ville = $x->ville;
        $this->codePostal = $x->codePostal;
        $this->sexe = $x->sexe;
        $this->idCompte =$x->idCompte;
                
       }	

}