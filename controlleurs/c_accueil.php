<?php
<<<<<<< HEAD
if (!isset($_REQUEST['uc'])) {
    $uc = "afficher" ;
}
else {
    $uc = $_REQUEST['uc'] ;
}

switch ($uc)
{
    case 'afficher' : {  
        require "vues/v_accueil.php" ;
=======
if (!isset($_REQUEST['action'])) {
    $action = "afficher" ;
}
else {
    $action = $_REQUEST['action'] ;
}

switch ($action)
{
    case 'afficher' : {  
        header("location: vues/v_accueil.php") ;
>>>>>>> dev
        break ;
    }
}