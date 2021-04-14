<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/gestionMedias.class.php";
include_once "$racine/model/gestionFilms.class.php";
include_once "$racine/model/gestionMusiques.class.php";
include_once "$racine/model/gestionLivres.class.php";
include_once "$racine/model/gestionArtistes.class.php";

$type = filter_input(INPUT_GET, 'type');
$estUnMedia = true;
$error = false;
if(isset($_GET["error"]))
	$error = true;

if($type != NULL)
{
    switch($type)
    {
        case 'Film':
            $lesMedias = GestionFilms::getAllFilms();
            break;
        case 'Chanson':
            $lesMedias = GestionMusiques::getAllMusiques();
            break;
        case 'Livre':
            $lesMedias = GestionLivres::getAllLivres();
            break;
		case 'Artiste':
            $lesArtistes = GestionArtistes::getAllArtistes();
			$estUnMedia = false;
            break;
        default:
            $lesMedias = GestionMedias::getAllMedias();
    }
}
else
{
    $lesMedias = GestionMedias::getAllMedias();
}

include "$racine/view/entete.php";
include "$racine/view/vueListeMedias.php";
include "$racine/view/pied.php";
?>