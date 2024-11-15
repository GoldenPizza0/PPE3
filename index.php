<?php
include "getRacine.php";
include "$racine/controleur/controleurPrincipal.php";
include_once "$racine/modele/authentification.php"; // pour pouvoir utiliser isLoggedOn()

if (isset($_GET["action"])) {
    $uc = $_GET["action"];
} 
else {
    $uc = "defaut";
}

$fichier = controleurPrincipal($uc);
include "$racine/controleur/$fichier";
?>