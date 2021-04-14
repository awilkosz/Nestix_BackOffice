<?php
include_once "$racine/model/gestionUtilisateurs.class.php";
include_once "$racine/model/gestionVilles.class.php";

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}


if(isset($_GET['todo']) && !empty($_GET["todo"]))
{
    $recherche = filter_input(INPUT_POST, 'pseudoRecherche');
    $lesUtilisateurs = GestionUtilisateurs::getUtilisateursSearched($recherche);
}
else
    $lesUtilisateurs = GestionUtilisateurs::getAllUtilisateurs();

if (empty($_SESSION['token'])) 
{
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

$titre = "Gestion des utilisateurs";

include "$racine/view/entete.php";
include "$racine/view/vueListeUtilisateurs.php";
include "$racine/view/pied.php";
?>