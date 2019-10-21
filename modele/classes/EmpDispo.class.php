<?php
/**
 * Description of Service
 *
 * @author Meryem, Amélia, Assia et Sébastien
 */
class EmpDispo{
    private $idEmploye;
    private $sexe;
    private $fonction;
    private $experience;
    private $ville;
    private $jour;
    private $heureDebut;
    private $heureFin;
    //constructeur
  /*  function __construct($idService, $typeService, $date, $heureDebut, $heureFin, $sexe, $remuneration, $description, $experience, $active, $idEmployeur) {
        $this->idService = $idService;
        $this->typeService = $typeService;
        $this->date = $date;
        $this->heureDebut = $heureDebut;
        $this->heureFin = $heureFin;
        $this->sexe = $sexe;
        $this->remuneration = $remuneration;
        $this->description = $description;
        $this->experience = $experience;
        $this->active = $active;
        $this->idEmployeur = $idEmployeur;
    }*/


    function __construct(){
    }

    function getidEmploye() {
        return $this->idEmploye;
    }

    function getFonction() {
        return $this->fonction;
    }

    function getHeureDebut() {
        return $this->heureDebut;
    }

    function getHeureFin() {
        return $this->heureFin;
    }

    function getSexe() {
        return $this->sexe;
    }

    function getExperience() {
        return $this->experience;
    }

    function getVille() {
        return $this->ville;
    }

    function getJour() {
        return $this->experience;
    }

    function setidEmploye() {
       $this->idEmploye = $idEmploye;
    }

 

    function setFonction() {
        $this->fonction = $fonction;
    }

    function setHeureDebut() {
        $this->heureDebut = $heureDebut;
    }

    function setHeureFin() {
        $this->heureFin = $heureFin;
    }

    function setSexe() {
           $this->sexe = $sexe;
    }

    function setExperience() {
         $this->experience = $experience;
    }

    function setVille() {
        $this->ville = $ville;
    }

    function setJour() {
          $this->jour = $jour;
    }
                 
	public function loadFromObject($x)
	{
        $this->idEmploye = $x->idEmploye;
        $this->sexe = $x->sexe;
        $this->fonction = $x->fonction;
        $this->experience = $x->experience;
        $this->ville = $x->ville;
        $this->jour = $x->jour;
        $this->heureDebut = $x->heureDebut;
        $this->heureFin = $x->heureFin;
        
       }	


}
