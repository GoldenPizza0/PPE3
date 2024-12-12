<body>
		<p><h1>Nouveau client :</h1></p><BR/>
		<form action="index.php?uc=client&action=CreerClient" method="post">
			<table>
				<tbody>
					<tr><td>societe</td><td><input name="client" size=20></td></tr>
					<tr><td>adresse </td><td><input name="adresse" size=20></td></tr>	
					<tr>
						<td>Secteur</td>
						<td>
							<select id="secteur" name="Secteur">
								<?php
									$lesSecteurs = getLesSecteurs();
									foreach($lesSecteurs as $unSecteur) : ?>
									<option value="<?= $unSecteur['id_act']; ?>"><?= $unSecteur['libelle_act']; ?></option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
				</tbody>
			</table>
			
			<br/>
			<input type="submit" value="Valider"  onclick="return confirm('création faite')">
		</form>
	</body>