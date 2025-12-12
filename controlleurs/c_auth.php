<?php 
if (!isset($_REQUEST['action'])) {
    $action = "connexion" ;
}
else {
    $action = $_REQUEST['action'] ;
}

switch ($action)
{
    case 'auth' : {  
        header("location:vues/v_accueil.php") ;
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
                $_SESSION['id'] = $verification['id_user'];
                $_SESSION['nom'] = $verification['nom'];
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
                //InsertionSelonRole($login, $role) ;
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
    case 'modification' : {  
        
        require "vues/v_modifier_compte.php" ;
        break ;
    
    }   
    case 'valid_modification': {

    if (isset($_POST['id'], $_POST['identifiant'], )) {

        $id = $_POST['id'];
        $pseudo = $_POST['identifiant'];
        

        if (!empty($_POST['mdp'])) {
            $mdp = password_hash($_POST['mdp'], PASSWORD_ARGON2ID);
        } else {
            $mdp = null;
        }
        $modif = ModificationCompte($pseudo,$mdp,$id);

        if ($modif) {
            header("Location: index.php?uc=auth&action=reussis");
            exit();
        } else {
            header("Location: index.php?uc=auth&action=modification&id=" . $id);
            exit();
        }

    } else {
        header("Location: index.php?uc=auth&action=reussis");
        exit();
    }
    }
    case 'administration_comptes': {
        $lesComptes = AfficherLesComptes();
        require "vues/v_admin_comptes.php" ;
        break;
    }

}

}