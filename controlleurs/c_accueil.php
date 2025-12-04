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
        require "vues/v_accueil.php" ;
        break ;
    }
}