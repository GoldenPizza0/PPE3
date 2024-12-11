<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.contrat.inc.php";
include_once "$racine/modele/bd.commercial.php";
include_once "$racine/modele/bd.intervenant.php";
include_once "$racine/modele/bd.site.php";

if(getSite()!=false && getIntervenant()!=false && getCommercial()!=false){
$idcontrat = getMaxIdContrat();
$sites = getSite();
$intervenants = getIntervenant() ;
$commerciaux = getCommercial();
}
// Récupération des données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $No_contrat = $_POST['No_contrat'];
    $nb_jour = $_POST['nb_jour'];
    $enveloppe = $_POST['enveloppe'];
    $signer = $_POST['signer'];
    $id_salarie = $_POST['id_salarie'];
    $id_salarie_1 = $_POST['id_salarie_1'];
    $code_client = $_POST['code_client'];
    $num_site = $_POST['num_site'];

    // Appel à la fonction pour ajouter un contrat
    $result = ajouterContrat($No_contrat, $nb_jour, $enveloppe, $signer, $id_salarie, $id_salarie_1, $code_client, $num_site);
    
    if ($result) {
        $message = "Contrat ajouté avec succès.";
    } else {
        $message = "Erreur lors de l'ajout du contrat.";
    }
}else{
    // appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Ajout des contrats répertoriés";
include "$racine/vue/entete.php";

include "$racine/vue/v_ajoutContrat.php";

include "$racine/vue/pied.php";
}

