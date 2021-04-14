<?php
include_once 'gestionUtilisateurs.class.php';

class Test
{
    public static function getUtilisateurByPseudoTest()
    {
        $pseudo = 'LeTesteurFou'; //On déclare le pseudo à rechercher
        //On appelle ensuite notre fonction getUtilisateurByPseudo() pour récupérer l'utilisateur
        $user = GestionUtilisateurs::getUtilisateurByPseudo($pseudo);

        if($user->user_pseudo == $pseudo)
        {
            echo "Le pseudo de l'utilisateur est correct"; //Si les pseudo sont les mêmes, le test est validé
        }
        else
        {
            echo "Le pseudo n'est pas celui de l'utilisateur"; //Si les pseudos sont différents, le test échoue
        }
    }

    public static function updateUtilisateurTest()
    {
        $user = GestionUtilisateurs::getUtilisateurById(65); //On récupère les utilisateurs

        //On affiche ses informations avant la mise à jour
        echo "Avant la mise à jour : <br />";
        echo "pseudo = $user->user_pseudo";
        echo "<br />";
        echo "email = $user->user_email";
        echo "<br />";
        echo "status = $user->user_status";
        echo "<br />";
        echo "id city = $user->city_id";
        echo "<br />";

        //On déclare des variables contenant les nouvelles valeurs
        $nouveauPseudo = "titi";
        $nouveauMail = "testMail.test@gmail.com";
        $nouveauStatus = "Bloqué"; //Bloqué ou Autorisé
        $newIdCity = 3;

        //On effectue la mise à jour, puis on récupère à nouveau notre utilisateur
        GestionUtilisateurs::UpdateUtilisateur($user->human_id, $nouveauPseudo, $nouveauMail, $nouveauStatus, $newIdCity);
        $user = GestionUtilisateurs::getUtilisateurById(65);

        echo "Après la mise à jour : <br />";
        if($user->user_pseudo == $nouveauPseudo && $user->user_email == $nouveauMail && $user->user_status == $nouveauStatus && $user->city_id == $newIdCity)
        {
            //Le test est validé si l'objet user contient bien les nouvelles valeurs
            echo "Les informations ont bien été mises à jour !"; 
        }
        else
        {
            //Sinon le test échoue
            echo "Une erreur est survenue, la mise à jour n'a pas eu lieu !";
        }
    }

    public static function addUtilisateurTest()
    {
        //On déclare les variables contenant les informations de notre nouvel utilisateur
        $pseudo = "nouveauPseudo";
        $email = "nouveau.mail@test.com";
        $status = "Autorisé";
        $password = 'P@$$W0rd';
        $date_creat = date('Y-m-d');
        $idC = 1;

        //On créé notre utilisateur
        GestionUtilisateurs::addUtilisateur($pseudo,$email,$status,$password,$date_creat,$idC);
        //On le récupère avec son pseudo
        $user = GestionUtilisateurs::getUtilisateurByPseudo($pseudo);

        if($user != NULL)
        {
            //Si l'objet $user n'est pas vide, l'utilisateur est créé et le test est validé
            echo "L'utilisateur a bien été inséré dans la base de données";
        }
        else
        {
            //Sinon le test échoue
            echo "Une erreur s'est produite, l'utilisateur n'existe pas";
        }
    }
}

Test::getUtilisateurByPseudoTest();
echo "<br />";
Test::updateUtilisateurTest();
echo "<br />";
Test::addUtilisateurTest();
?>