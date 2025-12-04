<?php

$PARAM_hote='localhost';
$PARAM_port='';
$PARAM_nom_bd='bdd_ent';
$PARAM_utilisateur='root';
$PARAM_mot_passe='';

try
{
    $bdd = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
    $bdd->exec("SET CHARACTER SET utf8");
}
 
catch(Exception $e)
{
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
}
?>
