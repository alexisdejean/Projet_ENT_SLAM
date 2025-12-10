<?php 
if (!isset($_REQUEST['action'])) {
    $action = "auth" ;
}
else {
    $action = $_REQUEST['action'] ;
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
                $_SESSION['identifiant'] = $verification['identifiant'] ;
                $_SESSION['prenom'] = $verification['prenom'] ;
                $_SESSION['role'] = $verification['role'] ;
                if ($_SESSION['role'] == '0' || $_SESSION['role'] == '1' || $_SESSION['role'] == '2'){
                    if ($_SESSION['role'] == '0'){
                        $_SESSION['role'] = "Administrateur" ;
                    }
                    elseif ($_SESSION['role'] == '1'){
                        $_SESSION['role'] = "Professeur" ;
                    }
                    else{
                        $_SESSION['role'] = "Eleve" ;
                    }
                    header("Location: index.php?uc=auth&action=reussis") ;
                    exit() ;
                }
                
                else{
                    header("Location: index.php?uc=auth&action=auth") ;
                    exit() ;
                }

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
        if (isset($_POST['pseudo'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $_POST['role'])) {
            $login = $_POST['pseudo'] ;
            $mdp = password_hash($_POST['mdp'], PASSWORD_ARGON2ID) ;
            $nom = $_POST['nom'] ;
            $prenom = $_POST['prenom'] ;
            $role = $_POST['role'] ;
            $inscription = IncriptionUser($login, $mdp, $nom, $prenom, $role);
            if ($inscription){
                InsertionSelonRole($login, $role) ;
                header("Location: index.php?uc=auth") ;
                exit() ;
            }
            else{
                header("Location: index.php?uc=auth&action=inscription") ;
                exit() ;
            }

        }
        else{
            header("Location: index.php?uc=auth&action=inscription") ;
            exit() ;
        }
    }
    case 'reussis' :{
        require "vues/v_home.php" ;
        break;
    }
}