<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/gestionMedias.class.php";
include_once "$racine/model/gestionFilms.class.php";
include_once "$racine/model/gestionMusiques.class.php";
include_once "$racine/model/gestionLivres.class.php";
include_once "$racine/model/gestionGenres.class.php";

$id = filter_input(INPUT_GET, 'id');
$_SESSION["idMedia"] = $id;
$leMedia = GestionMedias::getMediaById($id); //Récupération du média
$listeGenres = gestionGenres::getAllGenres(); //Liste des genres à mettre dans une liste du formulaire

if (empty($_SESSION['token'])) 
{
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

include "$racine/view/entete.php";

if($leMedia->media_type == "Film") //Si le média est un film
{
	$leMedia = GestionFilms::getFilmById($id); //On récupère l'objet Film correspondant au média
	include "$racine/view/vueVerifierFilm.php"; //On renvoie le formulaire pour les films
}
else if($leMedia->media_type == "Chanson") //Si le média est une musique
{
	$leMedia = GestionMusiques::getMusiqueById($id); //On récupère l'objet Musique correspondant au média
	include "$racine/view/vueVerifierMusique.php"; //On renvoie le formulaire pour les musiques
}
else if($leMedia->media_type == "Livre") //Si le média est un livre
{
	$leMedia = GestionLivres::getLivreById($id); //On récupère l'objet Livre correspondant au média
	include "$racine/view/vueVerifierLivre.php"; //On renvoie le formulaire pour les livres
}
else
	echo "erreur";

include "$racine/view/pied.php";
?>