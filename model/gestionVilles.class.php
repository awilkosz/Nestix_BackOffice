<?php
include_once 'connect.php';
include_once 'ville.class.php';

class GestionVilles
{
	public static function getAllVilles()
	{
        try
        {
			$cnx = connexionPDO();
            $req = $cnx->query('SELECT * FROM city');
            while ($ligne = $req->fetch())
            {
                $TableauVilles[] = new Ville($ligne["city_id"], $ligne["city_name"], $ligne["country_id"]);
            }
            $req->closeCursor();
            return $TableauVilles;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
	
	public static function getVilleById($id)
	{
        try
        {
			$result="inconnue";
			$cnx = connexionPDO();
            $req = $cnx->prepare('SELECT city_name FROM city WHERE city_id = ?');
			$req->execute(array($id));
            $ligne = $req->fetch();
            $result = $ligne["city_name"];
            $req->closeCursor();
            return $result;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
	}
}
?>