<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.php";


// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["username"]) && isset($_POST["mdp"])){
    $username=$_POST["username"];
    $mdp=$_POST["mdp"];
}
else
{
    $username="";
    $mdp="";
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees
login($username,$mdp);

if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
    //include "$racine/controleur/monProfil.php";
}
else{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    $titre = "authentification";
    include "$racine/vue/entete.php";
    include "$racine/vue/vueAuthentification.php";
    include "$racine/vue/pied.php";
}

?>