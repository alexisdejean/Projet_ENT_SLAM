<?php
function verifierIdentification($loginSaisi, $mdpSaisi) {
    require "bdd.php";

    $sql = "SELECT identifiant, mot_de_passe, prenom, nom, role, id_user
            FROM user 
            WHERE identifiant = ?";
    $exec = $bdd->prepare($sql);
    $exec->execute([$loginSaisi]);
    $ligne = $exec->fetch(PDO::FETCH_ASSOC);

    if ($ligne && password_verify($mdpSaisi, $ligne['mot_de_passe'])) {
        return $ligne;
    }
    return false;
}

function IncriptionUser($login, $mdp, $nom, $prenom, $role) {
    require "bdd.php";

    $sql = "INSERT INTO user (identifiant, mot_de_passe, nom, prenom, role) 
            VALUES (?, ?, ?, ?, ?)";
    $exec = $bdd->prepare($sql);
    $exec->execute([$login, $mdp, $nom, $prenom, $role]);
    if ($exec) {
        return true;
    }
    return false;
}

/*
function InsertionSelonRole($login, $role){
    require "bdd.php";
    if ($role == 1){
        $sql = "INSERT INTO prof (identifiant) VALUES (?)" ;
    }
    elseif ($role == 2){
        $sql = "INSERT INTO eleve (identifiant) VALUES (?)" ;
    }
    $exec = $bdd->prepare($sql) ;
    $exec->execute([$login]) ;
    if ($exec){
        return true ;
    }
    return false ;
}
*/
function ModificationCompte($pseudo, $mdp = null, $id) {
    require "bdd.php"; 

    if ($mdp !== null) {
        $sql = "UPDATE user
                SET identifiant = ?, mot_de_passe = ?
                WHERE id_user = ?";
        $stmt = $bdd->prepare($sql);
        return $stmt->execute([$pseudo, $mdp, $id]);
    }

    $sql = "UPDATE user
            SET identifiant = ?
            WHERE id_user = ?";
            
    $stmt = $bdd->prepare($sql);
    return $stmt->execute([$pseudo, $id]);
    
}

function ModificationCompteAdmin($pseudo, $mdp = null, $id, $nom, $prenom, $role) {
    require "bdd.php"; 

    if ($mdp !== null) {
        // Mise à jour avec nouveau mot de passe
        $sql = "UPDATE user
                SET identifiant = ?, mot_de_passe = ?, nom = ?, prenom = ?, role = ?
                WHERE id_user = ?";
        $stmt = $bdd->prepare($sql);
        return $stmt->execute([$pseudo, $mdp, $nom, $prenom, $role, $id]);
    } else {
        // Mise à jour sans toucher au mot de passe
        $sql = "UPDATE user
                SET identifiant = ?, nom = ?, prenom = ?, role = ?
                WHERE id_user = ?";
        $stmt = $bdd->prepare($sql);
        return $stmt->execute([$pseudo, $nom, $prenom, $role, $id]);
    }
}
function AfficherLesComptes(){
    require "bdd.php";

    $sql = "SELECT id_user, nom, prenom, identifiant, role FROM user";
    $request = $bdd->query($sql);
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function SupprimerCompte($idUser, $roleUser) {
    require "bdd.php";
    
    // 1. Supprimer d'abord les données liées (si les tables existent)
    if ($roleUser == 1) { // Prof
        $stmt = $bdd->prepare("DELETE FROM prof WHERE id_prof = ?");
        $stmt->execute([$idUser]);
    } elseif ($roleUser == 2) { // Elève
        /*$stmt = $bdd->prepare("DELETE FROM eleve WHERE id_eleve = ?");
        $stmt->execute([$idUser]);*/
    }

    // 2. Supprimer l'utilisateur principal
    $stmt = $bdd->prepare("DELETE FROM user WHERE id_user = ?");
    $stmt->execute([$idUser]);

    // Retourne true si l'utilisateur a bien été supprimé
    return $stmt->rowCount() > 0;
}


?>