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

?>
