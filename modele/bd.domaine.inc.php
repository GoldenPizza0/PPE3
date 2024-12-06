<?php
function getArbreDomaine() {
    $cnx = connexionPDO();
    $sql = "SELECT d.code_domaine, d.libelle, f.id_f, f.libelle_f 
            FROM domaine d
            LEFT JOIN famille f ON d.id_f = f.id_f";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCouvreRelations() {
    $cnx = connexionPDO();
    $sql = "SELECT * FROM couvre";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
