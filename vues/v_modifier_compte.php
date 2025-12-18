<?php
if (!isset($_SESSION['identifiant']) || $_SESSION['role'] != 0 && $_SESSION['role'] != 1 && $_SESSION['role'] != 2 ) {
    header("Location: index.php");
    exit();
}
?>
<body style="background-color:#D9D9D9;">
<div class="container" style=" border-radius: 1em;margin-left: 12em; border:0.1em solid transparent; margin-top: 2em; background-color: #056FC7">
<h2 style="text-align:center;background-color:white; border-radius:0.1em; padding-left:0.2em; margin-left:0.8em; padding-right:1em; width: 18em;"> Modification de ton compte, <?php echo htmlspecialchars($_SESSION['prenom']) ?> <?php echo htmlspecialchars($_SESSION['nom']) ?> </h2>    
<div class="container-accueil" style="color:black; background-color:white; height:20em; margin-right: 1em; margin-left:1em; border-radius: 1em;margin-bottom:1em;padding:1em; font-size:1.2em;">
    <p> Tu peux maintenant modifier ton identifiant et ton mot de passe</p>
<form method="post" action="index.php?uc=auth&action=valid_modification">

    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">

    <input type="text" name="identifiant" value="<?php echo $_SESSION['identifiant']; ?>" required>

    

    <input type="password" name="mdp" placeholder="Nouveau mot de passe (laisser vide pour ne pas changer)">

    <button type="submit">Modifier le compte</button>
    
</form>
</div>
</div>
</body>