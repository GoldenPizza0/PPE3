<?php

include_once "bd.inc.php";

function getUtilisateurs() {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from profil");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByMail($username) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from profil where username=:username");
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addUtilisateur($username, $mdp) {
    try {
        $cnx = connexionPDO();

        $mdpUCrypt = crypt($mdp, "sel");
        $req = $cnx->prepare("insert into utilisateur (mailU, mdpU) values(:mailU,:mdpU)");
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdpUCrypt, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


?>