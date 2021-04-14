<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/gestionMedias.class.php";
include_once "$racine/model/gestionMusiques.class.php";

if (!empty($_POST['token'])) 
{
	if (hash_equals($_SESSION['token'], $_POST['token'])) 
	{
        $id = filter_var($_SESSION["idMedia"]);
        $titre = htmlspecialchars(filter_input(INPUT_POST, 'titre'));
        $annee = htmlspecialchars(filter_input(INPUT_POST, 'annee'));
        $lien = htmlspecialchars(filter_input(INPUT_POST, 'lien'));
        $album = htmlspecialchars(filter_input(INPUT_POST, 'album'));

        if(isset($_POST['genres']))
        {
            foreach( $_POST['genres'] as $genre ) 
            {
                gestionMedias::addGenreToMedia($id,$genre);
            }
        }
        
        GestionMedias::UpdateMedia($id,$titre,$annee,$lien);
        GestionMusiques::UpdateMusique($id,$album);
        GestionMedias::updateASV($id);
    }
    else
    {
        echo "Une erreur est survenue lors de l'envoi du formulaire";
    }
}

header("Location: ./?action=propositionsUtilisateurs");
?>