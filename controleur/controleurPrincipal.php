<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "listeContrats.php";
    $lesActions["accueil"] = "listeContrats.php";
    $lesActions["GererContrat"] = "listeContrats.php";
    $lesActions["client"] = "c_controleurClients.php";
    $lesActions["detail"] = "d.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["intervenant"] = "c_gererIntervenant.php";
    $lesActions["commercial"] = "c_gererCommercial.php";
    $lesActions["secteur"] = "c_gererSecteur.php";
    $lesActions["intervention"] = "c_gererIntervention.php";

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>