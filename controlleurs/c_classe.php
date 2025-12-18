<?php 
if (!isset($_REQUEST['action'])) {
    $action = "classe" ;
}
else {
    $action = $_REQUEST['action'] ;
}

switch ($action)
{
    case 'classe' : {
        $prof = prof();   
        require "vues/v_gestionClasse.php" ;
        break ;
    }
    case 'newClasse': {
        $ajouter = newClasse($_POST['nom']);
        if($ajouter == true){
            print'ajouter';
        }else{
            require "vues/v_gestionClasse.php" ;
            break;
        }
            require "vues/v_acceuil.php" ;
        break ;
    }
    case 'modifierClasse': {
        $nom = $_POST['nom'];
        if($nom == ""){
            $nom = nomClass($_POST['id']);
        }
        $modifier = modifierClasse($_POST['id'], $nom, $_POST['prof']);
        if($modifier == true){
            print'modifier';
        }else{
            require "vues/v_gestionClasse.php" ;
            break;
        }
            require "vues/v_acceuil.php" ;
        break ;
    }
    case 'suprimerClasse': {
        $suprimer = supprimerClasse($_POST['id']);
        if($supprimer == true){
            print'suprimer';
        }else{
            require "vues/v_gestionClasse.php" ;
            break;
        }
            require "vues/v_acceuil.php" ;
        break ;
    }
}