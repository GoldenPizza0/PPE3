<h1>Connexion</h1>
<div id="connexion">
<form method="POST" action="index.php?uc=connexion&action=confirmerConnexion">
   <fieldset>
     <legend>Connexion</legend>
		<p>
			<label for="identifiant">Identifiant*</label>
			<input id="identifiant" type="text" name="identifiant" value="<?php echo $identifiant ?>" size="30" maxlength="45">
		</p>
        <p>
            <label for="mdp">Mot de passe*</label>
            <input id="mdp" type="password"  name="mdp" value="<?php echo $mdp ?>" size ="25" maxlength="25">
        </p> 
	  	<p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>
<br />
<a href="./?uc=inscription">Inscription</a>

<!-- <div>
Utilisateur de test : <br />
login : test<br />
mot de passe : sio
</div> -->