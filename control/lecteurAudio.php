<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/model/gestionMusiques.class.php";

$lesMusiquesDuMoment = GestionMusiques::getMusiquesDuMoment();
$idM = 0;

include "$racine/view/vueLecteurAudio.php";
?>