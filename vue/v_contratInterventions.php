
 <!doctype html><!-- a refaire entierement sur le modele de dim v_tableauadminclient avec pour modele db.cliient à partir de la fonction nbclients + controller client-->
<html>

<head>
	<title>Liste INTERVENTIONS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="design.css" />
        
</head>
<body>
    <form action="index.php?uc=gererIntervention&action=creationIntervention" method="post">
        <p><H1>Liste des interventions</H1><br>

        <table border=3 cellspacing=1 >
            <tr>
                <td>No Contrat :</td>
                <td>Nombre de jours :</td>
                <td>Enveloppe :</td>
                <td>Date signature :</td>
                <td>Id commercial :</td>
                <td>Id intervenant :</td>
                <td>Code client :</td>
                <td>Numéro de site :</td>
            </tr> 
        <?php
		
        foreach($lesContrats as $unContrat)
        {
            $no = $unContrat['No_contrat'];
            $nbJ = $unContrat['nb_jour'];
            $env = $unContrat['enveloppe'];
            $signature = $unContrat['signer'];
            $idCom = $unContrat['id_salarie'];
            $idInt = $unContrat['id_salarie_1'];
            $codeCli = $unContrat['code_client'];
            $noSite = $unContrat['num_site'];
            ?>
            <tr>
                <td width=150><?php echo $no ?></a></td>
                <td width=150><?php echo $nbJ ?></td>
                <td width=300><?php echo $env ?></td>
                <td width=100><?php echo $signature?></td>
                <td width=100><?php echo $idCom?></td>
                <td width=100><?php echo $idInt?></td>
                <td width=100><?php echo $codeCli?></td>
                <td width=100><?php echo $noSite?></td>
                <td><a href="./?uc=intervention"><button name="button" value= <?php echo $no;?>>afficher</button></a></td>
                 <input type=hidden name="TNo" value = "<?php echo $no; ?>"> <!-- a voir -->

				<td width=30><a href=index.php?uc=gererIntervention&action=modificationIntervention&no_contrat=<?php echo $no ?>><img src="images/modifier.gif" title="Modif"></a></td>
                <td width=30><a href=index.php?uc=gererIntervention&action=suppressionIntervention&no_contrat=<?php echo $no ?>><img src="images/supp.png" title="Suppr"></a></td>
            </tr>
            <?php //a voir
                if (isset($_POST['button'])){
                    $noC = $_REQUEST[$no];
                    $lesInterventions = getLesInterventionsParContrat($noC);
                    ?>
                    <table>
                        <tr>
                            <th>Numérod'Intervention </th>
                            <th>Intitulé</th>
                            <th>Début</th>
                            <th>Fin</th>
                            <th>Prix</th>
                            <th>État</th>
                            <th>Code domaine</th>
                        </tr>
                        <?php //ici modifier
                        foreach($lesInterventions as $uneIntervention){
                            $no = $uneIntervention['No_contrat'];
                            $numInt = $uneIntervention['num_intervention'];
                            $intitule = $uneIntervention['intitule'];
                            $debut = $uneIntervention['debut'];
                            $fin = $uneIntervention['fin'];
                            $prix = $uneIntervention['prix'];
                            $etat = $uneIntervention['etat'];
                            $codeDom = $uneIntervention['code_domaine'];
                            ?>
                            <tr>
                                <td width=150><?php echo $no ?></a></td>
                                <td width=150><?php echo $numInt ?></td>
                                <td width=300><?php echo $intitule ?></td>
                                <td width=100><?php echo $debut?></td>
                                <td width=100><?php echo $fin?></td>
                                <td width=100><?php echo $prix?></td>
                                <td width=100><?php echo $etat?></td>
                                <td width=100><?php echo $codeDom?></td>

                                <td width=30><a href=index.php?uc=gererCommercial&action=modificationCommercial&id=<?php echo $numInt ?>><img src="images/modifier.gif" title="Modif"></a></td>
                                <td width=30><a href=index.php?uc=gererCommercial&action=suppressionCommercial&id=<?php echo $numInt ?>><img src="images/supp.png" title="Suppr"></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                <?php }?>
            <?php }?>
        </table>
        </br>

        <input type="submit" value="créer une nouvelle intervention">
    </form>
</body>
</html>
