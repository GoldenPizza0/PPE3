<!doctype html>
<html>
    <head>
        <title>Creation d'un nouveau intervenant</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>
	
	
   <body>
		<p><h1>Nouveau intervenant cree :</h1></p><BR/>
		<form action="index.php?uc=creerIntervenant&uc=confirmCreatIntervenant" method="post">
			<table>
				<tbody>
					<tr><td>Nom</td><td><input name="nomS" size=20></td></tr>
					<tr><td>Prenom </td><td><input name="prenomS" size=20></td></tr>	
					<tr><td>Niveau d'études</td><td><input name="niveauEtudes" size=50></td></tr>	
					<tr><td>Maîtrise de l'anglais</td><td><input name="maitriseAnglais" size=5></td></tr>	
				</tbody>
			</table>
			
			<br/>
			<input type="submit" value="Valider">
		</form>
	</body>
</html>