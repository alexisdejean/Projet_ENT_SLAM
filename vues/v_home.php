<?php
if (!isset($_SESSION['identifiant']) || $_SESSION['role'] != "Administrateur" && $_SESSION['role'] != "Professeur" && $_SESSION['role'] != "Eleve") {
    header("Location: index.php");
    exit();
}
?>

<h1> BRAVO TU AS RÉUSSIS ! <?php echo htmlspecialchars($_SESSION['prenom']) ?> </h1>
<p> Tu es maintenant connecté.e à ton espace personnel. </p>
<p> Ton rôle est <?php echo htmlspecialchars($_SESSION['role']) ;?></p>