<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/model/authentification.inc.php";

logout();

$titre = "authentification";
include "$racine/view/vueConnexion.php";
include "$racine/view/pied.php";


?>