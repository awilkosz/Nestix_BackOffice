<?php
include_once 'connect.php';
include_once 'livre.class.php';
include_once 'gestionMedias.class.php';

class GestionLivres
{
	public static function getAllLivres()
	{
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->query('SELECT * FROM book INNER JOIN media ON book.book_id = media.media_id');
            while ($ligne = $req->fetch())
            {
                $TableauLivres[] = new Livre($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"], $ligne["ISBN"],$ligne["book_synop"],$ligne["book_tome"],$ligne["book_saga"]);
            }
            $req->closeCursor();
            return $TableauLivres;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
	
	public static function getLivreById($id)
	{
        $leLivre = NULL;
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->prepare('SELECT * FROM book INNER JOIN media ON book.book_id = media.media_id WHERE book_id = ?');
			$req->execute(array($id));
			
            while ($ligne = $req->fetch())
            {
                $leLivre = new Livre($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"], $ligne["ISBN"],$ligne["book_synop"],$ligne["book_tome"],$ligne["book_saga"]);
            }
            $req->closeCursor();
            $req = NULL;
            return $leLivre;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    public static function UpdateLivre($id,$isbn,$synopsis,$tome,$saga)
	{
	   try
	   {   
		   $cnx = connexionPDO();
		   $req = $cnx->prepare('UPDATE book SET isbn = ?, book_synop = ?, book_tome = ?, book_saga = ? WHERE book_id = ?; ');
		   $req->execute(array($isbn,$synopsis,$tome,$saga,$id));
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