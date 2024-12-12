<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.php";

// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

// traitement si necessaire des donnees recuperees
if (isset($_SESSION['id'])){
    $identifiant='';
    $mdp='';
    logout();
    session_destroy();
}
else{
    echo "erreur";
}


                

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "authentification";
include "$racine/vue/entete.php";
include "$racine/vue/vueAuthentification.php";
include "$racine/vue/pied.php";

?>