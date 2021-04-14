<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/gestionMedias.class.php";
include_once "$racine/model/gestionLivres.class.php";

if (!empty($_POST['token'])) 
{
	if (hash_equals($_SESSION['token'], $_POST['token'])) 
	{
        $id = filter_var($_SESSION["idMedia"]);
        $titre = htmlspecialchars(filter_input(INPUT_POST, 'titre'));
        $synopsis = htmlspecialchars(filter_input(INPUT_POST, 'synopsis'));
        $saga = htmlspecialchars(filter_input(INPUT_POST, 'saga'));
        $annee = htmlspecialchars(filter_input(INPUT_POST, 'annee'));
        $isbn = htmlspecialchars(filter_input(INPUT_POST, 'isbn'));
        $tome = htmlspecialchars(filter_input(INPUT_POST, 'tome'));
        $lien = htmlspecialchars(filter_input(INPUT_POST, 'lien'));

        if(isset($_POST['genres']))
        {
            foreach( $_POST['genres'] as $genre ) 
            {
                gestionMedias::addGenreToMedia($id,$genre);
            }
        }

        GestionMedias::UpdateMedia($id,$titre,$annee,$lien);
        GestionLivres::UpdateLivre($id,$isbn,$synopsis,$tome,$saga);
        GestionMedias::updateASV($id);
        
    }
    else
    {
        echo "Une erreur est survenue lors de l'envoi du formulaire";
    }
}

header("Location: ./?action=propositionsUtilisateurs");
?>