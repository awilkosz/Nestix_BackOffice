<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/gestionHumains.class.php";

$id = filter_input(INPUT_GET, 'id');

// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
	// Testons si le fichier n'est pas trop gros
	if ($_FILES['monfichier']['size'] <= 1000000)
	{
		// Testons si l'extension est autorisée
		$infosfichier = pathinfo($_FILES['monfichier']['name']);
		$extension_upload = $infosfichier['extension'];
		$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
		if (in_array($extension_upload, $extensions_autorisees))
		{
			// On peut valider le fichier et le stocker définitivement
			//move_uploaded_file($_FILES['monfichier']['tmp_name'], 'img/' . basename($_FILES['monfichier']['name']));
			move_uploaded_file($_FILES['monfichier']['tmp_name'], '../nestix/public/img/' . basename($_FILES['monfichier']['name']));
            GestionHumains::updateImageArtiste($id, 'img/' . basename($_FILES['monfichier']['name']));
			echo "L'envoi a bien été effectué !";
		}
	}
}

header("Location: ./?action=listeMedias&type=Artiste");
?>