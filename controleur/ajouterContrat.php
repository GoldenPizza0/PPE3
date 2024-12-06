<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.contrat.inc.php";
include_once "$racine/modele/bd.client.inc.php";
include_once "$racine/modele/bd.commercial.php";
include_once "$racine/modele/bd.intervenant.php";
include_once "$racine/modele/bd.site.php";

if(getSite()!=false && getIntervenant()!=false && getCommercial()!=false){
    $idcontrat = getMaxIdContrat();
    $sites = getSite();
    $clients = getClient();
    $intervenants = getIntervenant();
    $commerciaux = getCommercial();
}
// Définition du menu burger
$menuBurger = [
    ["url" => "./?uc=accueil", "label" => "Liste Contrat"],
    ["url" => "./?uc=gererContrat", "label" => "Gérer Contrat"],
];

// Récupération de l'action
$action = $_GET['action'] ?? 'ajout';

if ($action === "ajout" && $_SERVER["REQUEST_METHOD"] == "POST") {
    $No_contrat = $_POST['No_contrat'];
    $nb_jour = $_POST['nb_jour'];
    $enveloppe = $_POST['enveloppe'];
    $signer = $_POST['signer'];
    $id_salarie = $_POST['id_salarie'];
    $id_salarie_1 = $_POST['id_salarie_1'];
    $code_client = $_POST['code_client'];
    $num_site = $_POST['num_site'];

    // Appel pour ajouter un contrat
    $result = ajouterContrat($No_contrat, $nb_jour, $enveloppe, $signer, $id_salarie, $id_salarie_1, $code_client, $num_site);
    $message = $result ? "Contrat ajouté avec succès." : "Erreur lors de l'ajout du contrat.";
} elseif ($action === "modificationContrat") {
    // Code pour modification
    $contrat = getContratByIdR($_GET['No_contrat']); // Récupération du contrat à modifier
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mise à jour des données
        $id_Contrat = $_POST['id'];
        $nb_jour = $_POST['nb_jour'];
        $enveloppe = $_POST['enveloppe'];
        $signature = $_POST['signer'];
        $salarie1= $_POST['id_salarie'];
        $salarie2= $_POST['id_salarie_1'];
        $codeclient= $_POST['code_client'];
        $numsite= $_POST['num_site'];
        $result = updateContrat($id_Contrat, $nb_jour, $enveloppe, $signature, $salarie1, $salarie2,  $codeclient, $numsite); // Fonction de mise à jour
        $message = $result ? "Contrat modifié avec succès." : "Erreur lors de la modification.";
    }
    include "$racine/vue/entete.php";
    include "$racine/vue/v_modifContrat.php"; // Formulaire de modification
    include "$racine/vue/pied.php";
} elseif ($action === "suppressionContrat") {
    // Code pour suppression
    $No_contrat = $_GET['No_contrat'];
    $result = deleteContrat($No_contrat); // Fonction de suppression
    $message = $result ? "Contrat supprimé avec succès." : "Erreur lors de la suppression.";
    header("Location: ./?uc=accueil"); // Redirection après suppression
    exit();
}else{
        // Gestion par défaut : affichage du formulaire d'ajout
    include "$racine/vue/entete.php";
    include "$racine/vue/v_ajoutContrat.php";
    include "$racine/vue/pied.php";
}


