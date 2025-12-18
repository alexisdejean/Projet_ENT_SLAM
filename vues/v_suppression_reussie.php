
<body style="background-color:#D9D9D9;">


<?php
if (!isset($_SESSION['identifiant']) || $_SESSION['role'] != 0 ) {
    header("Location: index.php");
    exit();
}
?>
<div class="container" style=" border-radius: 1em;margin-left: 12em; border:0.1em solid transparent; margin-top: 2em; background-color: #056FC7">
<h2 style="text-align:center;background-color:white; border-radius:0.1em; padding-left:0.2em; margin-left:0.8em; padding-right:1em; width: 17em;"> VALIDATION SUPPRESSION </h2>
<div class="container-accueil" style="color:black; background-color:white; height:20em; margin-right: 1em; margin-left:1em; border-radius: 1em;margin-bottom:1em;padding:1em; font-size:1.2em;">
<p>Suppression Réussie !</p>
<button onclick="window.location.href='index.php?uc=auth&action=valid_suppresion';">Valider</button>
</div>
</div>

</body>