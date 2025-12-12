<?php
?><form method="post" action="index.php?uc=auth&action=valid_inscription">
    <input type="text" name="pseudo" placeholder="Nom d'utilisateur" required>
        <select name="role" required>
        <option value="">--Sélectionner un rôle</option>
        <option value="2">Élève</option>
        <option value="1">Professeur</option>

    </select>
    <input type="password" name="mdp" placeholder="Mot de passe" required>
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prénom" required>

    <button type="submit">S'incrire</button>
</form>
<?php
?>