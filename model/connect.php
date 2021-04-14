<?php

function connexionPDO() {
    $login = "root"; //Nom d'utilisateur
    $mdp = ""; //Mot de passe
    $bd = "nestix"; //Nom de la BDD
    $serveur = "localhost"; //Nom de l'hôte

    try {
        //On se connecte à la BDD
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$conn->setAttribute(PDO::ATTR_PERSISTENT, TRUE); //Connexion persistente
        return $conn; //On renvoie l'objet qui permettra la connexion
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog de test
    header('Content-Type:text/plain');

    echo "connexionPDO() : \n";
    print_r(connexionPDO());
}
?>