                <li><a style="margin-top:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;" href="index.php?uc=auth&action=inscription">Ajouter un compte</a></li>
<nav style="float:left; height:100%; width:10em; background-color:#056FC7; border-top-right-radius:1em; border-top-left-radius: 1em;">
    <ul class="menu"style="margin-right: 1.5em; margin-left:auto; list-style-type: none; text-align: center; ">
        <div class="photo_eleve" style="width: 6em; height:4em; margin-bottom: 2em; border-radius:1.2em; background-color:white;"></div>
        <?php if (isset($_SESSION['identifiant'])) {?>
            <li style="margin-bottom:1em;padding-top:0.2em; background-color: white; padding : auto; border-radius: 1em; height: 1.5em; margin-top: 3em;"><a href="index.php?uc=auth&action=reussis" style=" color: black; text-decoration: none;">Accueil</a></li>
            <?php if ($_SESSION['role'] == 0) { ?>
                <li style="padding-top:0.2em; margin-bottom:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em;"><a href="index.php?uc=auth&action=inscription"style=" color: black; text-decoration: none;">Gérer Profs</a></li>
                <li style=" padding-top:0.2em; margin-bottom:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em;"><a href="index.php?uc=auth&action=modification" style=" color: black; text-decoration: none;">Gérer Élève</a></li>
                <li style=" padding-top:0.2em; margin-bottom:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em;"><a  href="index.php?uc=auth&action=modification" style=" color: black; text-decoration: none;">Gérer Classe</a></li>
                <li style=" padding-top:0.2em; margin-bottom:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em;"><a  href="index.php?uc=auth&action=administration_comptes" style=" color: black; text-decoration: none;">Comptes</a></li>
            <?php } elseif ($_SESSION['role'] == 1){ ?>
                <li style="padding-top:0.2em; margin-bottom:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; "><a  href="index.php?uc=auth&action=inscription" style=" color: black; text-decoration: none;">Gestion Classe</a></li>
                <li style="padding-top:0.2em; margin-bottom:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; "><a href="index.php?uc=auth&action=inscription" style=" color: black; text-decoration: none;">Notes</a></li>
            <?php } else {?>
                <li style="padding-top:0.2em; margin-bottom:1em; background-color: white;padding : auto; border-radius: 1em; height: 1.5em; "><a  href="index.php?uc=auth&action=inscription" style=" color: black; text-decoration: none;">Voir mes notes</a></li>
            <?php } ?>
        <?php } else{ ?>
            <li style="padding-top:0.2em; margin-bottom:1em; background-color: white; padding : auto; border-radius: 1em; height: 1.5em; "><a href="index.php?uc=auth" style=" color: black; text-decoration: none;">Connexion</a></li>
            
        <?php } ?>
    </ul>
</nav>

<?php 
if (isset($_SESSION['identifiant'])) {?>
    <li style="list-style:none;"><a style=" float:right; margin-right:2em; color:white; background-color:#056FC7; text-decoration: none;padding: 0.3em;border-radius: 5em;"href="index.php?uc=deconnexion">Se déconnecter</a></li>
    <li style="list-style:none;"><a style=" float:right; margin-right:2em; color:white; background-color:#056FC7; text-decoration: none;padding: 0.3em;border-radius: 5em;"href="index.php?uc=auth&action=modification">Modifier le compte</a></li>
    
    
    <br>
    <?php } ?>