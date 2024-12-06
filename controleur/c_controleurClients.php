
<?php
// $action :variable d'aiguillage
if (isset($_GET["action"])) {
    $action = $_GET["action"];
} 
else {
    $action = "voirTableauClientSite";
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.client.inc.php";
include "vue/entete.php";
switch($action)
{
    case 'voirTableauClientSite':
    {
        $nClients = nbClients();
        if($nClients > 0)
        {
            $lesClientsEtSites = getLesClientsEtSites();
            include("vue/v_tableauAdminClient.php");
        }
        else
        {
            $message = "pas de clients";
            include ("vue/v_message.php");
        }
        break;
    }
    case 'SupprimerClient':
    {
        echo "id : ".$_GET['id'];
        $libelle = $_GET['id'];
        SuppClient($libelle);
        include("./?uc=client");
    }
    case 'SupprimerSite':
    {
        $libelle = $_POST['idClient'];
        include ("vue/v_message.php");
    }
    case 'SupprimerSecteur':
    {
        $libelle = $_POST['idClient'];
        include ("vue/v_message.php");
    }
    case 'ModifierClient' :
    {
        $libelle = $_POST['idClient'];
        include ("vue/v_message.php");
    }
    case 'ModifierSite' :
    {
        $libelle = $_POST['idClient'];
        include ("vue/v_message.php");
    }
    case 'ModifierSecteur' :
    {
        $libelle = $_POST['idClient'];
        include ("vue/v_message.php");
    }
    // case 'Creer':
    // {
    //     $libelle = $_REQUEST['libelle'];
    //     switch($libelle)
    //     {
    //         case 'Client':
    //         {


    //         }
    //         case 'Site':
    //         {


    //         }
    //         case 'Secteur':
    //         {


    //         }

    //     }
    // }
}




?>



