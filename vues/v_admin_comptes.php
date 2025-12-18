<?php
if (!isset($_SESSION['identifiant']) || $_SESSION['role'] != 0 ) {
    header("Location: index.php");
    exit();
}
?>

<body style="background-color:#D9D9D9;">

<div class="container" style="border-radius: 1em; margin-left: 12em; border:0.1em solid transparent; margin-top: 2em; background-color: #056FC7">
<a href="index.php?uc=auth&action=inscription" style=" margin-top: 1em;margin-right:2em; float:right; color:black; text-decoration:none; background-color:white; padding:0.5em; border-radius:2em;">Ajouter un utilisateur</a>
    <h2 style="text-align:center; background-color:white; border-radius:0.1em; padding-left:0.2em; margin-left:0.8em; padding-right:1em; width: 10em;">
        Gestion des comptes
    </h2>
    
    <div class="container-accueil" style="display: flex;color:black; background-color:white; margin:1em; border-radius: 1em; padding:1em; font-size:1.2em;">

        <table style="width:100%; border-collapse: collapse; text-align:left;">
            <thead>
                <tr>
                    <th style="padding:0.5em; border-bottom:1px solid #ccc;">Nom</th>
                    <th style="padding:0.5em; border-bottom:1px solid #ccc;">Prénom</th>
                    <th style="padding:0.5em; border-bottom:1px solid #ccc;">Identifiant</th>
                    <th style="padding:0.5em; border-bottom:1px solid #ccc;">Rôle</th>
                    <th style="padding:0.5em; border-bottom:1px solid #ccc;">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($lesComptes as $leCompte): ?>
                <tr>
                    <?php if (isset($_REQUEST['action']) && ($_REQUEST['action'] == 'modifier') && isset($_REQUEST['id']) && ($_REQUEST['id'] == $leCompte['id_user'])): ?>
                        <form action="index.php" method="post">
                            <input type="hidden" name="uc" value="auth">
                            <input type="hidden" name="action" value="valid_modification">
    
                            <input type="hidden" name="id" value="<?= $leCompte['id_user'] ?>">
    
                            <td style="padding:0.5em; border-bottom:1px solid #eee;">
                                <input type="text" name="nom" value="<?= htmlspecialchars($leCompte['nom']) ?>" style="width:100px;">
                            </td>
                            <td style="padding:0.5em; border-bottom:1px solid #eee;">
                                <input type="text" name="prenom" value="<?= htmlspecialchars($leCompte['prenom']) ?>" style="width:100px;">
                            </td>
                            <td style="padding:0.5em; border-bottom:1px solid #eee;">
                                <input type="text" name="identifiant" value="<?= htmlspecialchars($leCompte['identifiant']) ?>" style="width:100px;">
                            </td>
                            <td style="padding:0.5em; border-bottom:1px solid #eee;">
                                <select name="role">
                                    <option value="0" <?= $leCompte['role'] == 0 ? 'selected' : '' ?>>Administrateur</option>
                                    <option value="1" <?= $leCompte['role'] == 1 ? 'selected' : '' ?>>Professeur</option>
                                    <option value="2" <?= $leCompte['role'] == 2 ? 'selected' : '' ?>>Eleve</option>
                                </select>
                            </td>
                            <td style="padding:0.5em; border-bottom:1px solid #eee;">
                                <input type="submit" value="Valider">
                                    
                            </td>
                        </form>

                    <?php else: ?>
                        <td style="padding:0.5em; border-bottom:1px solid #eee;">
                            <?= htmlspecialchars($leCompte['nom']) ?>
                        </td>
                        <td style="padding:0.5em; border-bottom:1px solid #eee;">
                            <?= htmlspecialchars($leCompte['prenom']) ?>
                        </td>
                        <td style="padding:0.5em; border-bottom:1px solid #eee;">
                            <?= htmlspecialchars($leCompte['identifiant']) ?>
                        </td>
                        <td style="padding:0.5em; border-bottom:1px solid #eee;">
                            <?php 
                                if ($leCompte['role'] == 0) echo "Administrateur";
                                elseif ($leCompte['role'] == 1) echo "Professeur";
                                else echo "Eleve";
                            ?>
                        </td>
                        <td style="padding:0.5em; border-bottom:1px solid #eee;">
                            <form action="index.php?uc=auth&action=supprimer" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $leCompte['id_user']; ?>">
                                <input type="hidden" name="role" value="<?= $leCompte['role']; ?>">
                                <?php if ($leCompte['role'] != 0): ?>
                                    <input type="submit" value="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce compte ?');">
                                <?php endif; ?>
                            </form>
                            <form action="index.php?uc=auth&action=modifier" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $leCompte['id_user'] ?>">
                                <input type="submit" value="Modifier">
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>