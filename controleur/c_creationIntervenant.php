<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'creationIntervenant':
		{
			include("vues/v_creationIntervenant.php");
			break;
		}
		case 'confirmCreatIntervenant':
		{
			$nom = $_REQUEST['nomS'];
			$prenom = $_REQUEST['prenomS'];
			$niveauEtudes = $_REQUEST['niveauEtudes'];
			$maitreAnglais = $_REQUEST['maitriseAnglais'];
			$pdo->creerIntervenant($nom,$prenom,$niveauEtudes,$maitreAnglais);
			
			//soit ce code :
			$lesClients = $pdo->getLesIntervenants();
			include("vues/v_intervenants.php");	
			
			// ou ce code :
			//header('Location: index.php');	
			break;
		}
	}
?>