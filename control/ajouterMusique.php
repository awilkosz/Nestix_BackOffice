<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/gestionMusiques.class.php";

$idMusique = filter_input(INPUT_POST, 'musique');
$flag = true;

if (isset($_FILES['monfichierMp3']) AND $_FILES['monfichierMp3']['error'] == 0)
{
	// Testons si le fichier n'est pas trop gros
	if ($_FILES['monfichierMp3']['size'] <= 1000000)
	{
		// Testons si l'extension est autorisée
		$infosfichier = pathinfo($_FILES['monfichierMp3']['name']);
		$extension_upload = $infosfichier['extension'];
		$extensions_autorisees = array('mp3');
		if (in_array($extension_upload, $extensions_autorisees))
		{
			// On peut valider le fichier et le stocker définitivement
			//move_uploaded_file($_FILES['monfichierMp3']['tmp_name'], 'musiques/' . basename($_FILES['monfichierMp3']['name']));
			move_uploaded_file($_FILES['monfichierMp3']['tmp_name'], '../nestix/public/musiques/mp3/' . basename($_FILES['monfichierMp3']['name']));
			$name = basename($_FILES['monfichierMp3']['name']);
			$name = str_split($name, strlen($name)-4);
            GestionMusiques::updateAsMusiqueDuMoment($idMusique, $name[0]);
			echo "L'envoi a bien été effectué !";
		}
	}
	else
		$flag = false;
}

if (isset($_FILES['monfichierOgg']) AND $_FILES['monfichierOgg']['error'] == 0)
{
	// Testons si le fichier n'est pas trop gros
	if ($_FILES['monfichierOgg']['size'] <= 1000000)
	{
		// Testons si l'extension est autorisée
		$infosfichier = pathinfo($_FILES['monfichierOgg']['name']);
		$extension_upload = $infosfichier['extension'];
		$extensions_autorisees = array('ogg');
		if (in_array($extension_upload, $extensions_autorisees))
		{
			// On peut valider le fichier et le stocker définitivement
			//move_uploaded_file($_FILES['monfichierOgg']['tmp_name'], 'musiques/' . basename($_FILES['monfichierOgg']['name']));
			move_uploaded_file($_FILES['monfichierOgg']['tmp_name'], '../nestix/public/musiques/ogg/' . basename($_FILES['monfichierOgg']['name']));
			$name = basename($_FILES['monfichierOgg']['name']);
			$name = str_split($name, strlen($name)-4);
            GestionMusiques::updateAsMusiqueDuMoment($idMusique, $name[0]);
			echo "L'envoi a bien été effectué !";
		}
	}
	else
		$flag = false;
}

if($flag)
	header("Location: ./?action=musiqueDuMoment");
else
	header("Location: ./?action=musiqueDuMoment&error=true");
?>