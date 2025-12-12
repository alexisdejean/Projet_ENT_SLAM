<?php
// Exemple : $utilisateur contient les infos du compte à modifier
// $utilisateur['id'], ['pseudo'], ['role'], ['nom'], ['prenom'], etc.
?>
<div class="container" style=" border-radius: 1em;margin-left: 12em; border:0.1em solid transparent; margin-top: 2em; background-color: #056FC7">
    <div class="container-accueil" style="color:black; background-color:white; height:20em; margin-right: 1em; margin-left:1em; border-radius: 1em;margin-bottom:1em;padding:1em; font-size:1.2em;">
    <p> Tu es maintenant connecté.e à ton espace personnel. </p>
<form method="post" action="index.php?uc=auth&action=valid_modification">

    <!-- Identifiant du compte à modifier -->
    <input type="hidden" name="id" value="<?php echo $utilisateur['id']; ?>">

    <input type="text" name="pseudo" value="<?php echo $utilisateur['pseudo']; ?>" required>

    

    <input type="password" name="mdp" placeholder="Nouveau mot de passe (laisser vide pour ne pas changer)">

    <input type="text" name="nom" value="<?php echo $utilisateur['nom']; ?>" required>

    <input type="text" name="prenom" value="<?php echo $utilisateur['prenom']; ?>" required>

    <button type="submit">Modifier le compte</button>
</form>
</div>
</div>