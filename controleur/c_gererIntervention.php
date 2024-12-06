<?php
	if (isset($_GET["action"])) {
		$action = $_GET["action"];
	} 
	else {
		$action = "voirInterventions";
	}

	if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
		$racine = "..";
	}

	$titre = "Gestion Interventions";
	include "vue/entete.php";
	
	switch($action)
	{
		case 'voirInterventions':
		{
			$lesInterventions = $pdo->getLesInterventions();
			include("vue/v_interventions.php");
		break;
		}

		case 'creationIntervention':
		{
			include("vue/v_creationIntervention.php");
			break;
		}
		case 'confirmCreatIntervention':
		{
			$noC = $_REQUEST['TNoC'];
			$intitule = $_REQUEST['TInt'];
			$debut = $_REQUEST['TD'];
			$fin = $_REQUEST['TF'];
			$prix = $_REQUEST['TP'];
			$etat = $_REQUEST['TE'];
			$domaine = $_REQUEST['TDomaine'];
			$pdo->creerIntervention($noC,$intitule,$debut,$fin,$prix,$etat,$domaine);
			
			include("vue/v_interventions_redirection.php");	
			break;
		}
		
		case 'modificationIntervention':
		{
			include("vue/v_modificationIntervention.php");
			break;
		}
		case 'confirmModifIntervention':
		{
			$numI = $_REQUEST['TNum'];
			$noC = $_REQUEST['TNoC'];
			$intitule = $_REQUEST['TInt'];
			$debut = $_REQUEST['TD'];
			$fin = $_REQUEST['TF'];
			$prix = $_REQUEST['TP'];
			$etat = $_REQUEST['TE'];
			$domaine = $_REQUEST['TDomaine'];
			$pdo->modifierIntervention($noC,$numI,$intitule,$debut,$fin,$prix,$etat,$domaine);
			
			include("vue/v_interventions_redirection.php");	
			break;
		}

		case 'suppressionIntervention':
		{
			include("vue/v_suppressionIntervention.php");
			break;
		}
		case 'confirmSuppIntervention':
		{
			$num_Intervention = $_REQUEST['TNum'];
			$pdo->supprimerIntervention($num_Intervention);
			
			include("vue/v_interventions_redirection.php");	
			break;
		}
	}
?>