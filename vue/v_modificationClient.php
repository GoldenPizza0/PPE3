<body>
		<p><h1>Nouveau client :</h1></p><BR/>
		<form action="index.php?uc=client&action=ModifierClient&id=<?php echo  $id;?>" method="post">
			<table>
				<tbody>
					<tr><td>societe</td><td><input name="client" size=20 value="<?php echo  $leClient["societe"];?>"></td></tr>
					<tr><td>adresse </td><td><input name="adresse" size=20 value="<?php echo  $leClient["adresse"];?>"></td></tr>	
					<tr>
						<td>Secteur</td>
						<td>
							<select id="secteur" name="Secteur">
								<?php
									$lesSecteurs = getLesSecteurs();
									foreach($lesSecteurs as $unSecteur) : 
										if($unSecteur['id_act'] == $leClient["id_act"]){?>
											<option value="<?= $unSecteur['id_act']; ?>" selected><?= $unSecteur['libelle_act']; ?></option>
										<?php }else{?>
											<option value="<?= $unSecteur['id_act']; ?>"><?= $unSecteur['libelle_act']; ?></option>
								<?php }endforeach ?>
							</select>
						</td>
					</tr>
				</tbody>
			</table>
			
			<br/>
			<input type="submit" value="Valider">
		</form>
	</body>