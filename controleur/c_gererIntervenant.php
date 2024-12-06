<?php
	if (isset($_GET["action"])) {
		$action = $_GET["action"];
	} 
	else {
		$action = "voirIntervenants";
	}

	if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
		$racine = "..";
	}

	$titre = "Gestion Intervenant";
	include "vue/entete.php";
	
	switch($action)
	{
		case 'voirIntervenants':
		{
			$lesIntervenants = $pdo->getLesIntervenants();
			include("vue/v_intervenants.php");
		break;
		}

		case 'creationIntervenant':
		{
			include("vue/v_creationIntervenant.php");
			break;
		}
		case 'confirmCreatIntervenant':
		{
			$nom = $_REQUEST['TNom'];
			$prenom = $_REQUEST['TPrenom'];
			$niveauEtudes = $_REQUEST['TNE'];
			$maitreAnglais = $_REQUEST['TMA'];
			$pdo->creerIntervenant($nom,$prenom,$niveauEtudes,$maitreAnglais);
			
			include("vue/v_intervenants_redirection.php");	
			break;
		}
		
		case 'modificationIntervenant':
		{
			include("vue/v_modificationIntervenant.php");
			break;
		}
		case 'confirmModifIntervenant':
		{
			$id_Intervenant = $_REQUEST['TId'];
			$nom = $_REQUEST['TNom'];
			$prenom = $_REQUEST['TPrenom'];
			$niveauEtudes = $_REQUEST['TNE'];
			$maitreAnglais = $_REQUEST['TMA'];
			$pdo->modifierIntervenant($id_Intervenant,$nom,$prenom,$niveauEtudes,$maitreAnglais);
			
			include("vue/v_intervenants_redirection.php");	
			break;
		}

		case 'suppressionIntervenant':
		{
			include("vue/v_suppressionIntervenant.php");
			break;
		}
		case 'confirmSuppIntervenant':
		{
			$id_Intervenant = $_REQUEST['TId'];
			$pdo->supprimerIntervenant($id_Intervenant);
			
			include("vue/v_intervenants_redirection.php");	
			break;
		}
	}
?>