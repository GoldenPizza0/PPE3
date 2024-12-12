<?php
	if (isset($_GET["action"])) {
		$action = $_GET["action"];
	} 
	else {
		$action = "voirCommerciaux";
	}

	if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
		$racine = "..";
	}

	include "vue/entete.php";

	switch($action)
	{
		case 'voirCommerciaux':
		{
			$lesCommerciaux = $pdo->getLesCommerciaux();
			include("vue/v_commerciaux.php");
		break;
		}

		case 'creationCommercial':
		{
			include("vue/v_creationCommercial.php");
			break;
		}
		case 'confirmCreatCommercial':
		{
			$nom = $_REQUEST['TNom'];
			$prenom = $_REQUEST['TPrenom'];
			$portable = $_REQUEST['TPortable'];
			$fixe = $_REQUEST['TFixe'];
			$secteur = $_REQUEST['TSecteur'];
			$pdo->creerCommercial($nom,$prenom,$portable,$fixe,$secteur);
			
			include("vue/v_commerciaux_redirection.php");	
			break;
		}
		
		case 'modificationCommercial':
		{
			include("vue/v_modificationCommercial.php");
			break;
		}
		case 'confirmModifCommercial':
		{
			$id_Commercial = $_REQUEST['TId'];
			$nom = $_REQUEST['TNom'];
			$prenom = $_REQUEST['TPrenom'];
			$portable = $_REQUEST['TPortable'];
			$fixe = $_REQUEST['TFixe'];
			$secteur = $_REQUEST['TSecteur'];
			$pdo->modifierCommercial($id_Commercial,$nom,$prenom,$portable,$fixe,$secteur);
			
			include("vue/v_commerciaux_redirection.php");	
			break;
		}

		case 'suppressionCommercial':
		{
			include("vue/v_suppressionCommercial.php");
			break;
		}
		case 'confirmSuppCommercial':
		{
			$id_Commercial = $_REQUEST['TId'];
			$pdo->supprimerCommercial($id_Commercial);
			
			include("vue/v_commerciaux_redirection.php");	
			break;
		}
	}
?>