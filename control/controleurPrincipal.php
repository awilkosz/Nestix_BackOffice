<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["ajouterUtilisateur"] = "ajouterUtilisateur.php";
    $lesActions["modifierUtilisateur"] = "modifierUtilisateur.php";
    $lesActions["supprimerUtilisateur"] = "supprimerUtilisateur.php";
    $lesActions["listeUtilisateurs"] = "listeUtilisateurs.php";
    $lesActions["propositionsUtilisateurs"] = "propositionsUtilisateurs.php";
    $lesActions["listeMedias"] = "listeMedias.php";
    $lesActions["musiqueDuMoment"] = "musiqueDuMoment.php";
    $lesActions["statistiques"] = "statistiques.php";
    $lesActions["ajouterImage"] = "ajouterImage.php";
	$lesActions["supprimerMedia"] = "supprimerMedia.php";
    $lesActions["verifierMedia"] = "verifierMedia.php";
    $lesActions["validerLivre"] = "validerLivre.php";
    $lesActions["validerFilm"] = "validerFilm.php";
    $lesActions["validerMusique"] = "validerMusique.php";
    $lesActions["ajouterMusique"] = "ajouterMusique.php";
    $lesActions["retirerMusique"] = "retirerMusique.php";
	$lesActions["reinitialiserMDP"] = "reinitialiserMDP.php";
	$lesActions["ajouterImageArtiste"] = "ajouterImageArtiste.php";
	$lesActions["lecteurAudio"] = "lecteurAudio.php";
    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>