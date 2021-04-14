<?php
$servername = "localhost"; //adresse du serveur
$username = "root"; //nom d'utilisateur
$password = ""; //mot de passe

try { //Connexion à la base de données
    $bdd = new PDO("mysql:host=$servername;dbname=nestix", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

    $term = filter_input(INPUT_GET, 'term'); //Filtrage de la saisie
    //Préparation de la requête pour récupérer les utilisateurs en fonction de la saisie, on remplace la partie recherche par des marqueurs
    $requete = $bdd->prepare('SELECT * FROM users WHERE user_pseudo LIKE :term OR email LIKE :term'); 
    ////On exécute la requête en passant en paramètre un tableau associatif contenant les variables utilisées dans la requête 
    $requete->execute(array('term' => '%'.$term.'%'));
    $pseudos = array(); //Déclaration du tableau qui contiendra les pseudos
    while($donnee = $requete->fetch()) { //Pour chaque lignes
        array_push($pseudos, $donnee['user_pseudo']); //On ajoute le pseudo au tableau
    }
    echo json_encode($pseudos); //On renvoie les pseudos au format json

?>
