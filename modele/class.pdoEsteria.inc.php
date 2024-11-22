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

class PdoEsteria
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=esn_steria';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoEsteria = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
		PdoEsteria::$monPdo = new PDO(PdoEsteria::$serveur.';'.PdoEsteria::$bdd, PdoEsteria::$user, PdoEsteria::$mdp); 
		PdoEsteria::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoEsteria::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 
 * Appel : $instancePdoTransNat = PdoTransNat::getPdoTransNat();
 * @return l'unique objet de la classe PdoTransNat
 */
	public  static function getPdoEsteria()
	{
		if(PdoEsteria::$monPdoEsteria == null)
		{
			PdoEsteria::$monPdoEsteria= new PdoEsteria();
		}
		return PdoEsteria::$monPdoEsteria;  
	}
/**
 * Retourne tous les Intervenants sous forme d'un tableau associatif
 *
 * @return le tableau associatif des clients
*/
	public function getLesIntervenants()
	{
		$req = "select salarie.id_salarie, nom_salarie, prenom_salarie, niveau_etude, maitrise_an from salarie inner join intervenant on salarie.id_salarie = intervenant.id_salarie";
		$res = PdoEsteria::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
/**
 * Créer un intervenant 
 *
 * Créer un intervenant à partir des arguments validés passés en paramètre
*/
	public function creerIntervenant($nom,$prenom,$NE,$MA)
	{
		$res1 = PdoEsteria::$monPdo->prepare('INSERT INTO salarie (nom_salarie, 
			prenom_salarie) VALUES( :nom, 
			:prenom)');
		$res1->bindValue('nom',$nom, PDO::PARAM_STR);
		$res1->bindValue('prenom', $prenom, PDO::PARAM_STR);
		$res1->execute();

		$id_salarie = PdoEsteria::$monPdo->query('SELECT MAX(id_salarie) AS max_id FROM salarie');
		$num_id_salarie = $id_salarie->fetch(PDO::FETCH_ASSOC);
		$max_id = $num_id_salarie['max_id'];
		
		$res2 = PdoEsteria::$monPdo->prepare('INSERT INTO intervenant (id_salarie, niveau_etude, 
			maitrise_an) VALUES( :id, :NE, 
			:MA)');
		$res2->bindValue('id', $max_id, PDO::PARAM_STR);
		$res2->bindValue('NE',$NE, PDO::PARAM_STR);
		$res2->bindValue('MA', $MA, PDO::PARAM_STR);
		$res2->execute();
	}
	public function nbClients(){
		$req = "select count(*) from salarie inner join intervenant on salarie.id_salarie = intervenant.id_salarie";
		$res = PdoEsteria::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
}
?>