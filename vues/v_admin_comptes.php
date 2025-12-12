<div class="container" style=" border-radius: 1em;margin-left: 12em; border:0.1em solid transparent; margin-top: 2em; background-color: #056FC7">
<h2 style="text-align:center;background-color:white; border-radius:0.1em; padding-left:0.2em; margin-left:0.8em; padding-right:1em; width: 15em;"> BRAVO TU AS RÉUSSIS ! <?php echo htmlspecialchars($_SESSION['prenom']) ?> </h2>
<div class="container-accueil" style=" display:grid;color:black; background-color:white; height:20em; margin-right: 1em; margin-left:1em; border-radius: 1em;margin-bottom:1em;padding:1em; font-size:1.2em;">
<?php foreach($lesComptes as $leCompte): ?>
    <form action="index.php?uc=produits&action=supprimer" method="post">
        <h2><?= htmlspecialchars($leCompte['nom']) ?></h2>
        <input type="hidden" name="id" value="<?= $leCompte['id'] ?>">
        <h5><?= htmlspecialchars($leCompte['prenom']) ?></h5>
        <p><?= htmlspecialchars($leCompte['identifiant']) ?></p>
        <input type="submit" value="Modifier">
    </form>
<?php endforeach; ?>
</div>
</div>
