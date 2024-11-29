<?php 

include_once "bd.inc.php";

// Récupère les contrats par l'identifiant d'un salarié (id_salarie ou id_salarie_1)
function getContratByIdR($idR) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("
            SELECT * FROM contrat 
            WHERE id_salarie = :idR OR id_salarie_1 = :idR
        ");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

// Récupère tous les contrats
function getContrat() {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM contrat");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}


function getContratByNomR($nomR) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("
            SELECT c.* FROM contrat c
            JOIN client cl ON c.code_client = cl.id_client
            WHERE cl.nom LIKE :nomR
        ");
        $req->bindValue(':nomR', '%' . $nomR . '%', PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

// Récupère tous les clients
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

// Récupère les clients et leurs sites
function getLesClientsEtSites() {
    try {
        $listeclient = array();
        $lesclients = array();
        $cnx = connexionPDO();
        $req = $cnx->prepare("
            SELECT code_client,adresse,societe,libelle_act as id_act FROM client join secteur on client.id_act = secteur.id_act
        ");
        $req->execute();
        $listeclient = $req->fetchALL(PDO::FETCH_ASSOC);
        foreach($listeclient as $client){
            $cnx = connexionPDO();
            $req = $cnx->prepare("
                SELECT * FROM site
                where code_client = ".$client['code_client']." 
            ");
            $req->execute();
            $listesite = $req->fetchALL(PDO::FETCH_ASSOC);
            $listesites = array();
            foreach($listesite as $site){
                $unsite = [
                    'num_site' => $site['num_site'],
                    'nom_site' => $site['nom_site'],
                    'adresse_site' => $site['adresse_site'],
                    'referent' => $site['referent']
                ];
                array_push($listesites,$unsite);
            }
            $unclient = [
                'code_client' => $client['code_client'],
                'adresse' => $client['adresse'],
                'societe' => $client['societe'],
                'activite' => $client['id_act'],
                'sites' => $listesites,

            ];
            array_push($lesclients,$unclient);
        }
        return $lesclients;
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}


?>
