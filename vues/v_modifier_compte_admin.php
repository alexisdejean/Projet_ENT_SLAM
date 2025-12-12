<?php
// Exemple : _SESSION contient les infos du compte à modifier
// _SESSION['id'], ['pseudo'], ['role'], ['nom'], ['prenom'], etc.
?>

<form method="post" action="index.php?uc=auth&action=valid_modification">

    <!-- Identifiant du compte à modifier -->

    <input type="text" name="pseudo" value="<?php echo $_SESSION['identifiant']; ?>" required>

    <select name="role" required>
        <option value="">--Sélectionner un rôle</option>
        <option value="2" <?php if ($_SESSION['role'] == 2) echo 'selected'; ?>>Élève</option>
        <option value="1" <?php if ($_SESSION['role'] == 1) echo 'selected'; ?>>Professeur</option>
        <option value="2" <?php if ($_SESSION['role'] == 0) echo 'selected'; ?>>Administrateur</option>
    </select>

    <input type="password" name="mdp" placeholder="Nouveau mot de passe (laisser vide pour ne pas changer)">


    <button type="submit">Modifier le compte</button>
</form>
