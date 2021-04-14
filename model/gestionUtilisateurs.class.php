<?php
include_once 'connect.php';
include_once 'utilisateur.class.php';

class GestionUtilisateurs
{
    public static function getAllUtilisateurs()
	{
        try
        {
			$cnx = connexionPDO(); //On récupère la connexion à la BDD
            $req = $cnx->query('SELECT * FROM users'); // On récupère tout le contenu de la table users
            //On lit chaque entrées une à une
            while ($ligne = $req->fetch())
            {
                //Pour chaque entrées, on créé un nouvel utilisateur que l'on ajoute dans un tableau
                $tableauUtilisateurs[] = new Utilisateur($ligne["human_id"], $ligne["user_pseudo"], $ligne["email"], $ligne["user_status"], $ligne["password"], $ligne["user_date_creat"], $ligne["city_id"], $ligne["admin"]);
            }
            $req->closeCursor(); // Termine le traitement de la requête
            return $tableauUtilisateurs; //On renvoie le tableau
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage()); // En cas d'erreur, on affiche un message et on arrête tout
        }
	}
	
	public static function getUtilisateurById($id)
	{
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->prepare('SELECT * FROM users WHERE users.human_id = ?');
			$req->execute(array($id));
			
            while ($ligne = $req->fetch())
            {
                $lUtilisateur = new Utilisateur($ligne["human_id"], $ligne["user_pseudo"], $ligne["email"], $ligne["user_status"], $ligne["password"], $ligne["user_date_creat"], $ligne["city_id"], $ligne["admin"]);
            }
            $req->closeCursor();
            return $lUtilisateur;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    public static function getUtilisateurByPseudoAndMdp($pseudo, $mdp)
	{
        $lUtilisateur = "";
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->prepare('SELECT * FROM users WHERE user_pseudo = ? AND password = ?');
			$req->execute(array($pseudo, $mdp));
			
            while ($ligne = $req->fetch())
            {
                $lUtilisateur = new Utilisateur($ligne["human_id"], $ligne["user_pseudo"], $ligne["email"], $ligne["user_status"], $ligne["password"], $ligne["user_date_creat"], $ligne["city_id"], $ligne["admin"]);
            }
            $req->closeCursor();
            return $lUtilisateur;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    public static function getUtilisateurByPseudo($pseudo)
    {
        $lUtilisateur = "";
        try
        {
            $cnx = connexionPDO(); //Connexion à la base de données
            //Préparation de la requête permettant de récupérer un utilisateur par pseudo, on remplace la partie variable par un ?
            $req = $cnx->prepare('SELECT * FROM users WHERE user_pseudo = ?'); 
            //On exécute la requête en passant en paramètre un tableau contenant les variables utilisées dans la requête (dans l'ordre)
			$req->execute(array($pseudo));
			
            while ($ligne = $req->fetch()) //Lecture des entrées
            {
                //On créé un nouvel utilisateur
                $lUtilisateur = new Utilisateur($ligne["human_id"], $ligne["user_pseudo"], $ligne["email"], $ligne["user_status"], $ligne["password"], $ligne["user_date_creat"], $ligne["city_id"], $ligne["admin"]);
            }
            $req->closeCursor(); //Termine le traitement de la requête
            return $lUtilisateur; //On renvoie l'utilisateur
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function supprimerUtilisateur($id)
	{
		try
		{
            $cnx = connexionPDO();
			$requete = $cnx->prepare('DELETE FROM users WHERE human_id = ?');
			$requete->execute(array($id));
			$requete->closeCursor();
			return 0;
		}
		catch (Exception $e)
	    {
           die('Erreur : ' . $e->getMessage());
	    }
	}
	
	public static function addUtilisateur($pseudo,$email,$status,$password,$date_creat,$idC)
	{
		try
		{
            $cnx = connexionPDO(); //On récupère la connexion à la BDD
            //On prépare la requête permettant d'ajouter un utilisateur en remplacant sa partie variable par un "?"
            $req = $cnx->prepare("INSERT INTO users (user_pseudo,email,user_status,password,user_date_creat,city_id)VALUES (?,?,?,?,?,?)");
            //On exécute la requête en passant en paramètre un tableau contenant la liste des variables utilisées dans la requête
			$req->execute(array($pseudo,$email,$status,$password,$date_creat,$idC));
			$req->closeCursor(); // Termine le traitement de la requête
            return 0;
		}
		catch(Exception $ex)
		{
			die('Erreur : ' . $ex->getMessage()); // En cas d'erreur, on affiche un message et on arrête tout
		}
	}
	
	public static function UpdateUtilisateur($id,$pseudo,$email,$status,$idC)
	{
	   try
	   {   
           $cnx = connexionPDO(); //On récupère la connexion à la BDD
           //On prépare la requête permettant de modifier un utilisateur en remplacant sa partie variable par un "?"
           $req = $cnx->prepare('UPDATE users SET user_pseudo = ?, email = ?, user_status = ?, city_id = ? WHERE human_id = ?; ');
           //On exécute la requête en passant en paramètre un tableau contenant la liste des variables utilisées dans la requête
		   $req->execute(array($pseudo,$email,$status,$idC,$id));
		   $req->closeCursor(); // Termine le traitement de la requête
           return 0;
	   }
	   catch (Exception $ex)
       {
           die('Erreur : ' . $ex->getMessage()); // En cas d'erreur, on affiche un message et on arrête tout
       }
	}
	
	public static function deleteUtilisateur($id)
	{
		try
		{
            $cnx = connexionPDO(); //On récupère la connexion à la BDD
            //On prépare la requête permettant de supprimer un utilisateur' avec son id en remplacant sa partie variable par un "?"
            $req = $cnx->prepare('DELETE FROM users WHERE human_id = ?;');
            //On exécute la requête en passant en paramètre un tableau contenant la liste des variables utilisées dans la requête
			$req->execute(array($id));
			$req->closeCursor(); // Termine le traitement de la requête
			return 0;
		}
		catch (Exception $e)
	    {
           die('Erreur : ' . $e->getMessage()); // En cas d'erreur, on affiche un message et on arrête tout
	    }
    }
    
    public static function getUtilisateursActifs()
    {
        $tableauUtilisateurs = array();
        try
        {
            $cnx = connexionPDO();
            $rep = $cnx->query('SELECT appreciation.human_id, users.user_pseudo, COUNT(appr_id) as nbAppreciations FROM appreciation JOIN users ON appreciation.human_id = users.human_id GROUP BY appreciation.human_id, users.user_pseudo ORDER BY nbAppreciations DESC LIMIT 10');
            while($ligne = $rep->fetch(PDO::FETCH_ASSOC))
            {
                $tableauUtilisateurs[] = $ligne;
            }
            $rep->closeCursor();
            $rep = NULL;
            return $tableauUtilisateurs;
        }
        catch(Exception $ex)
        {
            die('Erreur : ' . $ex->getMessage());
        }
    }

    public static function getUtilisateursSearched($searchStr)
	{
        $tableauUtilisateurs = array();
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->prepare('SELECT * FROM users WHERE user_pseudo LIKE :term');
            $req->execute(array('term' => '%'.$searchStr.'%'));
            while ($ligne = $req->fetch())
            {
                $tableauUtilisateurs[] = new Utilisateur($ligne["human_id"], $ligne["user_pseudo"], $ligne["email"], $ligne["user_status"], $ligne["password"], $ligne["user_date_creat"], $ligne["city_id"], $ligne["admin"]);
            }
            $req->closeCursor();
            return $tableauUtilisateurs;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
	
	public static function resetUserPassword($id,$password)
	{
	   try
	   {   
		   $cnx = connexionPDO();
		   $req = $cnx->prepare('UPDATE users SET password = ?, reinitialiser = 1 WHERE human_id = ?; ');
		   $req->execute(array($password, $id));
		   $req->closeCursor();
           return 0;
	   }
	   catch (Exception $ex)
       {
           die('Erreur : ' . $ex->getMessage());
       }
	}
}
?>