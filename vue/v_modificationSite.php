<body>
		<p><h1>modifier site :</h1></p><BR/>
		<form action="index.php?uc=client&action=ModifierSite&id=
		<?php echo  $id;?>&site=<?php echo $site;?>" method="post">
			<table>
				<tbody>
					<tr><td>nom</td><td><input name="nom" size=20 value="<?php echo  $leSite["nom_site"];?>"></td></tr>
					<tr><td>adresse </td><td><input name="adresse" size=20 value="<?php echo  $leSite["adresse_site"];?>"></td></tr>	
					<tr><td>referent </td><td><input name="referent" size=20 value="<?php echo  $leSite["referent"];?>"></td></tr>	
				</tbody>
			</table>
			
			<br/>
			<input type="submit" value="Valider" onclick="return confirm('modification faite')">
		</form>
	</body>