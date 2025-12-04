<?php
function verifierIdentification($loginSaisi, $mdpSaisi) {
    require "bdd.php";

    $sql = "SELECT identifiant, mot_de_passe, prenom, nom
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

    $sql = "INSERT INTO user (identifiant, mot_de_passe, nom, prenom) 
            VALUES (?, ?, ?, ?)";
    $exec = $bdd->prepare($sql);
    $exec->execute([$login, $mdp, $nom, $prenom]);
    if ($exec) {
        return true;
    }
    return false;
}
?>