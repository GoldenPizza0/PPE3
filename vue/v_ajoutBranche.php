<h1>Ajouter une Branche</h1>
<form method="POST" action="./?uc=Domaine_Technique&action=ajoutBranche">
    <label for="libelle">Libellé du Domaine :</label>
    <input type="text" id="libelle" name="libelle" required>

    <label for="id_f">Famille associée (ID) :</label>
    <input type="number" id="id_f" name="id_f" min="1"></br>

    <label for="id_couvert">si couvert par un domaine spécifique cochez le :</label>
    <select name="id_couvert" id="id_couvert" required>
        <?php 
            foreach($domaine as $undomaine){
                echo "<option value='" . $undomaine["code_domaine"] . "'>" . $undomaine["libelle"] . "</option>";
            }
            ?>
    </select></br>

    <button type="submit">Ajouter</button>
</form>
