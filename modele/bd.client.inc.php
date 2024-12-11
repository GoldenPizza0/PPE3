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
function SuppClient($idClient) {
    try {
        $cnx = connexionPDO();
        $req = "
        Delete FROM site where code_client = ".$idClient.";
        Delete FROM client where code_client = ".$idClient.";";
        $cnx->exec($req);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}
function SuppSite($idClient, $idSite) {
    try {
        $cnx = connexionPDO();
        $req = "
        Delete FROM site where num_site = ".$idSite." and code_client = ".$idClient.";";
        $cnx->exec($req);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}
function getLesSecteurs(){
    $cnx = connexionPDO();
    $req = $cnx->query("SELECT id_act, libelle_act FROM secteur");
    $lesLignes = $req->fetchAll();
    return $lesLignes;
}
function CreationClient($adresse,$societe,$id_act){
    $cnx = connexionPDO();
    $req = $cnx->prepare("insert into client ( adresse , societe, id_act )
    Values('$adresse','$societe',$id_act)");
    $req->execute();
}
function  CreationSite($adresse,$nom,$referent,$id){
    $cnx = connexionPDO();
    $req1 = $cnx->query("SELECT max(num_site) as num FROM site where code_client = $id");
    $num_site = $req1->fetch();
    echo $num_site['num'];
    if($num_site['num'] == null){
        $num_site['num'] = 0;
    }
    $num = $num_site['num'] + 1;
    $req = $cnx->prepare("
    insert into site (code_client, num_site, nom_site, adresse_site, referent)
    Values($id,$num,'$nom','$adresse','$referent')");
    $req->execute();
}
function GetSiteParId($id, $site){
    $cnx = connexionPDO();
    $req = $cnx->query("SELECT nom_site,adresse_site,referent FROM site where code_client = $id and num_site = $site");
    $lesLignes = $req->fetch();
    return $lesLignes;
}
function ModificationSite($adresse,$nom,$referent,$id,$site){
    SuppSite($id,$site);
    CreationSite($adresse,$nom,$referent,$id);
}

function GetClientParId($id){
    $cnx = connexionPDO();
    $req = $cnx->query("SELECT * FROM client where code_client = $id");
    $lesLignes = $req->fetch();
    return $lesLignes;
}

function ModificationClient($id,$adresse,$client,$act){
    SuppClient($id);
    CreationClient($adresse,$client,$act);
}
?><?php 

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



?>
