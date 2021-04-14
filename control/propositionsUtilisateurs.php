<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/model/gestionMedias.class.php";

$mediasProposes = GestionMedias::getMediasProposes();

include "$racine/view/entete.php";
include "$racine/view/vuePropositionsUtilisateurs.php";
include "$racine/view/pied.php";
?>