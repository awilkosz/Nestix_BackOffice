<?php
include_once 'utilisateur.class.php';
include_once "gestionUtilisateurs.class.php";

function login($pseudoU, $mdpU) {
    if (!isset($_SESSION)) {
        session_start();
    }
	//On récupère l'utilisateur avec son pseudo
    $util = GestionUtilisateurs::getUtilisateurByPseudo($pseudoU);

    if($util != NULL)
    {
        $mdpBD = $util->user_password;
        
        if (trim($mdpBD) == trim(crypt($mdpU,$mdpBD))) {
            // le mot de passe est celui de l'utilisateur dans la base de donnees
			//Si les informations sont correctes, on les stocke dans la variable $_SESSION
            $_SESSION["pseudo"] = $pseudoU;
            $_SESSION["mdp"] = $mdpBD;
        }
    }
}
//Déconnexion
function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["pseudo"]);
    unset($_SESSION["mdp"]);
}

function getPseudoULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["pseudo"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["pseudo"])) { //On vérifie les informations et qu'il s'agisse bien d'un compte admin
        $util = GestionUtilisateurs::getUtilisateurByPseudo($_SESSION["pseudo"]);
        if ($util->user_pseudo == $_SESSION["pseudo"] && $util->user_password == $_SESSION["mdp"] && $util->admin == 1) 
		{
            $ret = true;
        }
    }
    return $ret;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');


    // test de connexion
    login("conker30", "123");
    if (isLoggedOn()) {
        echo "logged";
    } else {
        echo "not logged";
    }

    // deconnexion
    logout();
}
?>