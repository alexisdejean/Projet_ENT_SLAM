<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <?php if (!isset($_SESSION['identifiant'])) {?>
        <li><a href="index.php?uc=auth">Se connecter</a></li>
        <li><a href="index.php?uc=auth&action=inscription">S'inscrire</a></li>
        <?php } else{ ?>
        <li><a href="index.php?uc=deconnexion">Se déconnecter</a></li>
        <?php } ?>
    </ul>
</nav>