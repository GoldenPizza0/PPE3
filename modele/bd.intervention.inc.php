<?php 

    include_once "bd.inc.php";

    function getLesIntervenantsParContrat($noC)
	{
        $pdo = connexionPDO();
        $req = "select * from intervention where No_contrat = '$noC'";
        $res = $pdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    function getLesContrats()
	{
        $pdo = connexionPDO();
        $req = "select * from contrat";
        $res = $pdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

?>
