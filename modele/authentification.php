<?php

include_once "bd.utilisateur.inc.php";

function login($username, $mdp) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMailU($username);
    $mdpBD = $util["mdp"];

    if (trim($mdpBD) == trim(crypt($mdp, $mdpBD))) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["username"] = $username;
        $_SESSION["mdp"] = $mdpBD;
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["username"]);
    unset($_SESSION["mdp"]);
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["username"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["username"])) {
        $util = getUtilisateurByMailU($_SESSION["username"]);
        if ($util["username"] == $_SESSION["username"] && $util["mdp"] == $_SESSION["mdp"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

?>