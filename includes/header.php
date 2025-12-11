<nav style="float:left; height:100%; width:8em; background-color:#056FC7; border-top-right-radius:1em; border-top-left-radius: 1em;">
    <ul class="menu"style="list-style-type: none; text-align: center; ">
        <div class="photo_eleve" style="width: 6em; height:4em; margin-bottom: 2em; border-radius:1.2em; background-color:white;"></div>
        <li><a href="index.php">Accueil</a></li>
        <?php if (isset($_SESSION['identifiant'])) {?>
            <li style="margin-bottom:1em; background-color: white; padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;"><a href="index.php?uc=auth">Accueil</a></li>
            <?php if ($_SESSION['role'] == 'Administrateur') { ?>
                <li><a style="margin-top:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;" href="index.php?uc=auth&action=inscription">Ajouter un compte</a></li>
                <li><a style="margin-top:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;" href="index.php?uc=auth&action=modification">Modifier un compte</a></li>
                <li><a style="margin-top:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;" href="index.php?uc=auth&action=inscription">Supprimer un compte</a></li>
                <li><a style="margin-top:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;" href="index.php?uc=auth&action=inscription">Ajouter une classe</a></li>
                <li><a style="margin-top:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;" href="index.php?uc=auth&action=inscription">Modifier une classe</a></li>
                <li><a style="margin-top:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;" href="index.php?uc=auth&action=inscription">Supprimer une classe</a></li>
            <?php } elseif ($_SESSION['role'] == 'Professeur'){ ?>
                <li><a style="margin-top:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;" href="index.php?uc=auth&action=inscription">Ajouter un compte</a></li>
                <li><a style="margin-top:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;" href="index.php?uc=auth&action=inscription">Modifier un compte</a></li>
                <li><a style="margin-top:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;" href="index.php?uc=auth&action=inscription">Supprimer un compte</a></li>
            <?php } else {?>
                <li><a style="margin-top:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;" href="index.php?uc=auth&action=inscription">Voir mes informations</a></li>
            <?php } ?>
            <li><a href="index.php?uc=deconnexion">Se déconnecter</a></li>
        <?php } else{ ?>
            <li style="margin-bottom:1em; background-color: white; padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;"><a href="index.php?uc=auth">Connexion</a></li>

        <?php } ?>
    </ul>
</nav>