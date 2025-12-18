<?php 
<<<<<<< HEAD
if (!isset($_REQUEST['action'])) {
    $action = "connexion" ;
}
else {
    $action = $_REQUEST['action'] ;
}
=======
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "auth";
>>>>>>> dfb60f47718c803e0bac04b064269fe1bbb712c1

switch ($action) {
    case 'auth':
        header("Location: vues/v_accueil.php");
        exit();
        break;

    case 'connexion':
        if (isset($_POST['pseudo'], $_POST['mdp'])) {
            $login = $_POST['pseudo'];
            $mdp = $_POST['mdp'];
            $verification = verifierIdentification($login, $mdp);

            if ($verification) {
                $_SESSION['identifiant'] = $verification['identifiant'];
                $_SESSION['prenom'] = $verification['prenom'];
                $_SESSION['id'] = $verification['id_user'];
                $_SESSION['nom'] = $verification['nom'];
                $_SESSION['role'] = $verification['role'];

                header("Location: index.php?uc=auth&action=reussis");
                exit();
            }
        }
        header("Location: index.php?uc=auth&action=auth");
        exit();
        break;

    case 'inscription':
        require "vues/v_inscription.php";
        break;

    case 'valid_inscription':
        if (isset($_POST['pseudo'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $_POST['role'])) {
            $login = $_POST['pseudo'];
            $mdp = password_hash($_POST['mdp'], PASSWORD_ARGON2ID);
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $role = $_POST['role'];
            $listeUser = AfficherLesComptes();
            $identifiants = array_column($listeUser, 'identifiant');
            if (in_array($login,$identifiants)){
                header("Location: index.php?uc=auth&action=inscription");
                exit();
            }
            else{
                if (IncriptionUser($login, $mdp, $nom, $prenom, $role)) {
                    header("Location: index.php?uc=reussis");
                    exit();
                }
            }
            
        }
        header("Location: index.php?uc=auth&action=inscription");
        exit();
        break;

    case 'reussis':
        require "vues/v_home.php";
        break;

    case 'modifier':
        $lesComptes = AfficherLesComptes();
        require "vues/v_admin_comptes.php";
        break;
    

    case 'valid_modification':
        if (isset($_POST['id'], $_POST['identifiant'])) {
            $id = (int)$_POST['id'];
            $pseudo = $_POST['identifiant'];
            
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $role = (int)$_POST['role'];
            $mdp = !empty($_POST['mdp']) ? password_hash($_POST['mdp'], PASSWORD_ARGON2ID) : null;
            $listeUser = AfficherLesComptes();
            $identifiants = array_column($listeUser, 'identifiant');
            if (in_array($pseudo,$identifiants)){
                header("Location: index.php?uc=auth&action=modifier");
                exit();
            }
            if (ModificationCompteAdmin($pseudo, $mdp, $id, $nom, $prenom, $role)) {
                header("Location: index.php?uc=auth&action=administration_comptes");
                exit();
            
            } else {
                header("Location: index.php?uc=auth&action=modifier&id=" . $id);
                exit();
            }
        }
        header("Location: index.php?uc=auth&action=reussis");
        exit();
        break;

<<<<<<< HEAD
}

}
=======
    case 'administration_comptes':
        $lesComptes = AfficherLesComptes();
        require "vues/v_admin_comptes.php";
        break;

    case 'supprimer':
        if (isset($_POST['id'], $_POST['role'])) {
            $idUser = (int)$_POST['id'];
            $roleUser = (int)$_POST['role'];

            if (SupprimerCompte($idUser, $roleUser)) {
                require "vues/v_suppression_reussie.php";
            } else {
                $lesComptes = AfficherLesComptes();
                require "vues/v_admin_comptes.php";
            }
        } else {
            header("Location: index.php?uc=auth&action=administration_comptes");
            exit();
        }
        break;

    case 'valid_suppresion':
        $lesComptes = AfficherLesComptes();
        require "vues/v_admin_comptes.php";
        break;
}
?>
>>>>>>> dfb60f47718c803e0bac04b064269fe1bbb712c1
