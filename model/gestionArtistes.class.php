<?php
include_once 'connect.php';
include_once 'artiste.class.php';

class GestionArtistes
{
    public static function getAllArtistes()
	{
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->query('SELECT * FROM artist INNER JOIN human ON artist.human_id = human.human_id');
            while ($ligne = $req->fetch())
            {
                $tableauArtistes[] = new Artiste($ligne["human_id"], $ligne["human_lastname"], $ligne["human_firstname"], $ligne["human_sex"], $ligne["human_dob"], $ligne["human_pic"], $ligne["artist_dod"], $ligne["artist_nickname"]);
            }
            $req->closeCursor();
            return $tableauArtistes;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
	
	public static function getArtisteById($id)
	{
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->prepare('SELECT * FROM artist INNER JOIN human ON artist.human_id = human.human_id WHERE artist.human_id = ?');
			$req->execute(array($id));
			
            while ($ligne = $req->fetch())
            {
                $lArtiste = new Artiste($ligne["human_id"], $ligne["human_lastname"], $ligne["human_firstname"], $ligne["human_sex"], $ligne["human_dob"], $ligne["human_pic"], $ligne["artist_dod"], $ligne["artist_nickname"]);            
            }
            $req->closeCursor();
            return $lArtiste;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
}
?>