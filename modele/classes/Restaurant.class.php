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
    private $provinceRest;
    private $villeRest;
    private $codePostalRest;
    //construct

    /**
     * Restaurant constructor.
     * @param $idRest
     * @param $nomRest
     * @param $adresseRest
     * @param $telRest
     * @param $descRest
     * @param $idEmployeur
     * @param $provinceRest
     * @param $villeRest
     * @param $codePostalRest
     */
   /* public function __construct($idRest, $nomRest, $adresseRest, $telRest, $descRest, $idEmployeur, $provinceRest, $villeRest, $codePostalRest)
    {
        $this->idRest = $idRest;
        $this->nomRest = $nomRest;
        $this->adresseRest = $adresseRest;
        $this->telRest = $telRest;
        $this->descRest = $descRest;
        $this->idEmployeur = $idEmployeur;
        $this->provinceRest = $provinceRest;
        $this->villeRest = $villeRest;
        $this->codePostalRest = $codePostalRest;
    }
*/

    public function getProvinceRest()
    {
        return $this->provinceRest;
    }

    /**
     * @param mixed $provinceRest
     */
    public function setProvinceRest($provinceRest)
    {
        $this->provinceRest = $provinceRest;
    }


    public function getVilleRest()
    {
        return $this->villeRest;
    }

    /**
     * @param mixed $villeRest
     */
    public function setVilleRest($villeRest)
    {
        $this->villeRest = $villeRest;
    }


    public function getCodePostalRest()
    {
        return $this->codePostalRest;
    }

    /**
     * @param mixed $codePostalRest
     */
    public function setCodePostalRest($codePostalRest)
    {
        $this->codePostalRest = $codePostalRest;
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
        $this->idRest = $tab["idRest"];
        $this->nomRest = $tab["nomRest"];
        $this->adresseRest = $tab["adresseRest"];
        $this->telRest = $tab["telRest"];
        $this->descRest = $tab["descRest"];
        $this->provinceRest = $tab["provinceRest"];
        $this->villeRest = $tab["villeRest"];
        $this->codePostalRest = $tab["codePostalRest"];
        $this->idEmployeur =$tab["idEmployeur"];
        	}	
	public function loadFromObject($x)
	{
        $this->idRest = $x->idRest;
        $this->nomRest = $x->nomRest;
        $this->adresseRest = $x->adresseRest;
        $this->telRest = $x->telRest;
        $this->descRest = $x->descRest;
        $this->provinceRest = $x->provinceRest;
        $this->villeRest = $x->villeRest;
        $this->codePostalRest = $x->codePostalRest;
        $this->idEmployeur = $x->idEmployeur;
                        
       }	
}

