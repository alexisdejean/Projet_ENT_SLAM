<?php
//if (!isset($_SESSION['identifiant'])) {
    //header("Location: index.php");
    //exit();
//}

?>
<h1>Ajouter une classe</h1>
<form method="POST" action="index.php?uc=auth&action=newClasse">
    <label for="nom">Nom de classe</label>
    <input id="nom" name="id" type="text"><br><br>
    <label for="prof">prof asigner</label>
    <select id="prof" name="prof"><?php
        foreach ($prof as $profs) {
            echo '<option value="' . $profs['id_user'] . '">'
               . htmlspecialchars($profs['nom'])
               . '</option>';
        }
        ?></select>
        <button type="submit">Ajouter</button>
</form>
<h1>Modifier une classe</h1>
<form method="POST" action="index.php?uc=auth&action=modifierClasse">
    <label for="id">ID de la classe à modifier</label>
    <input id="id" name="id" type="number"><br><br>
    <label for="nom">Nom de classe</label>
    <input id="nom" name="nom" type="text"><br><br>
    <label for="prof">prof asigner</label>
    <select id="prof" name="prof"><?php
        foreach ($prof as $profs) {
            echo '<option value="' . $profs['id_user'] . '">'
               . htmlspecialchars($profs['nom'])
               . '</option>';
        }
        ?></select>
        <button type="submit">Changer</button>
</form>
<h1>Supprimer une classe</h1>
<form method="POST" action="index.php?uc=auth&action=suprimerClasse">
    <label for="id">Nom de classe</label>
    <input id="id" name="id" type="number"><br><br>
        <button type="submit">Suprimer</button>
</form>