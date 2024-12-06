<?php

function controleurPrincipal($action) {
    $lesActions = [
        "defaut" => "connexion.php",
        "accueil" => "listeContrats.php",
        "gererContrat" => "ajouterContrat.php",
        "client" => "c_controleurClients.php",
        "detail" => "d.php",
        "connexion" => "connexion.php",
        "deconnexion" => "deconnexion.php",
        "intervenant" => "c_gererIntervenant.php",
        "Domaine_Technique" => "gererdomaine.php",
        "commercial" => "c_gererCommercial.php",
        "secteur" => "c_gererSecteur.php",
    ];

    return $lesActions[$action] ?? $lesActions["defaut"];
}

?>