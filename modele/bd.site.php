<?php 

include_once "bd.inc.php";

// Récupère tous les sites
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

function getSitesByClient($code_client) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT num_site, nom_site FROM site WHERE code_client = :code_client");
        $req->bindValue(':code_client', $code_client, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Erreur : " . $e->getMessage());
        return [];
    }
}
function getSiteDetails($num_site) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("
            SELECT nom_site, adresse, referent 
            FROM site 
            WHERE num_site = :num_site
        ");
        $req->bindValue(':num_site', $num_site, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Erreur : " . $e->getMessage());
        return [];
    }
}
