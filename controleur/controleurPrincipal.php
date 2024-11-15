<?php

function controleurPrincipal($actiorn) {
    $lesActions = array();
    $lesActions["defaut"] = "listeContrats.php";
    $lesActions["accueil"] = "listeContrats.php";
    $lesActions["client"] = "c_controleurClients.php&action=voirTableauClientSite";
    $lesActions["detail"] = "d.php";
    $lesActions["recherche"] = "recherche.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";

    if (array_key_exists($actiorn, $lesActions)) {
        return $lesActions[$actiorn];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>