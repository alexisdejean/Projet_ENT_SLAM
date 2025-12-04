<?php 
if (!isset($_REQUEST['action'])) {
    $action = "auth" ;
}
else {
    $uc = $_REQUEST['action'] ;
}

switch ($action)
{
    case 'auth' : {  
        require "vues/v_login.php" ;
        break ;
    }
    case 'connexion' : {  
        if (isset($_POST['pseudo'], $_POST['mdp'])) {
            $login = $_POST['pseudo'] ;
            $mdp = $_POST['mdp'] ;
            $verification = verifierIdentification($login, $mdp) ;
            if ($verification){
                $_SESSION['identifiant'] = $verifcation['identifiant'] ;
                $_SESSION['prenom'] = $verifcation['prenom'] ;
                header("Location: vues/reussis.php") ;
                exit() ;
            }
            else {
                header("Location: index.php?uc=auth&action=auth") ;
            }
        }
        else{
            header("Location: index.php?uc=auth&action=auth") ;
            exit() ;
        }

    }
    case 'inscription' : {  
        
        require "vues/v_inscription.php" ;
        break ;
    
    }   
    case 'valid_inscription' : { 

        require "vues/v_valid_inscription.php" ;
        break; 
    }
    case 'reussis' :{
        require "vues/v_home.php" ;
        break;
    }
}