<?php
include "getRacine.php";
include "$racine/control/controleurPrincipal.php";
include_once "$racine/model/authentification.inc.php";
?>
<html lang="fr">
	<head>
		<title>Administration Nestix</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/jquery-ui.min.css" />
		<meta charset="UTF-8" />
	</head>

<body>

<?php
/*
if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{
    $action = "defaut";
}
*/
if (isLoggedOn()){ //Si on est connecté
	if (isset($_GET["action"])){ //Si une action est spécifiée
		$action = $_GET["action"]; //On récupère l'action passée en paramètre
	}
	else{
		$action = "listeUtilisateurs"; //Sinon l'action contiendra la liste des utilisateurs
	}
}
else{ 
	$action = "defaut"; //Si il n'est pas connecté, l'action vaut défaut, l'utilisateur sera redirigé vers la page de connexion
}
//On appelle la fonction controleurPrincipal qui renverra le contrôleur associé à l'action
$fichier = controleurPrincipal($action);
include "$racine/control/$fichier";


?>
     