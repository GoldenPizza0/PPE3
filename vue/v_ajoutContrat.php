
<!-- Formulaire pour ajouter un contrat -->
<div class="card">
    <h2>Ajouter un nouveau contrat</h2>
    <form action="./?uc=gererContrat&action=ajout" method="POST">
        <label for="No_contrat">Numéro de contrat :</label>
        <?php 
        echo "<input type='number' id='No_contrat' name='No_contrat' min='". $idcontrat +1 ."' required>";
        ?>
        <br />
        
        <label for="nb_jour">Nombre de jours :</label>
        <input type="number" id="nb_jour" name="nb_jour" required>
        <br />
        
        <label for="enveloppe">Enveloppe :</label>
        <input type="number" id="enveloppe" name="enveloppe" min="0" required>
        <br />
        
        <label for="signer">Date de signature :</label>
        <input type="date" id="signer" name="signer" required>
        <br />
        
        <label for="id_salarie">ID Salarié 1 : </label>
        <select name="id_salarie" id="id_salarie" required>
        <?php 
        foreach($intervenants as $intervenant) {
            echo "<option value='" . $intervenant["id_salarie"] . "'>" . $intervenant["id_salarie"] . "</option>";
        }
        ?>
        
        </select>
        <br />
        
        <label for="id_salarie_1">ID Salarié 2 :</label>
        <select name="id_salarie_1" id="id_salarie_1" required>
        <?php 
        foreach($commerciaux as $commercial){
            echo "<option value='" . $commercial["id_salarie"] . "'>" . $commercial["id_salarie"] . "</option>";
        }
        ?>
        </select>
        <br />
        
        <label for="code_client">Code client :</label>
        <select name="code_client" id="code_client" required>
        <?php 
        foreach($clients as $client){
            echo "<option value='" . $client["code_client"] . "'>" . $client["code_client"] . "</option>";
        }
        ?>
        </select>
        <br />
        
        <label for="num_site">Numéro de site :</label>
        <select name="num_site" id="num_site" required>
        <?php 
        foreach($sites as $site){
            echo "<option value='" . $site["num_site"] . "'>" . $site["num_site"] ." ". $site["nom_site"] . "</option>";
        }
        ?>
        </select>
        <br />
        
        <input type="submit" value="Ajouter le contrat">
    </form>
    <?php if (!empty($message)): ?>
    <div class="<?= $result ? 'success' : 'error' ?>">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif; ?>

</div>
