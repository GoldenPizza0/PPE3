<?php
function getArbreDomaineHierarchie() {
    $cnx = connexionPDO();
    $sql = "SELECT d1.code_domaine AS code_domaine_couvre, 
                   d1.libelle AS libelle_couvre, 
                   f1.id_f, f1.libelle_f, 
                   d2.code_domaine AS code_domaine_couvert, 
                   d2.libelle AS libelle_couvert
            FROM domaine d1
            INNER JOIN famille f1 ON d1.id_f = f1.id_f
            LEFT JOIN couvre c ON d1.code_domaine = c.code_domaine
            LEFT JOIN domaine d2 ON c.code_domaine_1 = d2.code_domaine
            ORDER BY f1.id_f, d1.code_domaine";

    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getDomainecouvert() {
    $cnx = connexionPDO();
    $sql = "SELECT d.libelle
            FROM domaine d
            inner JOIN famille f ON d.id_f = f.id_f
            inner join couvre c ON c.code_domaine = d.code_domaine
            WHERE c.code_domaine_1 = d.code_domaine";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getDomaine() {
    $cnx = connexionPDO();
    $sql = "SELECT *
            FROM domaine ";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getnbbranchfamily() {
    $cnx = connexionPDO();
    $sql = "SELECT count(id_f) 
            FROM famille ";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getCouvreRelations() {
    $cnx = connexionPDO();
    $sql = "SELECT * FROM couvre";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 function getdomainecouvertbyid($domaine){
    $cnx = connexionPDO();
    $sql = "SELECT code_domaine_1 FROM couvre where code_domaine = $domaine";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }

 function isinarray($var,$tab){
     // Vérifie si le mot est dans le tableau
     if(in_array($var, $tab) == true){
        return true ;
     }
     return false;
    }
 