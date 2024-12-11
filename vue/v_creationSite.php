<body>
		<p><h1>Nouveau site :</h1></p><BR/>
		<form action="index.php?uc=client&action=CreerSite&id=
		<?PHP echo  $id;?>" method="post">
			<table>
				<tbody>
					<tr><td>nom</td><td><input name="nom" size=20></td></tr>
					<tr><td>adresse </td><td><input name="adresse" size=20></td></tr>	
					<tr><td>referent </td><td><input name="referent" size=20></td></tr>	
				</tbody>
			</table>
			
			<br/>
			<input type="submit" value="Valider" onclick="return confirm('création faite')">
		</form>
	</body>