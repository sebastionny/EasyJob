<?php
/**
 * Description of DisponibilitE
 *
 * @author Meryem, Am�lia, Assia et S�bastien
 */
class Disponibilite{
    private $idDispo;
    private $jour;
    private $heureDebut;
    private $heureFin;
    private $idEmploye;
    //constructeur
    function __construct( ) {
    }

//    function __construct( $jour, $heureDebut, $heureFin, $idEmploye) {
//        $this->jour = $jour;
//        $this->heureDebut = $heureDebut;
//        $this->heureFin = $heureFin;
//        $this->idEmploye = $idEmploye;
//    }
    function getJour() {
        return $this->jour;
    }
    function getIdDispo() {
        return $this->idDispo;
    }

    function getIdEmploye() {
        return $this->idEmploye;
    }

    function setIdDispo($idDispo) {
        $this->idDispo = $idDispo;
    }

    function setIdEmploye($idEmploye) {
        $this->idEmploye = $idEmploye;
    }

    function getHeureDebut() {
        return $this->heureDebut;
    }

    function getHeureFin() {
        return $this->heureFin;
    }

    function setJour($jour) {
        $this->jour = $jour;
    }

    function setHeureDebut($heureDebut) {
        $this->heureDebut = $heureDebut;
    }

    function setHeureFin($heureFin) {
        $this->heureFin = $heureFin;
    }
    public function loadFromArray($tab)
	{
        $this->idDispo = $tab["idDispo"];    
        $this->jour = $tab["jour"];
        $this->heureDebut = $tab["heureDebut"];
        $this->heureFin =$tab["heureFin"];
        $this->idEmploye = $tab["idEmploye"];  
	}	
	public function loadFromObject($x)
	{
        $this->idDispo = $x->idDispo;
        $this->jour = $x->jour;
        $this->heureDebut =$x->heureDebut;
        $this->heureFin =$x->heureFin;
        $this->idEmploye = $x->idEmploye;
	}
    
}