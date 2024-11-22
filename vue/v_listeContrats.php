<h1>Liste des contrats</h1>
<?php
foreach ($listeContrats as $contrat) { ?>
    <div class="card">
        <div>
            <strong>Contrat n° :</strong> 
            <a href="./?uc=detailcontrat&No_contrat=<?= $contrat['No_contrat'] ?>">
                <?= $contrat['No_contrat'] ?>
            </a>
            <br />
            <strong>Nombre de jours :</strong> <?= $contrat['nb_jour'] ?><br />
            <strong>Enveloppe :</strong> <?= $contrat['enveloppe'] ?><br />
            <strong>Signé le :</strong> <?= $contrat['signer'] ?><br />
            <strong>Salarié 1 :</strong> <?= $contrat['id_salarie'] ?><br />
            <strong>Salarié 2 :</strong> <?= $contrat['id_salarie_1'] ?><br />
            <strong>Code client :</strong> <?= $contrat['code_client'] ?><br />
            <strong>Numéro de site :</strong> <?= $contrat['num_site'] ?>
        </div>
    </div>
<?php } ?>
