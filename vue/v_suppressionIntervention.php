<!doctype html>
<html>
    <head>
        <title>Suppression d'une intervention</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 
    </head>
	
	
   <body>
   <p><h1>Suppression Intervention :</h1></p><BR/>
	<form action="index.php?uc=intervention&action=confirmSuppIntervention" method="post">
	<table>
			<?php
				$lIntervention = $pdo->getUneIntervention($_REQUEST['num']);
				foreach($lIntervention as $unChamp){
					$num_intervention = $unChamp['num_intervention'];
					$noC = $unChamp['No_contrat'];
					$intitule = $unChamp['intitule'];
					$debut = $unChamp['debut'];
					$fin = $unChamp['fin'];
					$prix = $unChamp['prix'];
					$etat = $unChamp['etat'];
					$domaine = $unChamp['code_domaine'];
				}
				$laffecte = $pdo->getUneAffecte($num_intervention, $noC);
				foreach($laffecte as $unChamp){
					$salarie = $unChamp['id_salarie'];
					$duree = $unChamp['duree'];
				}
			?>
			<tbody>
				<input type=hidden name="TNum" value = "<?php echo $num_intervention; ?>">
				<tr><td>No Contrat</td><td><input name="TNoC" size=5 value = "<?php echo $noC; ?>"></td></tr>
				<tr><td>Intitule </td><td><input name="TInt" size=20 value = "<?php echo $intitule; ?>"></td></tr>	
				<tr><td>Début</td><td><input type="date" name="TD" size=20 value = "<?php echo $debut; ?>"></td></tr>	
				<tr><td>Fin</td><td><input type="date" name="TF" size=20 value = "<?php echo $fin; ?>"></td></tr>
				<tr><td>Prix</td><td><input name="TP" size=15 value = "<?php echo $prix; ?>"></td></tr>	
				<tr><td>Etat</td><td><input name="TE" size=20 value = "<?php echo $etat; ?>"></td></tr>	
				<tr><td>Domaine</td><td><input name="TDomaine" size=10 value = "<?php echo $domaine; ?>"></td></tr>
				<tr><td>Intervenant</td><td><input name="TIntervenant" size=20 value = "<?php echo $salarie; ?>"></td></tr>	
				<tr><td>Duree</td><td><input name="TDuree" size=6 value = "<?php echo $duree; ?>"></td></tr>	
			</tbody>
		</table>
		
        <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>