
<link href="css/cssGeneral.css" rel="stylesheet" type="text/css" /> 
<?php
include "getRacine.php";
include "$racine/controleur/controleurPrincipal.php";
include_once "$racine/modele/authentification.php"; // pour pouvoir utiliser isLoggedOn()
require_once("modele/class.pdoSteria.inc.php");
$pdo = PdoSteria::getPdoEsteria();
if (isset($_GET["uc"])) {
    $uc = $_GET["uc"];
} 
else {
    $uc = "defaut";
}
$fichier = controleurPrincipal($uc);
include "$racine/controleur/$fichier";

?>