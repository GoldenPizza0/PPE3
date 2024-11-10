<?php
// $action :variable d'aiguillage
$action = $_REQUEST['action'];
switch($action)
{
    case 'voirTableauClientSite':
    {
        $nClients = nbClients();
        if($n >0)
        {
            $lesClientsEtSites = $pdo->getLesClientsEtSites();
            include("vues/v_tableauAdminClient.php");
        }
        else
        {
            $message = "pas de clients";
            include ("vues/v_message.php");
        }
        break;
    }
    case 'Supprimer':
    {
        $libelle = $_REQUEST['libelle'];
        switch($libelle)
        {
            case 'Client':
            {
                $id = $_REQUEST['id'];


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
    case 'Modifier' :
    {
        $libelle = $_REQUEST['libelle'];
        switch($libelle)
        {
            case 'Client':
            {
                $id = $_REQUEST['id'];


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
    case 'Creer':
    {
        $libelle = $_REQUEST['libelle'];
        switch($libelle)
        {
            case 'Client':
            {


            }
            case 'Site':
            {


            }
            case 'Secteur':
            {


            }




        }
    }
}




?>



