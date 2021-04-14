<?php
include_once "$racine/model/gestionUtilisateurs.class.php";
include_once "$racine/model/gestionVilles.class.php";
include_once "$racine/model/gestionHumains.class.php";

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$lesVilles = GestionVilles::getAllVilles();

if (!empty($_POST['token'])) //On verifie que le jeton a été envoyé
{
	if (hash_equals($_SESSION['token'], $_POST['token'])) //On vérifie que le jeton est le même
	{
		echo "Données envoyées";
		$pseudo = htmlspecialchars(filter_input(INPUT_POST, 'pseudoUser')); //Filtrage du champ pseudo
		$email = htmlspecialchars(filter_input(INPUT_POST, 'emailUser')); //Filtrage du champ email
		$status = filter_input(INPUT_POST, 'statusUser'); 
		$mdp = htmlspecialchars(filter_input(INPUT_POST, 'mdpUser')); //Filtrage du champ mot de passe
		$mdp = password_hash($mdp, PASSWORD_DEFAULT); //Cryptage du mot de passe
		$dateCreation = date('Y-m-d'); //On génére la date d'envoi
		$ville = filter_input(INPUT_POST, 'villeUser');
		GestionUtilisateurs::addUtilisateur($pseudo,$email,$status,$mdp,$dateCreation,$ville); //Ajout de l'utilisateur
		header("Location: ./?action=listeUtilisateurs"); //Redirection vers la liste des utilisateurs
	} 
	else 
	{
		echo "Une erreur est survenue lors de l'envoi du formulaire";
	}
}

if (empty($_SESSION['token'])) //Si le jeton n'est pas créé on le génére
{
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

$titre = "Gestion des utilisateurs";

include "$racine/view/entete.php";
include "$racine/view/vueAjouterUtilisateur.php";
include "$racine/view/pied.php";


?>