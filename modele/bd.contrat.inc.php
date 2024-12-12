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
function updateContrat($id_Contrat, $nb_jour, $enveloppe, $signature1, $id_salarie, $id_salarie_1, $code_client, $num_site) {
    try {
        // Connexion à la base de données
        $cnx = connexionPDO();

        // Requête SQL pour la mise à jour
        $sql = "UPDATE contrat
                SET nb_jour = :nb_jour, 
                    enveloppe = :enveloppe, 
                    signer = :signer, 
                    id_salarie = :id_salarie, 
                    id_salarie_1 = :id_salarie_1, 
                    code_client = :code_client, 
                    num_site = :num_site 
                WHERE No_contrat = :No_contrat";

        // Préparation de la requête
        $stmt = $cnx->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nb_jour', $nb_jour);
        $stmt->bindParam(':enveloppe', $enveloppe);
        $stmt->bindParam(':signer', $signature1);
        $stmt->bindParam(':id_salarie', $id_salarie);
        $stmt->bindParam(':id_salarie_1', $id_salarie_1);
        $stmt->bindParam(':code_client', $code_client);
        $stmt->bindParam(':num_site', $num_site);
        $stmt->bindParam(':No_contrat', $id_Contrat);

        // Exécution de la requête
        return $stmt->execute();
    } catch (PDOException $e) {
        // Enregistre l'erreur dans les logs et retourne false
        error_log("Erreur lors de la mise à jour d'un contrat : " . $e->getMessage());
        return false;
    }
}



function deleteContrat($No_contrat) {
    try {
        // Connexion à la base de données
        $cnx = connexionPDO();

        // Requête SQL pour la suppression
        $sql = "DELETE FROM contrat WHERE No_contrat = :No_contrat";

        // Préparation de la requête
        $stmt = $cnx->prepare($sql);

        // Liaison du paramètre
        $stmt->bindParam(':No_contrat', $No_contrat);

        // Exécution de la requête
        return $stmt->execute();
    } catch (PDOException $e) {
        // Enregistre l'erreur dans les logs et retourne false
        error_log("Erreur lors de la suppression d'un contrat : " . $e->getMessage());
        return false;
    }
}


?>
