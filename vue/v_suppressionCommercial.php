<!doctype html>
<html>
    <head>
        <title>Suppression d'un commercial</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 
    </head>
	
	
   <body>
   <p><h1>Suppression Commercial :</h1></p><BR/>
	<form action="index.php?uc=gererCommercial&action=confirmSuppCommercial" method="post">
		<table>
		<?php
			$leCommercial = $pdo->getUnCommercial($_REQUEST['id']);
			foreach($leCommercial as $unChamp){
				$id_Commercial = $unChamp['id_salarie'];
				$nom = $unChamp['nom_salarie'];
				$prenom = $unChamp['prenom_salarie'];
				$portable = $unChamp['portable'];
            	$fixe = $unChamp['fixe'];
				$secteur = $unChamp['id_act'];
			}
		?>
		<tbody>
			<input type=hidden name="TId" value = "<?php echo $id_Commercial; ?>">
			<tr><td>Nom</td><td><input name="TNom" size=20 value = "<?php echo $nom; ?>"></td></tr>
			<tr><td>Prenom </td><td><input name="TPrenom" size=20 value = "<?php echo $prenom; ?>"></td></tr>	
			<tr><td>Portable</td><td><input name="TPortable" size=10 value = "<?php echo $portable; ?>"></td></tr>	
			<tr><td>Fixe</td><td><input name="TFixe" size=10 value = "<?php echo $fixe; ?>"></td></tr>
			<tr><td>Secteur</td><td><input name="TSecteur" size=15 value = "<?php echo $secteur; ?>"></td></tr>	
		</tbody>
		</table>
		
        <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>