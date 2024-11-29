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
    case 'Supprimer':
    {
        if (isset($_GET["libelle"])) {
            $libelle = $_GET["libelle"];
        } 
        switch($libelle)
        {
            case 'Client':
            {
                $id = $_REQUEST['idClient'];


            }
            case 'Site':
            {
                $id = $_REQUEST['id'];


            }
            case 'Secteur':
            {
                $id = $_REQUEST['id'];


            }
        }
    }
    // case 'Modifier' :
    // {
    //     $libelle = $_REQUEST['libelle'];
    //     switch($libelle)
    //     {
    //         case 'Client':
    //         {
    //             $id = $_REQUEST['id'];


    //         }
    //         case 'Site':
    //         {
    //             $id = $_REQUEST['id'];


    //         }
    //         case 'Secteur':
    //         {
    //             $id = $_REQUEST['id'];


    //         }


    //     }
    // }
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



