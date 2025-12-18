<?php
if (!isset($_SESSION['identifiant']) || $_SESSION['role'] != 0) {
    header("Location: ../index.php");
    exit();
}
?>

<div class="container" style="border-radius: 1em; margin-left: 12em; border: 0.1em solid transparent; margin-top: 2em; background-color: #056FC7;">
    <h2 style="text-align:center; background-color:white; border-radius:0.1em; padding-left:0.2em; margin-left:0.8em; padding-right:1em; width: 17em;"> 
        Veuillez gérer vos utilisateurs <?php echo htmlspecialchars($_SESSION['prenom']) ?> <?php echo htmlspecialchars($_SESSION['nom']) ?> 
    </h2>

    <div class="container-accueil" style="color:black; background-color:white; height:20em; margin-right: 1em; margin-left:1em; border-radius: 1em; margin-bottom:1em; padding:1em; font-size:1.2em;">
        <p style="margin-bottom: 15px;">Voici votre interface d'ajout de nouveaux utilisateurs</p>

        <form method="post" action="index.php?uc=auth&action=valid_inscription" style="display: flex; flex-direction: column; gap: 10px; max-width: 400px;">
            
            <div style="display: flex; gap: 10px;">
                <input type="text" name="nom" placeholder="Nom" required style="width: 50%; padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                <input type="text" name="prenom" placeholder="Prénom" required style="width: 50%; padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <input type="text" name="pseudo" placeholder="Nom d'utilisateur" required style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
            
            <select name="role" required style="padding: 5px; border: 1px solid #ccc; border-radius: 4px; background-color: white;">
                <option value="">--Sélectionner un rôle</option>
                <option value="2">Élève</option>
                <option value="1">Professeur</option>
                <option value="0">Administrateur</option>
            </select>
            
            <input type="password" name="mdp" placeholder="Mot de passe" required style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">

            <button type="submit" style="background-color: #056FC7; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; font-weight: bold; width: fit-content; align-self: center; margin-top: 10px;">
                Ajouter
            </button>
        </form>
    </div>
</div>