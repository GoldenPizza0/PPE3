<?php
echo "<h1>Arbre des Domaines Techniques avec Relations de Couverture</h1>";

if (!empty($arbreHierarchie)) {
    // Regrouper par familles
    $families = [];
    foreach ($arbreHierarchie as $item) {
        if (!isset($families[$item['id_f']])) {
            $families[$item['id_f']] = [
                'libelle_f' => $item['libelle_f'],
                'domaines' => []
            ];
        }

        // Ajouter le domaine couvert à son domaine parent
        $families[$item['id_f']]['domaines'][$item['code_domaine_couvre']]['libelle'] = $item['libelle_couvre'];
        $families[$item['id_f']]['domaines'][$item['code_domaine_couvre']]['couverts'][] = [
            'code_domaine' => $item['code_domaine_couvert'],
            'libelle' => $item['libelle_couvert']
        ];
    }
   $domainecouvert = getDomainecouvert();
    echo "<ul>";
    foreach ($families as $family) {
        echo "<li><strong>Famille :</strong> {$family['libelle_f']}</li>";
        if (!empty($family['domaines'])) {
            echo "<ul>";
            foreach ($family['domaines'] as $domaine_couvre) {
                    if(isinarray($domaine_couvre['libelle'],$domainecouvert) == false){
                        echo "<li><strong>Domaine :</strong> {$domaine_couvre['libelle']}</li>";
                    }
                    if (!empty($domaine_couvre['couverts'])) {
                    echo "<ul>";
                    foreach ($domaine_couvre['couverts'] as $domaine_couvert) {
                        if(!empty($domaine_couvert['libelle'])){
                        echo "<li><strong>Domaine couvert :</strong> {$domaine_couvert['libelle']} (ID : {$domaine_couvert['code_domaine']})</li>";
                        }
                    } 
                    echo "</ul>";
                }
            }
            echo "</ul>";
        }
    }
    echo "</ul>";
} else {
    echo "<p>Aucune donnée trouvée pour l'arbre des domaines.</p>";
}
?>
