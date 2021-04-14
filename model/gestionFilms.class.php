<?php
include_once 'connect.php';
include_once 'film.class.php';
include_once 'gestionMedias.class.php';

class GestionFilms
{
	public static function getAllFilms()
	{
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->query('SELECT * FROM movie INNER JOIN media ON movie.movie_id = media.media_id');
            while ($ligne = $req->fetch())
            {
                $TableauFilms[] = new Film($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"], $ligne["visa"], $ligne["movie_runtime"], $ligne["movie_trailer"],$ligne["movie_synop"],$ligne["movie_budget"],$ligne["movie_saga"]);
            }
            $req->closeCursor();
            return $TableauFilms;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
	
	public static function getFilmById($id)
	{
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->prepare('SELECT * FROM movie INNER JOIN media ON movie.movie_id = media.media_id WHERE movie_id = ?');
			$req->execute(array($id));
			
            while ($ligne = $req->fetch())
            {
                $leFilm = new Film($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"], $ligne["visa"], $ligne["movie_runtime"], $ligne["movie_trailer"],$ligne["movie_synop"],$ligne["movie_budget"],$ligne["movie_saga"]);
            }
            $req->closeCursor();
            return $leFilm;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    public static function UpdateFilm($id,$visa,$runtime,$trailer,$synopsis,$budget,$saga)
	{
	   try
	   {   
		   $cnx = connexionPDO();
		   $req = $cnx->prepare('UPDATE movie SET visa = ?, movie_runtime = ?, movie_trailer = ?, movie_synop = ?, movie_budget = ?, movie_saga = ? WHERE movie_id = ?; ');
		   $req->execute(array($visa,$runtime,$trailer,$synopsis,$budget,$saga,$id));
           $req->closeCursor();
           $req = NULL;
           return 0;
	   }
	   catch (Exception $ex)
       {
           die('Erreur : ' . $ex->getMessage());
       }
    }
}
?>