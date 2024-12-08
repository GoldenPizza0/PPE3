<?php
$families = []; // Tableau pour regrouper les données par familles

// Regrouper les données par famille
foreach ($nbbranch as $unebranche) {
    $arbres = getArbreDomainebyidf($unebranche);

    // Vérification que les données sont disponibles
    if (isset($arbres) && is_array($arbres)) {
        foreach ($arbres as $domaine) {
            if (isset($domaine['libelle_f']) && !empty($domaine['libelle_f'])) {
                if (!isset($families[$domaine['id_f']])) {
                    $families[$domaine['id_f']] = [
                        'libelle_f' => $domaine['libelle_f'],
                        'domaines' => []
                    ];
                }

                // Ajouter le domaine à la bonne famille
                if (!empty($domaine['code_domaine']) && !empty($domaine['libelle'])) {
                    $families[$domaine['id_f']]['domaines'][] = [
                        'libelle' => $domaine['libelle'],
                        'code_domaine' => $domaine['code_domaine']
                    ];
                }
            }
        }
    }
}

// Affichage des données après regroupement
echo "<h1>Arbre des Domaines Techniques</h1>";
if (!empty($families)) {
    echo "<ul>";
    foreach ($families as $family) {
        echo "<li><strong>Famille :</strong> {$family['libelle_f']}</li>";
        if (!empty($family['domaines'])) {
            echo "<ul>";
            foreach ($family['domaines'] as $domaine) {
                echo "<li><strong>Domaine :</strong> {$domaine['libelle']} (ID : {$domaine['code_domaine']})</li>";
            }
            echo "</ul>";
        }
    }
    echo "</ul>";
} else {
    echo "<p>Aucune donnée trouvée pour l'arbre des domaines.</p>";
}
?>
