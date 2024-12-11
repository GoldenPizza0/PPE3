<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?uc=connexion","label"=>"Connexion");
$menuBurger[] = Array("url"=>"./?uc=inscription","label"=>"Inscription");

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=connexion","label"=>"Connexion");
$menuBurger[] = Array("url"=>"./?action=inscription","label"=>"Inscription");

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["username"]) && isset($_POST["mdp"])){
    $username=$_POST["username"];
    $mdp=$_POST["mdp"];
    $username=$_POST["username"];
    $mdp=$_POST["mdp"];
}
else
{
    $username="";
    $mdp="";
    $username="";
    $mdp="";
}



// traitement si necessaire des donnees recuperees
login($username,$mdp);
login($username,$mdp);

if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
    include "$racine/controleur/listeContrats.php";
}
else{ // l'utilisateur n'est pas connecté
    $titre = "authentification";
    include "$racine/vue/entete.php";
    include "$racine/vue/vueAuthentification.php";
    include "$racine/vue/pied.php";
}

?>