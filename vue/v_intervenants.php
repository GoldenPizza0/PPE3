
<!doctype html>
<html>

<head>
	<title>Liste INTERVENANTS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="design.css" />
        
</head>
<body>
    <form action="index.php?uc=creerIntervenant&action=creationIntervenant" method="post">
        <p><H1>Liste des intervenants</H1><br>

        <table border=3 cellspacing=1 >
            <tr>
                <td>Nom :</td>
                <td>Prénom :</td>
                <td>Niveau d'études:</td>
                <td>Maîtrise de l'Anglais:</td>
            </tr> 
        <?php
		
        foreach( $lesIntervenants as $unIntervenant)
        {
            $num = $unIntervenant['numS'];
            $nom = $unIntervenant['nomS'];
            $prenom = $unIntervenant['prenomS'];
            $NE = $unIntervenant['niveauEtudes'];
            $MA = $unIntervenant['maitriseAnglais'];
            ?>
            <tr>
                <td width=150><?php echo $nom ?></a></td>
                <td width=150><?php echo $prenom ?></td>
                <td width=300><?php echo $NE ?></td>
                <td width=100><?php echo $MA?></td>
                <?php 

                ?>
				<td width=30><a href=index.php?uc=modifierIntervenant&action=modificationIntervenant&num=<?php echo $num ?>><img src="images/modifier.gif" title="Modif"></a></td>
                <td width=30><a href=index.php?uc=supprimerIntervenant&action=suppressionIntervenant&num=<?php echo $num ?>><img src="images/supp.png" title="Suppr"></a></td>
            </tr>
            <?php 
        }
        ?>
        </table>
        </br>

        <input type="submit" value="créer un nouvel intervenant">
    </form>
</body>
</html>
