<?php
// Vérification que les données sont disponibles
if (isset($arbres) && is_array($arbres)) {
    echo "<h1>Arbre des Domaines Techniques</h1>";
    echo "<ul>";
    
    // Parcours des domaines
    foreach ($arbres as $domaine) {
        echo "<li>";
        echo "<strong>Famille :</strong> {$domaine['libelle_f']} (Code : {$domaine['id_f']})";

        // Vérifie s'il existe une famille associée
        if (!empty($domaine['code_domaine']) && !empty($domaine['libelle'])) {
            echo "<ul>";
            echo "<li><strong>Domaine :</strong> {$domaine['libelle']} (ID : {$domaine['code_domaine']})</li>";
            echo "</ul>";
        }

        echo "</li>";
    }

    echo "</ul>";
} else {
    echo "<p>Aucune donnée trouvée pour l'arbre des domaines.</p>";
}
?>
