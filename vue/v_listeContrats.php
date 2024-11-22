<br/><br/>
<h1>Liste des contrats</h1>
<?php
for ($i = 0; $i < count($listeContrats); $i++) {

    ?>

    <div class="card">

        <div class=""><?php echo "<a href='./?uc=detailcontrat&idR=" . $listeContrats[$i]['idR'] . "'>" . $listeRestos[$i]['nomR'] . "</a>"; ?>
            <br />
            <?= $listeContrats[$i]["No_contrat"] ?>
            <?= $listeContrats[$i]["nb_jour"] ?>
            <br />
            <?= $listeContrats[$i]["enveloppe"] ?>
            <?= $listeContrats[$i]["signer"] ?>
            <br />
            <?= $listeContrats[$i]["id_salarie"] ?>
            <?= $listeContrats[$i]["id_salarie_1"] ?>
            <br />
            <?= $listeContrats[$i]["code_client"] ?>
            <?= $listeContrats[$i]["num_site"] ?>
        </div>
        <div class="">
            <ul id="">		


            </ul>


        </div>

    </div>





    <?php
}
?>


