<h1>Ajout, Suppression et modification des contrats</h1>
<!-- Formulaire pour ajouter un contrat -->
<div class="card">
    <h2>Ajouter un nouveau contrat</h2>
    <form action="./?uc=ajouterContrat" method="POST">
        <label for="No_contrat">Numéro de contrat :</label>
        <input type="number" id="No_contrat" name="No_contrat" required>
        <br />
        
        <label for="nb_jour">Nombre de jours :</label>
        <input type="number" id="nb_jour" name="nb_jour" required>
        <br />
        
        <label for="enveloppe">Enveloppe :</label>
        <input type="number" id="enveloppe" name="enveloppe" required>
        <br />
        
        <label for="signer">Date de signature :</label>
        <input type="date" id="signer" name="signer" required>
        <br />
        
        <label for="id_salarie">ID Salarié 1 :</label>
        <input type="number" id="id_salarie" name="id_salarie" required>
        <br />
        
        <label for="id_salarie_1">ID Salarié 2 :</label>
        <input type="number" id="id_salarie_1" name="id_salarie_1" required>
        <br />
        
        <label for="code_client">Code client :</label>
        <input type="number" id="code_client" name="code_client" required>
        <br />
        
        <label for="num_site">Numéro de site :</label>
        <input type="number" id="num_site" name="num_site" required>
        <br />
        
        <input type="submit" value="Ajouter le contrat">
    </form>
</div>