<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.inc.php";
include_once "$racine/modele/bd.domaine.inc.php";


// Définition du menu burger
$menuBurger = [
    ["url" => "./?uc=Domaine_Technique", "label" => "Arbre "],
    ["url" => "./?uc=Domaine_Technique&action=ajoutBranche", "label" => "Ajouter branche "],
];

// Récupération de l'action
$action = $_GET['action'] ?? 'default';

// Récupération des données pour l'arbre
if ($action === 'default') {
    $nbbranch = getnbbranchfamily();
    $titre = "Domaine Technique";
    include "$racine/vue/entete.php";
    include "$racine/vue/v_arbredomaine.php";
    include "$racine/vue/pied.php";
} elseif ($action === 'ajoutBranche') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $libelle = $_POST['libelle'] ?? null;
        $id_f = $_POST['id_f'] ?? null;
        $id_couvre = $_POST['id_couvert'] ?? null;

        if ($libelle) {
            $cnx = connexionPDO();
            $sql = "INSERT INTO domaine (libelle, id_f) VALUES (:libelle, :id_f)";
            $stmt = $cnx->prepare($sql);
            $stmt->execute(['libelle' => $libelle, 'id_f' => $id_f]);
            if ($id_couvre) {
                $id_domaine_1 = $cnx->lastInsertId();
                $sql = "INSERT INTO couvre (code_domaine, code_domaine_1) VALUES (:code_domaine, :code_domaine_1)";
                $stmt = $cnx->prepare($sql);
                $stmt->execute(['code_domaine' => $id_couvre, 'code_domaine_1' => $id_domaine_1]);
            }
            header("Location: ./?uc=Domaine_Technique");
            exit();
        }
    } else {
        $domaine = getDomaine();
        $titre = "Ajouter une Branche";
        include "$racine/vue/entete.php";
        include "$racine/vue/v_ajoutBranche.php";
        include "$racine/vue/pied.php";
    }
} elseif ($action === 'suppressionBranche') {
    $code_domaine = $_GET['code_domaine'] ?? null;

    if ($code_domaine) {
        $cnx = connexionPDO();
        $sql = "DELETE FROM domaine WHERE code_domaine = :code_domaine";
        $stmt = $cnx->prepare($sql);
        $stmt->execute(['code_domaine' => $code_domaine]);
        header("Location: ./?uc=Domaine_Technique");
        exit();
    }
}else{
        // Gestion par défaut : affichage de l'arbre
    $titre = "domaine";
    include "$racine/vue/entete.php";
    include "$racine/vue/v_arbredomaine.php";
    include "$racine/vue/pied.php";
}


