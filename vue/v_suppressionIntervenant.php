<!doctype html>
<html>
    <head>
        <title>Suppression d'un intervenant</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 
    </head>
	
	
   <body>
   <p><h1>Suppression Intervenant :</h1></p><BR/>
	<form action="index.php?uc=intervenant&action=confirmSuppIntervenant" method="post">
		<table>
		<?php
			$lIntervenant = $pdo->getUnIntervenant($_REQUEST['id']);
			foreach($lIntervenant as $unChamp){
				$id_Intervenant = $unChamp['id_salarie'];
				$nom = $unChamp['nom_salarie'];
				$prenom = $unChamp['prenom_salarie'];
				$NE = $unChamp['niveau_etude'];
            	$MA = $unChamp['maitrise_an'];
			}
		?>
		<tbody>
			<input type=hidden name="TId" value = "<?php echo $id_Intervenant; ?>">
			<tr><td>Nom</td><td><input name="TNom" size=20 value = "<?php echo $nom; ?>"></td></tr>
			<tr><td>Prenom </td><td><input name="TPrenom" size=20 value = "<?php echo $prenom; ?>"></td></tr>	
			<tr><td>Niveau d'Etudes</td><td><input name="TNE" size=50 value = "<?php echo $NE; ?>"></td></tr>	
			<tr><td>Niveau d'Anglais</td><td><input name="TMA" size=5 value = "<?php echo $MA; ?>"></td></tr>	
		</tbody>
		</table>
		
        <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>