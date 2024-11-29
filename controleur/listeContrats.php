<?php
// Vérification du fichier en cours d'exécution
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";  // Définir la racine du projet
}

// Inclusion du fichier pour la gestion des contrats
include_once "$racine/modele/bd.contrat.inc.php";

// Définition du menu burger
$menuBurger = array();
$menuBurger[] = array("url" => "./?uc=accueil", "label" => "Liste Contrat");
$menuBurger[] = array("url" => "./?uc=GererContrat", "label" => "Ajout Contrat");



if(getcontrat()!=false){
$listeContrats = getContrat(); 
}


$titre = "Liste des contrats répertoriés";



if (isset($uc) && $uc == "GererContrat") {
    include "$racine/controleur/ajouterContrat.php"; 
}else {
    include "$racine/vue/entete.php";
    include "$racine/vue/v_listeContrats.php";
    include "$racine/vue/pied.php";
}






?>
