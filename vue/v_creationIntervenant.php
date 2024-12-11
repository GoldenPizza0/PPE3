<!doctype html>
<html>
    <head>
        <title>Creation d'un nouveau intervenant</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>
	
	
   <body>
		<p><h1>Nouveau intervenant cree :</h1></p><BR/>
		<form action="index.php?uc=intervenant&action=confirmCreatIntervenant" method="post">
			<table>
				<tbody>
					<tr><td>Nom</td><td><input name="TNom" size=20></td></tr>
					<tr><td>Prenom </td><td><input name="TPrenom" size=20></td></tr>	
					<tr><td>Niveau d'études</td><td><input name="TNE" size=50></td></tr>	
					<tr><td>Maîtrise de l'anglais</td><td><input name="TMA" size=5></td></tr>
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
					<tr><td>Prix /jour</td><td><input name="TJ" size=5></td></tr>
				</tbody>
			</table>
			
			<br/>
			<input type="submit" value="Valider">
		</form>
	</body>
</html>