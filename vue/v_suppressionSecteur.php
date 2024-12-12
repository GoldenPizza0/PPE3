<!doctype html>
<html>
    <head>
        <title>Suppression d'un secteur</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 
    </head>
	
	
   <body>
   <p><h1>Suppression Secteur :</h1></p><BR/>
	<form action="index.php?uc=secteur&action=confirmSuppSecteur" method="post">
		<table>
		<?php
			$leSecteur = $pdo->getUnSecteur($_REQUEST['id']);
			foreach($leSecteur as $unChamp){
				$id_Secteur = $unChamp['id_act'];
				$libelle = $unChamp['libelle_act'];
			}
		?>
		<tbody>
			<input type=hidden name="TId" value = "<?php echo $id_Secteur; ?>">
			<tr><td>Libelle</td><td><input name="TLibelle" size=15 value = "<?php echo $libelle; ?>"></td></tr>
		</tbody>
		</table>
		
        <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>