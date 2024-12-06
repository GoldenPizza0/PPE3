<!doctype html>
<html>
    <head>
        <title>Creation d'un nouveau secteur</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>
	
	
   <body>
		<p><h1>Nouveau secteur cree :</h1></p><BR/>
		<form action="index.php?uc=secteur&action=confirmCreatSecteur" method="post">
			<table>
				<tbody>
					<tr><td>Libellé</td><td><input name="TLibelle" size=15></td></tr>
				</tbody>
			</table>
			
			<br/>
			<input type="submit" value="Valider">
		</form>
	</body>
</html>