<?php
include_once 'connect.php';
include_once 'humain.class.php';

class GestionHumains
{
	public static function getAllHumains()
	{
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->query('SELECT * FROM human');
            while ($ligne = $req->fetch())
            {
                $TableauHumains[] = new Humain($ligne["human_id"], $ligne["human_lastname"], $ligne["human_firstname"], $ligne["human_sex"], $ligne["human_dob"], $ligne["human_pic"]);
            }
            $req->closeCursor();
            return $TableauHumains;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
	
	public static function addHumain()
	{
		try
		{
			$cnx = connexionPDO();
			$req = $cnx->prepare("INSERT INTO human (human_lastname,human_firstname,human_sex,human_dob,human_pic)VALUES (?,?,?,?,?)");
			$req->execute(array(NULL,NULL,NULL,NULL,NULL));
			$req->closeCursor();
            return 0;
		}
		catch(Exception $ex)
		{
			die('Erreur : ' . $ex->getMessage());
		}
	}
	
	public static function getLastHuman()
	{
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->query('SELECT MAX(human_id) AS last_id FROM human');
			$ligne = $req->fetch();
            $dernierId = $ligne["last_id"];
            $req->closeCursor();
            return $dernierId;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
	
	public static function updateImageArtiste($id, $img)
	{
		try
		{   
			$cnx = connexionPDO();
			$req = $cnx->prepare('UPDATE human SET human_pic = ? WHERE human_id = ?; ');
			$req->execute(array($img,$id));
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