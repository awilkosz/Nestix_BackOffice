<?php
if (empty($_SESSION['token'])) 
{
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

if(!empty($_POST['token']))
{
	if (hash_equals($_SESSION['token'], $_POST['token'])) 
	{
		echo "Données envoyées";
		$id = filter_var($_SESSION["idUser"]);
		$password = filter_input(INPUT_POST, 'newPassword');
		$password = password_hash($password, PASSWORD_DEFAULT);
		
		GestionUtilisateurs::resetUserPassword($id,$password);
		$utilisateur = GestionUtilisateurs::getUtilisateurById($id);
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

$_SESSION["idUser"] = $utilisateur->human_id;

include "$racine/view/entete.php";
include "$racine/view/vueReinitialiserMDP.php";
include "$racine/view/pied.php";
?>