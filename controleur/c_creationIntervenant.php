<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'creationIntervenant':
		{
			include("vue/v_creationIntervenant.php");
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
			include("vue/v_intervenants_redirection.php");	
			
			// ou ce code :
			//header('Location: index.php');	
			break;
		}
		case 'voirIntervenants':
			{$lesIntervenants = $pdo->getLesIntervenants();include("vue/v_intervenants.php");break;}
			
	}
?>