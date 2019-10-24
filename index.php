<?php
// -- Controleur frontal --

require_once('./modele/configs/AutoLoader.class.php');

$action = NULL;
$vue = NULL;
if (ISSET($_REQUEST["action"]))
{
  $action = ActionBuilder::getAction($_REQUEST["action"]);
   }
else
{
    $action = ActionBuilder::getAction("");
}

//On execute l'action du controleur:
$vue = $action->execute();
include_once('vues/'.$vue.'.php');
//include_once('vues/restoEvaluation.php');
?>
