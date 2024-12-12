<?php
session_start();

include "getRacine.php";
include "$racine/controleur/controleurPrincipal.php";
include_once "$racine/modele/authentification.php"; // pour pouvoir utiliser isLoggedOn()
require_once("modele/class.pdoSteria.inc.php");

if (!isset($_REQUEST['uc']))
    $uc = 'connexion';
else
    $uc = $_REQUEST['uc'];

$pdo = PdoSteria::getPdoSteria();
if ($uc == 'connexion'){
    include("controleur/connexion.php");
}
if (isset($_SESSION['id'])){
    if (isset($_GET["uc"])) {
        $uc = $_GET["uc"];
    } 
    else {
        $uc = "defaut";
    }
    $fichier = controleurPrincipal($uc);
    include "$racine/controleur/$fichier";
}else{
    echo "<br/><b>merci de vous connecter</b>";
}

?>