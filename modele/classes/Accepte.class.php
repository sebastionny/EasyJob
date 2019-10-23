<?php

/**
 * Description of CompteDAO.class
 *
 * @author Meryem, Am�lia, Assia et Sebastian
 */
class Accepte{
    private $fait;
    private $etoile;
    private $commentaire;
    private $idService;
    private $idEmploye;
    //constructeur
    /*function __construct($fait, $etoile, $commentaire, $idService, $idEmploye) {
       
        $this->fait = $fait;
        $this->etoile = $etoile;
        $this->commentaire = $commentaire;
        $this->idService = $idService;
        $this->idEmploye = $idEmploye;
    }*/

    function __construct() {
    }
    
    function getFait() {
        return $this->fait;
    }
    function getEtoile() {
        return $this->etoile;
    }

    function getCommentaire() {
        return $this->commentaire;
    }

    function getIdService() {
        return $this->idService;
    }

    function getIdEmploye() {
        return $this->idEmploye;
    }

    function setFait($fait) {
        $this->fait = $fait;
    }

    function setEtoile($etoile) {
        $this->etoile = $etoile;
    }

    function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    function setIdService($idService) {
        $this->idService = $idService;
    }

    function setIdEmploye($idEmploye) {
        $this->idEmploye = $idEmploye;
    }

    public function loadFromArray($tab)
	{
        $this->fait = $tab["fait"];    
        $this->etoile = $tab["etoile"];    
        $this->commentaire =$tab["commentaire"];    
        $this->idService = $tab["idService"];    
        $this->idEmploye = $tab["idEmploye"];    
      	}	
	public function loadFromObject($x)
	{
                
        $this->fait = $x->fait;
        $this->etoile = $x->etoile;
        $this->commentaire =$x->commentaire;
        $this->idService =$x->idService;
        $this->idEmploye = $x->idEmploye;
               }	
}

