<?php
include_once "$racine/model/gestionMedias.class.php";

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$id = filter_input(INPUT_GET, 'id');
$media = GestionMedias::deleteMedia($id);
$mediasProposes = GestionMedias::getMediasProposes();

include "$racine/view/entete.php";
include "$racine/view/vuePropositionsUtilisateurs.php";
include "$racine/view/pied.php";
?>