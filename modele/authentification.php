<?php

include_once "bd.utilisateur.inc.php";

function login($username, $mdp) {
function login($username, $mdp) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMail($username);

    // Vérification que l'utilisateur existe
    if ($util && is_array($util)) {
        $mdpBD = $util["mdp"];
        
        if ($mdpBD == $mdp) {
            // Le mot de passe est correct
            $_SESSION["username"] = $username;
            $_SESSION["mdp"] = $mdpBD;
        }
    } else {
        // Gérer le cas où l'utilisateur n'existe pas
        error_log("Utilisateur non trouvé pour l'email : $username");
    }
}


function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["username"]);
    unset($_SESSION["mdp"]);
}

function getMailLoggedOn(){
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
        $util = getUtilisateurByMail($_SESSION["username"]);
        if ($util["username"] == $_SESSION["username"] && $util["mdp"] == $_SESSION["mdp"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

?>