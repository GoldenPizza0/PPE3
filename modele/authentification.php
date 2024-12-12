<?php

include_once "bd.utilisateur.inc.php";

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
            $_SESSION['num'] = 1;
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

    if (isset($_SESSION["num"])) {
        $util = getUtilisateurByMail($_SESSION["username"]);
        if ($util["username"] == $_SESSION["username"] && $util["mdp"] == $_SESSION["mdp"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}


function getErreursSaisieConnexion($identifiant, $mdp)
{
	$lesErreurs = array();
	if($identifiant=="")
	{
		$lesErreurs[]="Il faut saisir le champ identifiant";
	}
	if($mdp=="")
	{
		$lesErreurs[]="Il faut saisir le champ mdp";
	}

	return $lesErreurs;
}

?>