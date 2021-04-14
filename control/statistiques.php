<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/gestionMedias.class.php";
include_once "$racine/model/gestionUtilisateurs.class.php";
include_once "$racine/model/gestionGenres.class.php";

$meilleursFilms = GestionMedias::getMeilleursMediasByType('Film');
$meilleuresMusiques = GestionMedias::getMeilleursMediasByType('Chanson');
$meilleursLivres = GestionMedias::getMeilleursMediasByType('Livre');
$utilisateursActifs = GestionUtilisateurs::getUtilisateursActifs();
$genresRepresentes = GestionGenres::getGenresLesPlusRepresentes();

include "$racine/view/entete.php";
include "$racine/view/vueStatistiques.php";
include "$racine/view/pied.php";
?>