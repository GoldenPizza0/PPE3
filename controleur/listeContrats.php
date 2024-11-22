<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.contrat.inc.php";
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?uc=ajouterContrat","label"=>"Ajout Contrat");



// recuperation des donnees GET, POST, et SESSION


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
if(getcontrat()!=false){
$listeContrats = getContrat();
}
// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des contrats répertoriés";
include "$racine/vue/entete.php";

include "$racine/vue/v_listeContrats.php";

include "$racine/vue/pied.php";


?>