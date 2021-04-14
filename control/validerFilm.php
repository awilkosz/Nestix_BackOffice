<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/gestionMedias.class.php";
include_once "$racine/model/gestionFilms.class.php";

if (!empty($_POST['token']))  
{ //Si le jeton est présent et qu'il correspond à celui de la varaible session, on effectue les traitements
	if (hash_equals($_SESSION['token'], $_POST['token'])) 
	{
		//On créé une variable par attribut
        $id = filter_var($_SESSION["idMedia"]);
        $titre = htmlspecialchars(filter_input(INPUT_POST, 'titre'));
        $synopsis = htmlspecialchars(filter_input(INPUT_POST, 'synopsis'));
        $saga = htmlspecialchars(filter_input(INPUT_POST, 'saga'));
        $annee = htmlspecialchars(filter_input(INPUT_POST, 'annee'));
        $visa = htmlspecialchars(filter_input(INPUT_POST, 'visa'));
        $runtime = htmlspecialchars(filter_input(INPUT_POST, 'runtime'));
        $trailer = htmlspecialchars(filter_input(INPUT_POST, 'trailer'));
        $budget = htmlspecialchars(filter_input(INPUT_POST, 'budget'));
        $lien = htmlspecialchars(filter_input(INPUT_POST, 'lien'));

		//Pour chaque genres attribué au film, on ajoute une ligne dans la table categorized_by de la BDD
        if(isset($_POST['genres']))
        {
            foreach( $_POST['genres'] as $genre ) 
            {
                gestionMedias::addGenreToMedia($id,$genre);
            }
        }
        
		//On change les informations de la base de données
        GestionMedias::UpdateMedia($id,$titre,$annee,$lien);
        GestionFilms::UpdateFilm($id,$visa,$runtime,$trailer,$synopsis,$budget,$saga);
        GestionMedias::updateASV($id); //On met l'ASV du média à 1 pour qu'il soit considéré comme validé
    }
    else
    {
        echo "Une erreur est survenue lors de l'envoi du formulaire";
    }
}

header("Location: ./?action=propositionsUtilisateurs");
?>