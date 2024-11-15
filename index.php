<?php
// création d'une session
session_start();
// inclusion en une seule fois du fichier des fonctions et du modèle
include_once "modele/authentification.php"; // pour pouvoir utiliser isLoggedOn()
require_once("modele/bd.inc.php");
require_once("modele/class.pdoEsteria.inc.php");
// inclusion des vues
include("vue/entete.php") ;

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

$pdo = PdoEsteria::getPdoEsteria();	 
switch($uc)
{
	case 'accueil':
		{include("vues/v_accueil.php");break;}
	case 'client' :
		{include("controleurs/c_controleurClients.php");break;}
	case 'intervenant' :
		{ include("controleurs/c_gestionPanier.php");break; }
}
include("vues/v_pied.php") ;
?>