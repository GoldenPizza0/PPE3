
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
        $libelle = $_GET['id'];
        SuppClient($libelle);
        $message = "suppression faite";
        include ("vue/v_message.php");
        break;
    }
    case 'SupprimerSite':
    {
        $id = $_GET['id'];
        $site = $_GET['site'];
        SuppSite($id,$site);
        $message = "suppression faite";
        include ("vue/v_message.php");
        break;
    }
    case 'ModifierClient' :
    {
        $libelle = $_POST['idClient'];
        include ("vue/v_message.php");
        break;
    }
    case 'ModifierSite' :
    {
        $libelle = $_POST['idClient'];
        include ("vue/v_message.php");
        break;
    }
    case 'CreerClient' :
    {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $adresse = $_POST['adresse'];
            $client = $_POST['client'];
            $act = $_POST['Secteur'];
            CreationClient($adresse,$client,$act);
            $message = "création faite";
            include ("vue/v_message.php");
            break;
        }
        include("vue/v_creationClient.php");
    }
    case 'CreerSite' :
    {
        
        $libelle = $_POST['idClient'];
        include ("vue/v_message.php");
        break;
    }
}




?>



