<?php
require_once('controleur/Action.Interface.php');
class DemadeServiceAction implements Action{
    public function execute(){
        return "service";
    }
}