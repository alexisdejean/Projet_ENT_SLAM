<?php
function verifierIdentification($loginSaisi, $mdpSaisi) {
    require "bdd.php";

    $sql = "SELECT identifiant, mot_de_passe, prenom, nom, role
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

function IncriptionUser($login, $mdp, $nom, $prenom) {
    require "bdd.php";

    $sql = "INSERT INTO user (identifiant, mot_de_passe, nom, prenom, role) 
            VALUES (?, ?, ?, ?, '2')";
    $exec = $bdd->prepare($sql);
    $exec->execute([$login, $mdp, $nom, $prenom]);
    if ($exec) {
        return true;
    }
    return false;
}


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

function ModificationCompte($id, $pseudo, $role, $nom, $prenom, $mdp = null) {
    require "bdd.php"; 

    if ($mdp !== null) {
        $sql = "UPDATE utilisateurs
                SET pseudo = ?, role = ?, nom = ?, prenom = ?, mdp = ?
                WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$pseudo, $role, $nom, $prenom, $mdp, $id]);
    }

    $sql = "UPDATE utilisateurs
            SET pseudo = ?, role = ?, nom = ?, prenom = ?
            WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$pseudo, $role, $nom, $prenom, $id]);
}
    


?>