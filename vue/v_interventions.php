
 <!doctype html>
<html>

    <head>
        <title>Liste S</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="design.css" /> 
    </head>
    <body>
        <form action="index.php?uc=intervention&action=creationIntervention" method="post">
            <p><H1>Liste des interventions</H1><br>
            <table border=3 cellspacing=1>
                <tr>
                    <th>No de Contrat</th>
                    <th>No d'Intervention </th>
                    <th>Intitulé</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Prix</th>
                    <th>État</th>
                    <th>Code domaine</th>
                </tr>
                <?php
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
                            <td width=200><?php echo $no ?></a></td>
                            <td width=150><?php echo $numInt ?></td>
                            <td width=200><?php echo $intitule ?></td>
                            <td width=150><?php echo $debut?></td>
                            <td width=150><?php echo $fin?></td>
                            <td width=100><?php echo $prix?></td>
                            <td width=150><?php echo $etat?></td>
                            <td width=50><?php echo $codeDom?></td>

                            <td width=30><a href=index.php?uc=intervention&action=modificationIntervention&num=<?php echo $numInt ?>><img src="images/modifier.gif" title="Modif"></a></td>
                            <td width=30><a href=index.php?uc=intervention&action=suppressionIntervention&num=<?php echo $numInt ?>><img src="images/supp.png" title="Suppr"></a></td>
                        </tr>
                <?php } ?>
            </table>
            </br>

            <input type="submit" value="créer une nouvelle intervention">
        </form>
    </body>
</html>
