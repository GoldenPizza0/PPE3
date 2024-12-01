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
 
function getMaxIdContrat() {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT max(No_contrat) FROM contrat"); // Changer id_salarie en id_contrat si nécessaire
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC); // Retourne un seul résultat
        return $result['max(No_contrat)']; // Récupère directement l'id max
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        return 0;
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
function ajouterContrat($No_contrat, $nb_jour, $enveloppe, $signer, $id_salarie, $id_salarie_1, $code_client, $num_site) {
    try {
        $cnx = connexionPDO();
        $sql = "INSERT INTO contrat (No_contrat, nb_jour, enveloppe, signer, id_salarie, id_salarie_1, code_client, num_site) 
                VALUES (:No_contrat, :nb_jour, :enveloppe, :signer, :id_salarie, :id_salarie_1, :code_client, :num_site)";
        $req = $cnx->prepare($sql);
        $req->bindParam(':No_contrat', $No_contrat);
        $req->bindParam(':nb_jour', $nb_jour);
        $req->bindParam(':enveloppe', $enveloppe);
        $req->bindParam(':signer', $signer);
        $req->bindParam(':id_salarie', $id_salarie);
        $req->bindParam(':id_salarie_1', $id_salarie_1);
        $req->bindParam(':code_client', $code_client);
        $req->bindParam(':num_site', $num_site);
        return $req->execute();
    } catch (PDOException $e) {
        error_log("Erreur lors de l'ajout d'un contrat : " . $e->getMessage());
        return false;
    }
}

?>
