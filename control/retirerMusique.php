<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/gestionMusiques.class.php";

$id = filter_input(INPUT_GET, 'id');
GestionMusiques::updateAsNotMusiqueDuMoment($id);

header("Location: ./?action=musiqueDuMoment");
?>