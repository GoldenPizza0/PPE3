
<!doctype html>
<html>

<head>
	<title>Liste COMMERCIAUX</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="design.css" />
        
</head>
<body>
    <form action="index.php?uc=commercial&action=creationCommercial" method="post">
        <p><H1>Liste des commerciaux</H1><br>

        <table border=3 cellspacing=1 >
            <tr>
                <td>Nom :</td>
                <td>Prénom :</td>
                <td>Portable :</td>
                <td>Fixe :</td>
                <td>Secteur :</td>
            </tr> 
        <?php
		
        foreach( $lesCommerciaux as $unCommercial)
        {
            $id = $unCommercial['id_salarie'];
            $nom = $unCommercial['nom_salarie'];
            $prenom = $unCommercial['prenom_salarie'];
            $portable = $unCommercial['portable'];
            $fixe = $unCommercial['fixe'];
            $secteur = $unCommercial['id_act'];
            ?>
            <tr>
                <td width=150><?php echo $nom ?></a></td>
                <td width=150><?php echo $prenom ?></td>
                <td width=300><?php echo $portable ?></td>
                <td width=100><?php echo $fixe?></td>
                <td width=100><?php echo $secteur?></td>
                <?php 

                ?>
				<td width=30><a href=index.php?uc=commercial&action=modificationCommercial&id=<?php echo $id ?>><img src="images/modifier.gif" title="Modif"></a></td>
                <td width=30><a href=index.php?uc=commercial&action=suppressionCommercial&id=<?php echo $id ?>><img src="images/supp.png" title="Suppr"></a></td>
            </tr>
            <?php 
        }
        ?>
        </table>
        </br>

        <input type="submit" value="créer un nouveau commercial">
    </form>
</body>
</html>
