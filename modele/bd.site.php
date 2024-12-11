<?php 

include_once "bd.inc.php";

// Récupère tous les contrats
function getSite() {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM site_client");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}