<?php
include_once 'connect.php';
include_once 'media.class.php';

class GestionMedias
{
	public static function getAllMedias()
	{
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->query('SELECT * FROM media');
            while ($ligne = $req->fetch())
            {
                $TableauMedias[] = new Media($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"]);
            }
            $req->closeCursor();
			$cnx = NULL;
            return $TableauMedias;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
	
	public static function getMediasByType($type) 
	{
		$TableauMedias = array();
		try 
		{
			$cnx = connexionPDO();
			$req = $cnx->prepare('SELECT * FROM media WHERE media_type = ?');
			$req->execute(array($type));

			while ($ligne = $req->fetch()) 
			{
				$TableauMedias[] = new Media($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"]);
			}
		} 
		catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage();
			die();
		}
		$cnx = NULL;
		return $TableauMedias;
	}

	public static function getMediaById($id)
	{
        try
        {
			$cnx = connexionPDO(); //On récupère la connexion à la BDD
            $req = $cnx->prepare('SELECT * FROM media WHERE media_id = ?'); //On prépare la requête permettant de récupérer un média avec son id en remplacant sa partie variable par un "?"
			$req->execute(array($id)); //On exécute la requête en passant en paramètre un tableau contenant la liste des variables utilisées dans la requête
			
			$ligne = $req->fetchAll(); //On récupère le tableau contenant toutes les lignes de l'enregistrement (car il n'y a qu'une seule ligne)
			//On créé notre objet Media
			$monMedia = new Media($ligne[0]["media_id"], $ligne[0]["media_title"], $ligne[0]["media_type"], $ligne[0]["media_year"], $ligne[0]["media_cover"], $ligne[0]["media_link"]);
            $req->closeCursor(); // Termine le traitement de la requête
            return $monMedia; //On renvoie le média demandé
        }
        catch (Exception $e)
        {
			// En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }
	}

	public static function updateImageMedia($id, $img)
	{
		try
		{   
			$cnx = connexionPDO(); //On récupère la connexion à la BDD
			//On prépare la requête permettant de changer l'image d'un média avec son id en nommant les marqueurs des variables
			$req = $cnx->prepare('UPDATE media SET media_cover = :cover WHERE media_id = :id; ');
			//On exécute la requête en passant en paramètre un tableau associatif contenant la liste des variables utilisées dans la requête
			$req->execute(array('cover' => $img, 'id' => $id)); 
			$req->closeCursor(); // Termine le traitement de la requête
			return 0;
		}
		catch (Exception $ex)
		{
			die('Erreur : ' . $ex->getMessage()); // En cas d'erreur, on affiche un message et on arrête tout
		}
	}

	public static function getMeilleursMediasByType($type)
	{
		$tableauMedias = array();
		try
        {
			$cnx = connexionPDO();
            $req = $cnx->prepare("SELECT AVG(appr_note), media.* FROM appreciation, media WHERE media.media_id = appreciation.media_id AND media_type = ? GROUP BY appreciation.media_id ORDER BY AVG(appr_note) DESC LIMIT 10");
			$req->execute(array($type));
			
            while ($ligne = $req->fetch()) 
			{
				$tableauMedias[] = new Media($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"]);
			}
            $req->closeCursor();
			$cnx = NULL;
            return $tableauMedias;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
	
	public static function getMediasProposes()
	{
		$tableauMedias = array();
		try
        {
			$cnx = connexionPDO();
            $rep = $cnx->query("SELECT * FROM media JOIN status ON media.media_id = status.media_id WHERE asv_id = 2");
			
            while ($ligne = $rep->fetch()) 
			{
				$tableauMedias[] = new Media($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"]);
			}
            $rep->closeCursor();
			$cnx = NULL;
            return $tableauMedias;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
	
	public static function getMediasProposesParUtilisateurs($id)
	{
		$tableauMedias = array();
		try
        {
			$cnx = connexionPDO();
            $req = $cnx->prepare("SELECT * FROM media JOIN status ON media.media_id = status.media_id WHERE asv_id = 2 AND user_id = ?");
			$req->execute(array($id));
			
            while ($ligne = $req->fetch()) 
			{
				$tableauMedias[] = new Media($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"]);
			}
            $req->closeCursor();
			$cnx = NULL;
            return $tableauMedias;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
	
	public static function deleteMedia($id)
	{
		try
		{
			$cnx = connexionPDO();
			$requete = $cnx->prepare('DELETE FROM media WHERE media_id = ?;');
			$requete->execute(array($id));
			$requete->closeCursor();
			$cnx = NULL;
			return 0;
		}
		catch (Exception $e)
	    {
           die('Erreur : ' . $e->getMessage());
	    }
	}

	public static function UpdateMedia($id,$title,$year,$link)
	{
	   try
	   {   
		   $cnx = connexionPDO();
		   $req = $cnx->prepare('UPDATE media SET media_title = ?, media_year = ?, media_link = ? WHERE media_id = ?; ');
		   $req->execute(array($title,$year,$link,$id));
		   $req->closeCursor();
		   $req = NULL;
           return 0;
	   }
	   catch (Exception $ex)
       {
           die('Erreur : ' . $ex->getMessage());
       }
	}
	
	public static function updateASV($idMedia)
	{
		try
		{   
			$cnx = connexionPDO();
			$req = $cnx->prepare('UPDATE status SET asv_id = 1 WHERE media_id = ?; ');
			$req->execute(array($idMedia));
			$req->closeCursor();
			$req = NULL;
			return 0;
		}
		catch (Exception $ex)
		{
			die('Erreur : ' . $ex->getMessage());
		}
	}

	public static function addGenreToMedia($idMedia, $idGenre)
	{
		try
		{   
			$cnx = connexionPDO();
			$req = $cnx->prepare('INSERT INTO categorized_by VALUES (?,?)');
			$req->execute(array($idMedia,$idGenre));
			$req->closeCursor();
			$req = NULL;
			return 0;
		}
		catch (Exception $ex)
		{
			die('Erreur : ' . $ex->getMessage());
		}
	}
	
	/**
	Met à jour les informations d'un média en fonction de son id
	id: id du média; title: titre du média; year: année du média; type: type du média;
	link: lien du média; paramForType: Paramètre supplémentaire dépendant du type du média
	**/
	public static function transactionUpdateMediaById($id,$title,$year,$type,$link,$paramForType)
	{
		try
	   {   
		   $cnx = connexionPDO();
		   $cnx->beginTransaction();
		   $req = $cnx->prepare('UPDATE media SET media_title = ?, media_year = ?, media_type = ?, media_link = ? WHERE media_id = ?; ');
		   $req->execute(array($title,$year,$type,$link,$id));
		   if($type == 'Film')
		   {
			   $reqFilm = $cnx->prepare('UPDATE movie SET movie_saga = ?');
			   $reqFilm->execute(array($paramForType));
		   }
		   else if($type == 'Musique')
		   {
			   $reqMusique = $cnx->prepare('UPDATE song SET song_album = ?');
			   $reqMusique->execute(array($paramForType));
		   }
		   else if($type == 'Livre')
		   {
			   $reqLivre = $cnx->prepare('UPDATE book SET book_saga = ?');
			   $reqLivre->execute(array($paramForType));
		   }
		   $cnx->commit();
		   $req->closeCursor();
		   $req = NULL;
           return 0;
	   }
	   catch (Exception $ex)
       {
           die('Erreur : ' . $ex->getMessage());
		   $pdo->rollback();
       }
	}
}
?>