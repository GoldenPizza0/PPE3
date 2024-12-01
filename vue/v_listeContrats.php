<h1>Liste des contrats</h1>
<?php
if(getcontrat() != false){
    echo "<table border='1'>";
    echo "<tr>
            <th>Contrat n°</th>
            <th>Nombre de jours</th>
            <th>Enveloppe</th>
            <th>Signé le</th>
            <th>Salarié 1</th>
            <th>Salarié 2</th>
            <th>Code client</th>
            <th>Numéro de site</th>
            <th>Modifier</th>
            <th>Supprimer</th>
          </tr>";

    foreach ($listeContrats as $contrat) {
        echo "<tr>
                <td><a href='./?uc=detailcontrat&No_contrat=" . $contrat['No_contrat'] . "'>" . $contrat['No_contrat'] . "</a></td>
                <td>" . $contrat['nb_jour'] . "</td>
                <td>" . $contrat['enveloppe'] . "</td>
                <td>" . $contrat['signer'] . "</td>
                <td>" . $contrat['id_salarie'] . "</td>
                <td>" . $contrat['id_salarie_1'] . "</td>
                <td>" . $contrat['code_client'] . "</td>
                <td>" . $contrat['num_site'] . "</td>
                <td><a href='./?uc=gererContrat&action=modificationContrat&No_contrat=". $contrat['No_contrat'] ."'><img src='images/modifier.gif' title='Modif'></a></td>
                <td><a href='./?uc=gererContrat&action=suppressionContrat&No_contrat= ". $contrat['No_contrat'] ."'><img src='images/supp.png' title='Suppr'></a></td>
              </tr>";
    }

    echo "</table>";
}
?>
