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

function AfficherLesComptes(){
    require "bdd.php";

    $sql = "SELECT nom, prenom, identifiant, role FROM user";
    $request = $bdd->query($sql);
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

?>