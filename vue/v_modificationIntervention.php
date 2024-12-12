<!doctype html>
<html>
    <head>
        <title>Modification d'une intervention</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 
    </head>
	
	
   <body>
   <p><h1>Modification Intervention :</h1></p><BR/>
	<form action="index.php?uc=intervention&action=confirmModifIntervention" method="post">
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
				<tr>
					<td>No Contrat</td>
					<td>
						<select id="contrat" name="TNoC">
							<?php
								$lesContrats = $pdo->getLescontrats();
								foreach($lesContrats as $unContrat) : ?>
								<option value="<?=$unContrat['No_contrat']; ?>"><?=$unContrat['No_contrat']; ?></option>
							<?php endforeach ?>
						</select>
					</td>
				</tr>	
				<tr><td>Intitule </td><td><input name="TInt" size=20 value = "<?php echo $intitule; ?>"></td></tr>	
				<tr><td>Début</td><td><input type="date" name="TD" size=20 value = "<?php echo $debut; ?>"></td></tr>	
				<tr><td>Fin</td><td><input type="date" name="TF" size=20 value = "<?php echo $fin; ?>"></td></tr>
				<tr><td>Prix</td><td><input name="TP" size=15 value = "<?php echo $prix; ?>"></td></tr>	
				<tr><td>Etat</td><td><input name="TE" size=20 value = "<?php echo $etat; ?>"></td></tr>	
				<tr>
					<td>Domaine</td>
					<td>
						<select id="domaine" name="TDomaine">
							<?php
								$lesDomaines = $pdo->getLesDomaines();
								foreach($lesDomaines as $unDomaine) : ?>
								<option value="<?=$unDomaine['code_domaine']; ?>"><?=$unDomaine['code_domaine']; ?> - <?= $unDomaine['libelle']; ?></option>
							<?php endforeach ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Intervenant</td>
						<td>
							<select id="intervenant" name="TIntervenant">
								<?php
									$lesIntervenants = $pdo->getLesIntervenants();
									foreach($lesIntervenants as $unIntervenant) : ?>
									<option value="<?=$unIntervenant['id_salarie']; ?>"><?=$unIntervenant['nom_salarie']; ?> - <?= $unIntervenant['prenom_salarie']; ?></option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr><td>Durée</td><td><input type="date" name="TDuree" size=20 value = "<?php echo $duree; ?>"></td></tr>
			</tbody>
		</table>
		
        <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>