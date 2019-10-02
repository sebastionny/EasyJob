<?php
// -- Controleur frontal --
require_once('controleur/ActionBuilder.class.php');
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

?>
