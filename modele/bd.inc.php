<?php

function connexionPDO() {
    $login = "root"; //dbo672809222
    $mdp = ""; //4FsiBA8FYNuk
    $bd = "esn_steria"; //db672809222  
    $serveur = "localhost"; //db672809222.db.1and1.com

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}


?>
