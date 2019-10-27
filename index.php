<?php
// -- Controleur frontal --

require_once('./modele/configs/AutoLoader.class.php');

$action = NULL;
$vue = NULL;
if (ISSET($_REQUEST["action"]))
{
  $action = ActionBuilder::getAction($_REQUEST["action"]);
  $vue = $action->execute();
   }
else
{
    $action = ActionBuilder::getAction("");
    $vue = $action->execute();
}

if ($action instanceof RequirePRGAction) {
  //La méthode execute() d'une RequirePRGAction doit retourner le nom de l'action de l'action
  //qu'on doit fournir dans le redirect.
  header("Location: ?action=".$vue);
}
else {
  include_once('vues/'.$vue.'.php');
}


// $vue = $action->execute();
// include_once('vues/'.$vue.'.php');

?>
