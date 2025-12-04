<?php
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
        break ;
    }
}