<?php
    include "getRacine.php";
    include "$racine/controleur/controleurPrincipal.php";
    include_once "$racine/modele/authentification.php"; // pour pouvoir utiliser isLoggedOn()
    require_once("modele/class.pdoEsteria.inc.php");
    
    $pdo = PdoEsteria::getPdoEsteria();	
    if (isset($_GET["uc"]) && isLoggedOn()) {
        $uc = $_GET["uc"];
    } 
    else {
        $uc = "defaut";
    }

    $fichier = controleurPrincipal($uc);
    include "$racine/controleur/$fichier";
?>