<?php
include_once 'connect.php';
include_once 'genre.class.php';

class GestionGenres
{
	public static function getAllGenres()
	{
        try
        {
			$cnx = connexionPDO();
            $rep = $cnx->query('SELECT * FROM genre');
            while ($ligne = $rep->fetch())
            {
                $TableauGenres[] = new Genre($ligne["genre_id"], $ligne["genre_name"]);
            }
            $rep->closeCursor();
            $rep = NULL;
            return $TableauGenres;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    public static function getGenresLesPlusRepresentes()
    {
        try
        {
			$cnx = connexionPDO();
            $rep = $cnx->query('SELECT genre.genre_id, genre_name, COUNT(categorized_by.genre_id) AS nbOccurences FROM genre JOIN categorized_by ON genre.genre_id = categorized_by.genre_id GROUP BY genre.genre_id ORDER BY nbOccurences DESC LIMIT 10');
            while ($ligne = $rep->fetch())
            {
                $TableauGenres[] = new Genre($ligne["genre_id"], $ligne["genre_name"]);
            }
            $rep->closeCursor();
            $rep = NULL;
            return $TableauGenres;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
?>