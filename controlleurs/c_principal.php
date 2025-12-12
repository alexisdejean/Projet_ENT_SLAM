<?php
if (!isset($_REQUEST['uc'])) {
    $uc = "accueil" ;
}
else {
    $uc = $_REQUEST['uc'] ;
}

switch ($uc)
{
    case 'accueil' : {  include "c_accueil.php" ; break ;}
	case 'auth' : { include "c_auth.php" ; break; }
<<<<<<< HEAD
=======
    case 'deconnexion' : { include "c_deconnexion.php" ; break; }
>>>>>>> dev
}

?>


