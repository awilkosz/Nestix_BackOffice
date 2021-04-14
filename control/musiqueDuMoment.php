<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/gestionMusiques.class.php";

$lesMusiques = GestionMusiques::getAllMusiques();
$lesMusiquesDuMoment = GestionMusiques::getMusiquesDuMoment();

$error = false;
if(isset($_GET["error"]))
	$error = true;

if (empty($_SESSION['token'])) 
{
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

include "$racine/view/entete.php";
include "$racine/view/vueMusiqueDuMoment.php";
include "$racine/view/pied.php";
?>