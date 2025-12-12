<?php
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
        break ;
    }
}