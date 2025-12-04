<?php 
if (!isset($_REQUEST['uc'])) {
    $uc = "accueil" ;
}
else {
    $uc = $_REQUEST['uc'] ;
}

switch ($uc)
{
    case 'auth' : {  
        require "vues/v_login.php" ;
        break ;
    }
    case 'connexion' : {  
        if (isset($_SESSION['id_utilisateur'])) {
            header("Location : vues/v_home.php");
            exit;
        }
        require "vues/v_connexion.php" ;
        break ;
    
    }
    case 'authentification' : { 
        break; 
    }
    case 'inscription' : {  
        
        require "vues/v_inscription.php" ;
        break ;
    
    }   
    case 'valid_inscription' : { 
        require "vues/v_valid_inscription.php" ;
        break; 
    }
}