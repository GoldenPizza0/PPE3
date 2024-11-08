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
      	private static $bdd='dbname=esn_esteria';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoTransNat = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		getPdoEsteria::$monPdo = new PDO(PdoEsteria::$serveur.';'.PdoEsteria::$bdd, PdoEsteria::$user, PdoEsteria::$mdp); 
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
		if(PdoEsteria::$monPdoTransNat == null)
		{
			PdoEsteria::$monPdoTransNat= new PdoEsteria();
		}
		return PdoEsteria::$monPdoTransNat;  
	}
/**
 * Retourne tous les clients sous forme d'un tableau associatif
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
 * Créer un client 
 *
 * Créer un client à partir des arguments validés passés en paramètre
*/
	public function creerIntervenant($nom,$prenom,$NE,$MA)
	{
		$res = PdoEsteria::$monPdo->prepare('INSERT INTO salarie (nom_salarie, 
			prenom_salarie VALUES( :nom, 
			:prenom)');
		$res->bindValue('nom',$nom, PDO::PARAM_STR);
		$res->bindValue('prenom', $prenom, PDO::PARAM_STR);   
		$res->execute();
		$res = PdoEsteria::$monPdo->prepare('INSERT INTO intervenant (niveau_etude, 
			maitrise_an VALUES( :NE, 
			:MA)');
		$res->bindValue('NE',$NE, PDO::PARAM_STR);
		$res->bindValue('MA', $MA, PDO::PARAM_STR);   
		$res->execute();
	}
}
?>