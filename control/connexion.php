<?php
include_once "$racine/model/utilisateur.class.php";
include_once "$racine/model/gestionUtilisateurs.class.php";


if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
//include_once "$racine/model/authentification.inc.php";


// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["pseudo"]) && isset($_POST["mdp"])){
    $pseudoU = htmlspecialchars(filter_input(INPUT_POST,"pseudo")); //Filtre les caractères spéciaux pour le pseudo
    $mdpU = htmlspecialchars(filter_input(INPUT_POST,"mdp")); //Filtre les caractères spéciaux pour le mot de passe
	
	login($pseudoU,$mdpU);

	if (isLoggedOn())
	{ // si l'utilisateur est connecté on redirige vers le controleur monProfil
		include "$racine/control/listeUtilisateurs.php";
	}
	else
	{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
		if (empty($_SESSION['token'])) 
		{
			$_SESSION['token'] = bin2hex(random_bytes(32));
		}
		$token = $_SESSION['token'];
		include "$racine/view/vueConnexion.php";
	}
}
else
{
    $pseudoU="";
    $mdpU="";
	
	if (empty($_SESSION['token'])) 
	{
		$_SESSION['token'] = bin2hex(random_bytes(32));
	}
	$token = $_SESSION['token'];
	
	include "$racine/view/vueConnexion.php";
}

// traitement si necessaire des donnees recuperees
