<?php

	if (isset($_GET["action"])) {
		$action = $_GET["action"];
	} 
	else {
		$action = "voirSecteurs";
	}

	if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
		$racine = "..";
	}

	$titre = "Gestion Secteur";
	include "vue/entete.php";

	switch($action)
	{
		case 'voirSecteurs':
		{
			$lesSecteurs = $pdo->getLesSecteurs();
			include("vue/v_secteurs.php");
		break;
		}

		case 'creationSecteur':
		{
			include("vue/v_creationSecteur.php");
			break;
		}
		case 'confirmCreatSecteur':
		{
			$libelle = $_REQUEST['TLibelle'];
			$pdo->creerSecteur($libelle);
			
			include("vue/v_secteurs_redirection.php");	
			break;
		}
		
		case 'modificationSecteur':
		{
			include("vue/v_modificationSecteur.php");
			break;
		}
		case 'confirmModifSecteur':
		{
			$id_Secteur = $_REQUEST['TId'];
			$libelle = $_REQUEST['TLibelle'];
			$pdo->modifierSecteur($id_Secteur,$libelle);
			
			include("vue/v_secteurs_redirection.php");	
			break;
		}

		case 'suppressionSecteur':
		{
			include("vue/v_suppressionSecteur.php");
			break;
		}
		case 'confirmSuppSecteur':
		{
			$id_Secteur = $_REQUEST['TId'];
			$supp_secteur = $pdo->supprimerSecteur($id_Secteur);
			
			include("vue/v_secteurs_redirection_erreur.php");	
			break;
		}
	}
?>