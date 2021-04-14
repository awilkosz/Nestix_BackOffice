<?php
include_once 'connect.php';
include_once 'musique.class.php';
include_once 'gestionMedias.class.php';

class GestionMusiques
{
	public static function getAllMusiques()
	{
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->query('SELECT * FROM song INNER JOIN media ON song.song_id = media.media_id');
            while ($ligne = $req->fetch())
            {
                $TableauMusiques[] = new Musique($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"], $ligne["song_album"], $ligne["song_moment"], $ligne["song_path"]);
            }
            $req->closeCursor();
            return $TableauMusiques;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
	
	public static function getMusiqueById($id)
	{
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->prepare('SELECT * FROM song INNER JOIN media ON song.song_id = media.media_id WHERE song_id = ?');
			$req->execute(array($id));
			
            while ($ligne = $req->fetch())
            {
                $laMusique = new Musique($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"], $ligne["song_album"], $ligne["song_moment"], $ligne["song_path"]);
            }
            $req->closeCursor();
            return $laMusique;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    public static function UpdateMusique($id,$album)
	{
	   try
	   {   
		   $cnx = connexionPDO();
		   $req = $cnx->prepare('UPDATE song SET song_album = ? WHERE song_id = ?; ');
		   $req->execute(array($album,$id));
           $req->closeCursor();
           $req = NULL;
           return 0;
	   }
	   catch (Exception $ex)
       {
           die('Erreur : ' . $ex->getMessage());
       }
    }

    public static function getMusiquesDuMoment()
	{
        $TableauMusiques = array();
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->query('SELECT * FROM song INNER JOIN media ON song.song_id = media.media_id WHERE song_moment = 1');
            while ($ligne = $req->fetch())
            {
                $TableauMusiques[] = new Musique($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"], $ligne["song_album"], $ligne["song_moment"], $ligne["song_path"]);
            }
            $req->closeCursor();
            return $TableauMusiques;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    public static function updateAsMusiqueDuMoment($id, $song)
	{
		try
		{   
			$cnx = connexionPDO();
			$req = $cnx->prepare('UPDATE song SET song_moment = 1, song_path = ? WHERE song_id = ?; ');
			$req->execute(array($song,$id));
			$req->closeCursor();
			return 0;
		}
		catch (Exception $ex)
		{
			die('Erreur : ' . $ex->getMessage());
		}
    }
    
    public static function updateAsNotMusiqueDuMoment($id)
	{
		try
		{   
			$cnx = connexionPDO();
			$req = $cnx->prepare('UPDATE song SET song_moment = 0 WHERE song_id = ?; ');
			$req->execute(array($id));
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