<?php
if (!isset($_REQUEST['action'])) {
    $action = "deconnexion" ;
}
else {
    $action = $_REQUEST['action'] ;
}

switch ($action)
{
    case 'deconnexion' : {  
        require "includes/modele/deconnexion.php" ;
        break ;
    }
}