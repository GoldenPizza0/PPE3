
<!doctype html>
<html>

<head>
	<title>Liste SECTEURS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="design.css" />
        
</head>
<body>
    <form action="index.php?uc=secteur&action=creationSecteur" method="post">
        <p><H1>Liste des secteurs</H1><br>

        <table border=3 cellspacing=1 >
            <tr>
                <td>Libellé :</td>
            </tr> 
        <?php
		
        foreach( $lesSecteurs as $unSecteur)
        {
            $id = $unSecteur['id_act'];
            $libelle = $unSecteur['libelle_act'];
            ?>
            <tr>
                <td width=150><?php echo $libelle ?></a></td>
                <?php 

                ?>
				<td width=30><a href=index.php?uc=secteur&action=modificationSecteur&id=<?php echo $id ?>><img src="images/modifier.gif" title="Modif"></a></td>
                <td width=30><a href=index.php?uc=secteur&action=suppressionSecteur&id=<?php echo $id ?>><img src="images/supp.png" title="Suppr"></a></td>
            </tr>
            <?php 
        }
        ?>
        </table>
        </br>

        <input type="submit" value="créer un nouveau secteur">
    </form>
</body>
</html>
