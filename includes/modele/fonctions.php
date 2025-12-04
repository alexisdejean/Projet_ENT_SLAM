<?php
function verifierIdentification($loginSaisi, $mdpSaisi) {
    require "bdd.php";

    $sql = "SELECT identifiant, mdp, prenom
            FROM user 
            WHERE identifiant = ?";
    $exec = $bdd->prepare($sql);
    $exec->execute([$loginSaisi]);
    $ligne = $exec->fetch(PDO::FETCH_ASSOC);

    if ($ligne && password_verify($mdpSaisi, $ligne['mdp'])) {
        return $ligne;
    }
    return false;
}
?>