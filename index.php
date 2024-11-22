
<link href="modele/cssGeneral.css" rel="stylesheet" type="text/css" /> 
<?php
include "getRacine.php";
include "$racine/controleur/controleurPrincipal.php";
include_once "$racine/modele/authentification.php"; // pour pouvoir utiliser isLoggedOn()
if (isset($_GET["uc"])) {
    $uc = $_GET["uc"];
} 
else {
    $uc = "defaut";
}

$fichier = controleurPrincipal($uc);
include "$racine/controleur/$fichier";
?>