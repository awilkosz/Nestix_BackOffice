<?php
include_once "$racine/model/gestionUtilisateurs.class.php";

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$id = filter_input(INPUT_GET, 'id');
$utilisateur = GestionUtilisateurs::deleteUtilisateur($id);

header("Location: ./?action=listeUtilisateurs");
?>