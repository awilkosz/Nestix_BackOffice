<?php
include_once "$racine/model/gestionUtilisateurs.class.php";
include_once "$racine/model/gestionVilles.class.php";
include_once "$racine/model/gestionHumains.class.php";
include_once "$racine/model/gestionMedias.class.php";

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$lesVilles = GestionVilles::getAllVilles();

if (!empty($_POST['token'])) 
{
	if (hash_equals($_SESSION['token'], $_POST['token'])) 
	{
		echo "Données envoyées";
		$id = filter_var($_SESSION["idUser"]);
		$pseudo = htmlspecialchars(filter_input(INPUT_POST, 'pseudoUser'));
		$email = htmlspecialchars(filter_input(INPUT_POST, 'emailUser'));
		$status = filter_input(INPUT_POST, 'statusUser');;
		$ville = filter_input(INPUT_POST, 'villeUser');
		GestionUtilisateurs::updateUtilisateur($id,$pseudo,$email,$status,$ville);
		$utilisateur = GestionUtilisateurs::getUtilisateurById($id);
		header("Location: ./?action=listeUtilisateurs");
	}
	else
	{
		echo "Une erreur est survenue lors de l'envoi du formulaire";
	}
}
else
{
	$id = filter_input(INPUT_GET, 'id');
	$utilisateur = GestionUtilisateurs::getUtilisateurById($id);
}

$mediasProposes = GestionMedias::getMediasProposesParUtilisateurs($utilisateur->human_id);
$_SESSION["idUser"] = $utilisateur->human_id;

if (empty($_SESSION['token'])) 
{
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

$titre = "Gestion des utilisateurs";

include "$racine/view/entete.php";
include "$racine/view/vueModifierUtilisateur.php";
include "$racine/view/pied.php";
?>