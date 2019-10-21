<?php
require_once('controleur/Action.Interface.php');

spl_autoload_register(function ($class_name) {
    if (file_exists('./controleur/'.$class_name . '.class.php')) {
        require_once './controleur/'.$class_name . '.class.php';
        return true;
    }
    return false; 
});

spl_autoload_register(function ($class_name) {
    if (file_exists('./modele/classes/'.$class_name . '.class.php')) {
        require_once './modele/classes/'.$class_name . '.class.php';
        return true;
    }
    return false; 
});

spl_autoload_register(function ($class_name) {
    if (file_exists('./modele/'.$class_name . '.class.php')) {
        require_once './modele/'.$class_name . '.class.php';
        return true;
    }
    return false; 
});



?>
