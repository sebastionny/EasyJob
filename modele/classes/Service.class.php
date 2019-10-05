<?php
/**
 * Description of Service
 *
 * @author Meryem, Amélia, Assia et Sébastien
 */
class Service{
    private $idService;
    private $typeService;
    private $date;
    private $heureDebut;
    private $heureFin;
    private $sexe;
    private $remuneration;
    private $description;
    private $experience;
    private $active;
    private $idEmployeur;
    //constructeur
    function __construct($idService, $typeService, $date, $heureDebut, $heureFin, $sexe, $remuneration, $description, $experience, $active, $idEmployeur) {
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
    }
    function getIdService() {
        return $this->idService;
    }

    function getTypeService() {
        return $this->typeService;
    }

    function getDate() {
        return $this->date;
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

    function getRemuneration() {
        return $this->remuneration;
    }

    function getDescription() {
        return $this->description;
    }

    function getExperience() {
        return $this->experience;
    }

    function getActive() {
        return $this->active;
    }

    function getIdEmployeur() {
        return $this->idEmployeur;
    }

    function setIdService($idService) {
        $this->idService = $idService;
    }

    function setTypeService($typeService) {
        $this->typeService = $typeService;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setHeureDebut($heureDebut) {
        $this->heureDebut = $heureDebut;
    }

    function setHeureFin($heureFin) {
        $this->heureFin = $heureFin;
    }

    function setSexe($sexe) {
        $this->sexe = $sexe;
    }

    function setRemuneration($remuneration) {
        $this->remuneration = $remuneration;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setExperience($experience) {
        $this->experience = $experience;
    }

    function setActive($active) {
        $this->active = $active;
    }

    function setIdEmployeur($idEmployeur) {
        $this->idEmployeur = $idEmployeur;
    }

 public function loadFromArray($tab)
	{
        $this->idService = $tab["idService"];
        $this->typeService = $tab["typeService"];
        $this->date = $tab["date"];
        $this->heureDebut = $tab["heureDebut"];
        $this->heureFin = $tab["heureFin"];
        $this->sexe = $tab["sexe"];
        $this->remuneration = $tab["remuneration"];
        $this->description = $tab["description"];
        $this->experience = $tab["experience"];
        $this->active = $tab["active"];
        $this->idEmployeur = $tab["idEmployeur"];
        	}
                
	public function loadFromObject($x)
	{
        $this->idService = $x->idService;
        $this->typeService = $x->typeService;
        $this->date = $x->date;
        $this->heureDebut = $x->heureDebut;
        $this->heureFin = $x->heureFin;
        $this->sexe = $x->sexe;
        $this->remuneration = $x->remuneration;
        $this->description = $x->description;
        $this->experience = $x->experience;
        $this->active = $x->active;
        $this->idEmployeur = $x->idEmployeur;
                            
       }	

}
