<h1>Ajouter une Branche</h1>
<form method="POST" action="./?uc=Domaine_Technique&action=ajoutBranche">
    <label for="libelle">Libellé du Domaine :</label>
    <input type="text" id="libelle" name="libelle" required>

    <label for="id_f">Famille associée (ID) :</label>
    <input type="number" id="id_f" name="id_f" min="1">

    <button type="submit">Ajouter</button>
</form>
