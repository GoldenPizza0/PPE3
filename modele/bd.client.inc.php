<?php
include_once "bd.inc.php";

// Récupère tous les contrats
function nbClients() {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT count(*) as count FROM client");
        $req->execute();
        $return = $req->fetch(PDO::FETCH_ASSOC);
        return $return['count'];
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

// Récupère les contrats par l'identifiant d'un salarié (id_salarie ou id_salarie_1)
function getLesClientsEtSites() {
    try {
        $listeclient = array();
        $lesclients = array();
        $cnx = connexionPDO();
        $req = $cnx->prepare("
            SELECT * FROM client 
        ");
        $req->execute();
        $listeclient = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($listeclient as $client){
            $cnx = connexionPDO();
            $req = $cnx->prepare("
                SELECT * FROM site
                where code_client = ".$client['code_client']." 
            ");
            $req->execute();
            $listesite = $req->fetchAll(PDO::FETCH_ASSOC);
            $unclient = [
                'code_client' => $client['code_client'],
                'adresse' => $client['adresse'],
                'societe' => $client['societe'],
                'activites' => $client['id_act'],
                'les sites' => $listesite,

            ];
            $lesclients = [$unclient];
        }
        return $lesclients;
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}
?>