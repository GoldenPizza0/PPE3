<!doctype html>
<html>
    <head>
        <title>Modification d'un commercial</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 
    </head>
	
	
   <body>
   <p><h1>Modification Commercial :</h1></p><BR/>
	<form action="./?uc=gererContrat&action=modificationContrat" method="post">
		<table>
		<?php
			foreach($contrat as $unChamp){
				$No_contrat = $unChamp['No_contrat'];
				$nb_jour = $unChamp['nb_jour'];
				$enveloppe = $unChamp['enveloppe'];
				$signature = $unChamp['signer'];
				$salarie1 = $unChamp['id_salarie'];
				$salarie2 = $unChamp['id_salarie_1'];
                $codeclient = $unChamp['code_client'];
                $numsite = $unChamp['num_site'];
			}
		?>
		<tbody>
			<tr><td>Numéro du contrat sélectionné</td><td><?php echo $No_contrat; ?><input name="id" type="hidden" size=20 value = "<?php echo $No_contrat; ?>"></td></tr>
			<tr><td>Nombre de jours</td><td><input name="nb_jour" size=20 value = "<?php echo $nb_jour; ?>"></td></tr>
			<tr><td>Enveloppe </td><td><input name="enveloppe" size=20 value = "<?php echo $enveloppe; ?>"></td></tr>	
			<tr><td>Signé le </td><td><input name="signer" type="date" size=10 value = "<?php echo $signature; ?>"></td></tr>	
			<tr><td>Salarié 1</td><td><input name="id_salarie" size=10 value = "<?php echo $salarie1; ?>"></td></tr>
			<tr><td>Salarié 2</td><td><input name="id_salarie_1" size=15 value = "<?php echo $salarie2; ?>"></td></tr>
			<tr><td>Code client</td><td><input name="code_client" size=15 value = "<?php echo $codeclient; ?>"></td></tr>
			<tr><td>Numéro de site</td><td><input name="num_site" size=15 value = "<?php echo $numsite; ?>"></td></tr>
		</tbody>
		</table>
		
        <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>