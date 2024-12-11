<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application TransNat
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoTransNat qui contiendra l'unique instance de la classe
 *
 */

class PdoSteria
{   		
	private static $serveur='mysql:host=localhost'; //db672809222.db.1and1.com
	private static $bdd='dbname=esn_steria'; //db672809222  		
	private static $user='root' ; //dbo672809222		
	private static $mdp='' ; //4FsiBA8FYNuk
	private static $monPdo;
	private static $monPdoEsteria = null;
	/**
	 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
	 * pour toutes les méthodes de la classe
	 */				
	private function __construct()
	{
		PdoSteria::$monPdo = new PDO(PdoSteria::$serveur.';'.PdoSteria::$bdd, PdoSteria::$user, PdoSteria::$mdp); 
		PdoSteria::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoSteria::$monPdo = null;
	}
	/**
	 * Fonction statique qui crée l'unique instance de la classe
	 *
	 
	* Appel : $instancePdoTransNat = PdoTransNat::getPdoTransNat();
	* @return l'unique objet de la classe PdoTransNat
	*/
	public  static function getPdoEsteria()
	{
		if(PdoSteria::$monPdoEsteria == null)
		{
			PdoSteria::$monPdoEsteria= new PdoSteria();
		}
		return PdoSteria::$monPdoEsteria;  
	}
	/**
	 * Retourne tous les Intervenants sous forme d'un tableau associatif
	 *
	 * @return le tableau associatif des intervenants
	*/
	public function getLesIntervenants()
	{
		$res = "select salarie.id_salarie, nom_salarie, prenom_salarie, niveau_etude, maitrise_an from salarie inner join intervenant on salarie.id_salarie = intervenant.id_salarie";
		$res = PdoSteria::$monPdo->query($res);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	/** PENSER A LIER AU SECTEUR
	 * Retourne tous les Commerciaux sous forme d'un tableau associatif
	 *
	 * @return le tableau associatif des commerciaux
	*/
	public function getLesCommerciaux()
	{
		$res = "select salarie.id_salarie, nom_salarie, prenom_salarie, portable, fixe, id_act from salarie inner join commercial on salarie.id_salarie = commercial.id_salarie";
		$res = PdoSteria::$monPdo->query($res);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	/**
	 * Retourne tous les Secteurs sous forme d'un tableau associatif
	 *
	 * @return le tableau associatif des secteurs
	*/
	public function getLesSecteurs()
	{
		$res = "select * from secteur";
		$res = PdoSteria::$monPdo->query($res);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	/**
	 * Retourne les Interventions sous forme d'un tableau associatif
	 *
	 * @return le tableau associatif des interventions
	*/
	function getLesInterventions()
	{
        $pdo = connexionPDO();
        $res = "select * from intervention order by No_contrat";
        $res = $pdo->query($res);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
	/**
	 * Retourne les Domaines sous forme d'un tableau associatif
	 *
	 * @return le tableau associatif des domaines
	*/
	function getLesDomaines()
	{
        $pdo = connexionPDO();
        $res = "select code_domaine, libelle from domaine";
        $res = $pdo->query($res);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
	/**
	 * Retourne les Domaines sous forme d'un tableau associatif
	 *
	 * @return le tableau associatif des domaines
	*/
	function getLesContrats()
	{
        $pdo = connexionPDO();
        $res = "select No_contrat from contrat";
        $res = $pdo->query($res);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
	/**
	 * Retourne un Intervenant sous forme d'un tableau associatif
	 *
	 * @return le tableau associatif de un intervenant
	*/
	public function getUnIntervenant($id_Intervenant)
	{
		$res = "select salarie.id_salarie, nom_salarie, prenom_salarie, niveau_etude, maitrise_an from salarie inner join intervenant on salarie.id_salarie = intervenant.id_salarie where salarie.id_salarie = $id_Intervenant";
		$res = PdoSteria::$monPdo->query($res);
		$laLigne = $res->fetchAll();
		return $laLigne;
	}
	/**
	 * Retourne un Commercial sous forme d'un tableau associatif
	 *
	 * @return le tableau associatif de un commercial
	*/
	public function getUnCommercial($id_Commercial)
	{
		$res = "select salarie.id_salarie, nom_salarie, prenom_salarie, portable, fixe, id_act from salarie inner join commercial on salarie.id_salarie = commercial.id_salarie where salarie.id_salarie = $id_Commercial";
		$res = PdoSteria::$monPdo->query($res);
		$laLigne = $res->fetchAll();
		return $laLigne;
	}
	/**
	 * Retourne un Secteur sous forme d'un tableau associatif
	 *
	 * @return le tableau associatif de un secteur
	*/
	public function getUnSecteur($id_secteur)
	{
		$res = "select * from secteur where id_act = $id_secteur";
		$res = PdoSteria::$monPdo->query($res);
		$laLigne = $res->fetchAll();
		return $laLigne;
	}
	/**
	 * Retourne une Intervention sous forme d'un tableau associatif
	 *
	 * @return le tableau associatif d'une intervention
	*/
	public function getUneIntervention($num_intervention)
	{
		$res = "select * from intervention where num_intervention = $num_intervention";
		$res = PdoSteria::$monPdo->query($res);
		$laLigne = $res->fetchAll();
		return $laLigne;
	}
	/**
	 * Retourne une affectation sous forme d'un tableau associatif
	 *
	 * @return le tableau associatif d'une affectation
	*/
	public function getUneAffecte($num_intervention, $noC)
	{
		$res = "select * from affecte where num_intervention = $num_intervention and No_contrat = $noC";
		$res = PdoSteria::$monPdo->query($res);
		$laLigne = $res->fetchAll();
		return $laLigne;
	}
	/**
	 * Retourne une qualification sous forme d'un tableau associatif
	 *
	 * @return le tableau associatif d'une qualification
	*/
	public function getUneQualification($id)
	{
		$res = "select * from qualification where id_salarie = $id";
		$res = PdoSteria::$monPdo->query($res);
		$laLigne = $res->fetchAll();
		return $laLigne;
	}
	/**
	 * Créer un intervenant 
	 *
	 * Créer un intervenant à partir des arguments validés passés en paramètre
	*/
	public function creerIntervenant($nom,$prenom,$NE,$MA)
	{
		$res1 = PdoSteria::$monPdo->prepare('INSERT INTO salarie (nom_salarie, 
			prenom_salarie) VALUES( :nom, 
			:prenom)');
		$res1->bindValue('nom',$nom, PDO::PARAM_STR);
		$res1->bindValue('prenom', $prenom, PDO::PARAM_STR);
		$res1->execute();

		$id_salarie = PdoSteria::$monPdo->query('SELECT MAX(id_salarie) AS max_id FROM salarie');
		$num_id_salarie = $id_salarie->fetch(PDO::FETCH_ASSOC);
		$max_id = $num_id_salarie['max_id'];
		
		$res2 = PdoSteria::$monPdo->prepare('INSERT INTO intervenant (id_salarie, niveau_etude, 
			maitrise_an) VALUES( :id, :NE, 
			:MA)');
		$res2->bindValue('id', $max_id, PDO::PARAM_INT);
		$res2->bindValue('NE',$NE, PDO::PARAM_STR);
		$res2->bindValue('MA', $MA, PDO::PARAM_STR);
		$res2->execute();
	}
	/**
	 * Créer un commercial 
	 *
	 * Créer un commercial à partir des arguments validés passés en paramètre
	*/
	public function creerCommercial($nom,$prenom,$portable,$fixe,$secteur)
	{
		$res1 = PdoSteria::$monPdo->prepare('INSERT INTO salarie (nom_salarie, 
			prenom_salarie) VALUES( :nom, 
			:prenom)');
		$res1->bindValue('nom',$nom, PDO::PARAM_STR);
		$res1->bindValue('prenom', $prenom, PDO::PARAM_STR);
		$res1->execute();

		$id_salarie = PdoSteria::$monPdo->query('SELECT MAX(id_salarie) AS max_id FROM salarie');
		$num_id_salarie = $id_salarie->fetch(PDO::FETCH_ASSOC);
		$max_id = $num_id_salarie['max_id'];
		
		$res2 = PdoSteria::$monPdo->prepare('INSERT INTO commercial (id_salarie, portable, 
			fixe, id_act) VALUES( :id, :portable, :fixe, :secteur)');
		$res2->bindValue('id', $max_id, PDO::PARAM_INT);
		$res2->bindValue('portable',$portable, PDO::PARAM_STR);
		$res2->bindValue('fixe', $fixe, PDO::PARAM_STR);
		$res2->bindValue('secteur', $secteur, PDO::PARAM_STR);
		$res2->execute();
	}
	/**
	 * Créer un secteur 
	 *
	 * Créer un secteur à partir des arguments validés passés en paramètre
	*/
	public function creerSecteur($libelle)
	{
		$res = PdoSteria::$monPdo->prepare('INSERT INTO secteur (libelle_act) VALUES( :libelle)');
		$res->bindValue('libelle',$libelle, PDO::PARAM_STR);
		$res->execute();
	}
	/**
	 * Créer une intervention
	 *
	 * Créer une intervention à partir des arguments validés passés en paramètre
	*/
	public function creerIntervention($noC, $intitule, $debut, $fin, $prix, $etat, $domaine)
	{ 
		$res1 = PdoSteria::$monPdo->query("SELECT MAX(num_intervention)+1 as num FROM intervention WHERE No_contrat = '$noC'");
		(int)$num_intervention = $res1->fetchColumn();
		if ($num_intervention == 0){
			$num_intervention = 1;
		}
		$res2 = PdoSteria::$monPdo->prepare('INSERT INTO intervention (No_contrat, num_intervention, intitule, debut, fin, prix, 
		etat, code_domaine) VALUES( :noC, :numI, :intitule, :debut, :fin, :prix, :etat, :domaine)');
		$res2->bindValue('noC',$noC, PDO::PARAM_STR);
		$res2->bindValue('numI',$num_intervention, PDO::PARAM_STR);
		$res2->bindValue('intitule',$intitule, PDO::PARAM_STR);
		$res2->bindValue('debut',$debut, PDO::PARAM_STR);
		$res2->bindValue('fin',$fin, PDO::PARAM_STR);
		$res2->bindValue('prix',$prix, PDO::PARAM_STR);
		$res2->bindValue('etat',$etat, PDO::PARAM_STR);
		$res2->bindValue('domaine',$domaine, PDO::PARAM_STR);
		$res2->execute();
	}
	/**
	 * Créer une affectation
	 *
	 * Créer une affectation à partir des arguments validés passés en paramètre
	*/
	public function creerAffecte($noC, $intervenant, $duree)
	{ 
		$res1 = PdoSteria::$monPdo->query("SELECT MAX(num_intervention) as num FROM intervention WHERE No_contrat = '$noC'");
		(int)$num_intervention = $res1->fetchColumn();

		$res2 = PdoSteria::$monPdo->prepare('INSERT INTO affecte (No_contrat, num_intervention, id_salarie, duree) 
		VALUES( :noC, :numI, :salarie, :duree)');
		$res2->bindValue('noC',$noC, PDO::PARAM_STR);
		$res2->bindValue('numI',$num_intervention, PDO::PARAM_STR);
		$res2->bindValue('salarie',$intervenant, PDO::PARAM_STR);
		$res2->bindValue('duree',$duree, PDO::PARAM_STR);
		$res2->execute();
	}
	/**
	 * Créer une qualification
	 *
	 * Créer une qualification à partir des arguments validés passés en paramètre
	*/
	public function creerQualification($nom, $prenom, $domaine, $prix)
	{ 
		$res1 = PdoSteria::$monPdo->query("SELECT MAX(id_salarie) FROM salarie WHERE nom_salarie = '$nom' and prenom_salarie = '$prenom'");
		(int)$id_salarie = $res1->fetchColumn();

		$res2 = PdoSteria::$monPdo->prepare('INSERT INTO qualification (id_salarie, code_domaine, prix_jour) 
		VALUES( :id, :code, :prix)');
		$res2->bindValue('id',$id_salarie, PDO::PARAM_STR);
		$res2->bindValue('code',$domaine, PDO::PARAM_STR);
		$res2->bindValue('prix',$prix, PDO::PARAM_STR);
		$res2->execute();
	}
	/**
	 * Modifier un intervenant 
	 *
	 * Modifier un intervenant à partir des arguments validés passés en paramètre
	*/
	public function modifierIntervenant($id_salarie,$nom,$prenom,$NE,$MA)
	{
		$res1 = PdoSteria::$monPdo->prepare('UPDATE salarie SET nom_salarie = :nom,
			prenom_salarie = :prenom WHERE id_salarie = :id');
		$res1->bindValue('id',$id_salarie, PDO::PARAM_INT);
		$res1->bindValue('nom',$nom, PDO::PARAM_STR);
		$res1->bindValue('prenom', $prenom, PDO::PARAM_STR);
		$res1->execute();
		
		$res2 = PdoSteria::$monPdo->prepare('UPDATE intervenant SET niveau_etude = :NE, 
			maitrise_an = :MA WHERE id_salarie = :id');
		$res2->bindValue('id', $id_salarie, PDO::PARAM_INT);
		$res2->bindValue('NE',$NE, PDO::PARAM_STR);
		$res2->bindValue('MA', $MA, PDO::PARAM_STR);
		$res2->execute();
	}
	/**
	 * Modifier un commercial 
	 *
	 * Modifier un commercial à partir des arguments validés passés en paramètre
	*/
	public function modifierCommercial($id_salarie,$nom,$prenom,$portable,$fixe,$secteur)
	{
		$res1 = PdoSteria::$monPdo->prepare('UPDATE salarie SET nom_salarie = :nom,
			prenom_salarie = :prenom WHERE id_salarie = :id');
		$res1->bindValue('id',$id_salarie, PDO::PARAM_INT);
		$res1->bindValue('nom',$nom, PDO::PARAM_STR);
		$res1->bindValue('prenom', $prenom, PDO::PARAM_STR);
		$res1->execute();
		
		$res2 = PdoSteria::$monPdo->prepare('UPDATE commercial SET portable = :portable, 
			fixe = :fixe, id_act = :secteur WHERE id_salarie = :id');
		$res2->bindValue('id', $id_salarie, PDO::PARAM_INT);
		$res2->bindValue('portable',$portable, PDO::PARAM_STR);
		$res2->bindValue('fixe', $fixe, PDO::PARAM_STR);
		$res2->bindValue('secteur', $secteur, PDO::PARAM_STR);
		$res2->execute();
	}
	/**
	 * Modifier un secteur 
	 *
	 * Modifier un secteur à partir des arguments validés passés en paramètre
	*/
	public function modifierSecteur($id_secteur,$libelle)
	{
		$res = PdoSteria::$monPdo->prepare('UPDATE secteur SET libelle_act = :libelle WHERE id_act = :id');
		$res->bindValue('id',$id_secteur, PDO::PARAM_INT);
		$res->bindValue('libelle',$libelle, PDO::PARAM_STR);
		$res->execute();
	}
	/**
	 * Modifier une intervention
	 *
	 * Modifier une intervention à partir des arguments validés passés en paramètre
	*/
	public function modifierIntervention($noC, $num, $intitule, $debut, $fin, $prix, $etat, $domaine)
	{
		$res = PdoSteria::$monPdo->prepare('UPDATE intervention SET No_contrat = :noC,
			intitule = :intitule, debut = :debut, fin = :fin, prix = :prix,
			etat = :etat, code_domaine = :domaine WHERE num_intervention = :num');
		$res->bindValue('noC',$noC, PDO::PARAM_STR);
		$res->bindValue('num',$num, PDO::PARAM_STR);
		$res->bindValue('intitule',$intitule, PDO::PARAM_STR);
		$res->bindValue('debut',$debut, PDO::PARAM_STR);
		$res->bindValue('fin',$fin, PDO::PARAM_STR);
		$res->bindValue('prix',$prix, PDO::PARAM_STR);
		$res->bindValue('etat',$etat, PDO::PARAM_STR);
		$res->bindValue('domaine',$domaine, PDO::PARAM_STR);
		$res->execute();
	}
	/**
	 * Modifier une affectation
	 *
	 * Modifier une affectation à partir des arguments validés passés en paramètre
	*/
	public function modifierAffecte($noC, $num, $salarie, $duree)
	{
		$res = PdoSteria::$monPdo->prepare('UPDATE affecte SET No_contrat = :noC,
			id_salarie = :salarie, duree = :duree WHERE num_intervention = :num');
		$res->bindValue('noC',$noC, PDO::PARAM_STR);
		$res->bindValue('num',$num, PDO::PARAM_STR);
		$res->bindValue('salarie',$salarie, PDO::PARAM_STR);
		$res->bindValue('duree',$duree, PDO::PARAM_STR);
		$res->execute();
	}
	/**
	 * Modifier une qualification
	 *
	 * Modifier une qualification à partir des arguments validés passés en paramètre
	*/
	public function modifierQualification($id, $domaine, $prix)
	{
		$res = PdoSteria::$monPdo->prepare('UPDATE qualification SET code_domaine = :code,
			prix_jour = :prix WHERE id_salarie = :id');
		$res->bindValue('id',$id, PDO::PARAM_STR);
		$res->bindValue('code',$domaine, PDO::PARAM_STR);
		$res->bindValue('prix',$prix, PDO::PARAM_STR);
		$res->execute();
	}
	/**
	 * Supprimer un intervenant 
	 *
	 * Supprimer un intervenant à partir des arguments validés passés en paramètre
	*/
	public function supprimerIntervenant($id_salarie)
	{
		$res1 = PdoSteria::$monPdo->prepare('DELETE FROM intervenant WHERE id_salarie = :id');
		$res1->bindValue('id',$id_salarie, PDO::PARAM_INT);
		$res1->execute();
		
		$res2 = PdoSteria::$monPdo->prepare('DELETE FROM salarie WHERE id_salarie = :id');
		$res2->bindValue('id', $id_salarie, PDO::PARAM_INT);
		$res2->execute();
	}
	/**
	 * Supprimer un commercial 
	 *
	 * Supprimer un commercial à partir des arguments validés passés en paramètre
	*/
	public function supprimerCommercial($id_salarie)
	{
		$res1 = PdoSteria::$monPdo->prepare('DELETE FROM commercial WHERE id_salarie = :id');
		$res1->bindValue('id',$id_salarie, PDO::PARAM_INT);
		$res1->execute();
		
		$res2 = PdoSteria::$monPdo->prepare('DELETE FROM salarie WHERE id_salarie = :id');
		$res2->bindValue('id', $id_salarie, PDO::PARAM_INT);
		$res2->execute();
	}
	/**
	 * Supprimer un secteur 
	 *
	 * Supprimer un secteur à partir des arguments validés passés en paramètre
	*/
	public function supprimerSecteur($id_secteur)
	{
		$reqClients = PdoSteria::$monPdo->query("SELECT COUNT(*) FROM client WHERE id_act = '$id_secteur'");
		$nb_clients = $reqClients->fetchColumn();

		$reqCommerciaux = PdoSteria::$monPdo->query("SELECT COUNT(*) FROM commercial WHERE id_act = '$id_secteur'");
		$nb_commerciaux = $reqCommerciaux->fetchColumn();

		if ($nb_clients > 0) {
			echo "Il faut d'abord supprimer le(s) client(s) associé(s) à ce secteur ! (secteur = '$id_secteur')";
		} 
		elseif ($nb_commerciaux > 0) {
			echo "Il faut d'abord supprimer le(s) commercial(aux) associé(s) à ce secteur ! (secteur = '$id_secteur')";
		} 
		else {
			$reqDelete = PdoSteria::$monPdo->prepare('DELETE FROM secteur WHERE id_act = :id_secteur');
			$reqDelete->bindValue('id_secteur', $id_secteur, PDO::PARAM_INT);
			if ($reqDelete->execute()) {
				echo "Secteur supprimé avec succès.";
			} else {
				echo "Erreur lors de la suppression du secteur.";
			}
		}
	}
	/**
	 * Supprimer une intervention 
	 *
	 * Supprimer une intervention à partir des arguments validés passés en paramètre
	*/
	public function supprimerIntervention($num_intervention)
	{
		$resDel = PdoSteria::$monPdo->prepare('DELETE FROM intervention WHERE num_intervention = :num');
		$resDel->bindValue('num',$num_intervention, PDO::PARAM_INT);
		$resDel->execute();
	}
	/**
	 * Supprimer une affectation 
	 *
	 * Supprimer une affectation à partir des arguments validés passés en paramètre
	*/
	public function supprimerAffecte($num_intervention, $noC)
	{
		$resDel = PdoSteria::$monPdo->prepare('DELETE FROM affecte WHERE num_intervention = :num AND No_contrat = :noc');
		$resDel->bindValue('num',$num_intervention, PDO::PARAM_INT);
		$resDel->bindValue('noc',$noC, PDO::PARAM_INT);
		$resDel->execute();
	}
	/**
	 * Supprimer une qualification 
	 *
	 * Supprimer une qualification à partir des arguments validés passés en paramètre
	*/
	public function supprimerQualification($id, $code)
	{
		$resDel = PdoSteria::$monPdo->prepare('DELETE FROM qualification WHERE id_salarie = :id AND code_domaine = :code');
		$resDel->bindValue('id',$id, PDO::PARAM_INT);
		$resDel->bindValue('code',$code, PDO::PARAM_INT);
		$resDel->execute();
	}
}
?>