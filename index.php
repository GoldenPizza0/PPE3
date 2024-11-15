<?php
// création d'une session
session_start();
// inclusion en une seule fois du fichier des fonctions et du modèle
include_once "/modele/authentification.inc.php"; // pour pouvoir utiliser isLoggedOn()
require_once("util/fonctions.inc.php");
require_once("util/class.pdoJardiPlants.inc.php");
// inclusion des vues
include("vues/v_entete.php") ;
include("vues/v_bandeau.php") ;

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

$pdo = PdoJardiPlants::getPdoJardiPlants();	 
switch($uc)
{
	case 'accueil':
		{include("vues/v_accueil.php");break;}
	case 'voirProduits' :
		{include("controleurs/c_voirProduits.php");break;}
	case 'gererPanier' :
		{ include("controleurs/c_gestionPanier.php");break; }
}
include("vues/v_pied.php") ;
?>