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
 * Créer un intervenant
 *
 * Créer un intervenant à partir des arguments validés passés en paramètre
*/
	public function creerIntervenant($nom,$prenom,$NE,$MA)
	{
		$res = PdoEsteria::$monPdo->prepare('INSERT INTO salarie (nom_salarie, 
			prenom_salarie) VALUES( :nom, 
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
	
	/**
	 * Savoir le nombre de clients
	 *
	 * @return int nombre clients
	*/
	public function nbClients(){
		$req = "select count(*) from client;";
		$res = PdoEsteria::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	/**
	 * Prendre la totalité des clients avec leurs sites associés
	 *
	 * @return array les clients et leurs sites 
	*/
	public function getLesClientsEtSites(){
		$req1 = "select code_client as client, adresse, societe, libelle_act as secteur from client join secteur on client.id_act on secteur.id_act";
		$res1 = PdoEsteria::$monPdo->query($req1);
		$lesClients = $res1->fetchAll();
		$req2 = "select num_site as site, code_client as client, nom_site as nom, adresse_site as adresse, referent from site ";
		$res2 = PdoEsteria::$monPdo->query($req2);
		$lesSites = $res2->fetchAll();
		$lesClientsEtSites = array();
		foreach($lesClients as $UnClient){
			$SitesDeClient = array();
			foreach($lesSites as $UnSite){
				if ($UnSite["client"] = $UnClient["client"]){
					$UnSiteDeClient = [
						"site : ".$UnSite["site"],
						"nom : ".$UnSite["nom"],
						"adresse : ".$UnSite["adresse"],
						"referent : ".$UnSite["referent"],
					];
					$SitesDeClient += $UnSiteDeClient;
				}
			}
			$UnClientsEtSites = [
				"client : ".$UnClient["client"],
				"adresse : ".$UnClient["adresse"],
				"societe : ".$UnClient["societe"],
				"secteur : ".$UnClient["secteur"],
				"sites : ".$SitesDeClient,
			];
			$lesClientsEtSites = $UnClientsEtSites;
		}
		return $lesClientsEtSites;
	}
}
?>