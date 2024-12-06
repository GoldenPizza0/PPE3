<!doctype html>
<html>
    <head>
        <title>Creation d'un nouveau commercial</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>
	
	
   <body>
		<p><h1>Nouveau commercial cree :</h1></p><BR/>
		<form action="index.php?uc=commercial&action=confirmCreatCommercial" method="post">
			<table>
				<tbody>
					<tr><td>Nom</td><td><input name="TNom" size=20></td></tr>
					<tr><td>Prenom </td><td><input name="TPrenom" size=20></td></tr>	
					<tr><td>Portable</td><td><input name="TPortable" size=10></td></tr>	
					<tr><td>Fixe</td><td><input name="TFixe" size=10></td></tr>
					<tr>
						<td>Secteur</td>
						<td>
							<select id="secteur" name="TSecteur">
								<?php
									$lesSecteurs = $pdo->getLesSecteurs();
									foreach($lesSecteurs as $unSecteur) : ?>
									<option value="<?=$unSecteur['id_act']; ?>"><?= $unSecteur['libelle_act']; ?></option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
				</tbody>
			</table>
			
			<br/>
			<input type="submit" value="Valider">
		</form>
	</body>
</html>