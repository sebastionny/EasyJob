<?php
require_once('controleur/Action.Interface.php');
class DefaultAction implements Action {
    public function execute(){
        return "default";
    }
}
?>