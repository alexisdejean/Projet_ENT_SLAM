<?php
if (!isset($_SESSION['identifiant'])) {
    header("Location: index.php");
    exit();
}
?>

<h1> BRAVO TU AS RÉUSSIS ! <?php $_SESSION['prenom'] ?> </h1>
<p> Tu es maintenant connecté.e à ton espace personnel. </p>