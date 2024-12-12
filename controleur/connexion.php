<?php
// $action :variable d'aiguillage
if (isset($_GET["action"])) {
    $action = $_GET["action"];
} 
else {
    $action = "seConnecter";
}

// $action = $_GET['action'];
switch($action)
{
    case 'seConnecter':
    {
        if (isset($_SESSION['id'])){
            echo 'Vous etes deja connecte';
        }
        else{
            $identifiant='';
            $mdp='';
            include("vue/vueAuthentification.php");
            break;
        }
    }

    case 'confirmerConnexion':
    {
        $msgErreurs = getErreursSaisieConnexion($_POST['identifiant'], $_POST['mdp']);
        if ($msgErreurs==null) {
            if ($pdo->connecter($_POST['identifiant'], $_POST['mdp'])){
                echo "Bienvenue ",$_POST['identifiant']," avec le mot de passe : ",$_POST['mdp'];
                $_SESSION["id"]=$_POST['identifiant'];
                ?>
                <a href="index.php?uc=accueil">lien accueil</a>
            <?php
            }else{
                echo "Erreur de login";
            }
        }else{
			echo $msgErreurs;
		}
        break;
    }
}
?>