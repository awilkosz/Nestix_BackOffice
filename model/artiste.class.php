<?php
include_once 'humain.class.php';
include_once 'media.class.php';

class Artiste extends Humain
{
     
    private $artist_dod;
    private $artist_nickname;
    private $asv_id;

    public function __construct($id,$lastname,$firstname,$sex,$dob,$pic,$dod,$nickname)
	{
        $this-> artist_dod = $dod;
        $this-> artist_nickname = $nickname;
        parent::__construct($id,$lastname,$firstname,$sex,$dob,$pic);
    }
    
    public function __destruct()
	{
		
    }
    
    public function __get($attribut)
	{
		switch($attribut)
		{
            case 'artist_dod': {return $this->artist_dod;break;}
            case 'artist_nickname': {return $this->artist_nickname;break;}
            case 'asv_id': {return $this->asv_id;break;}	
			case 'human_id': {return parent::__get('human_id');break;}
            case 'human_lastname': {return parent::__get('human_lastname');break;}
            case 'human_firstname': {return parent::__get('human_firstname');break;}
            case 'human_sex': {return parent::__get('human_sex');break;}
            case 'human_dob': {return parent::__get('human_dob');break;}
            case 'human_pic': {return parent::__get('human_pic');break;}		
		}
    }
    
    public function getMediasRealises()
    {
        $lesMediasRealises = array();
		try
		{
			$cnx = connexionPDO();
			$req = $cnx->prepare('SELECT * FROM media JOIN take_part_in ON media.media_id = take_part_in.media_id WHERE take_part_in.human_id = ?');
			$req->execute(array($this->human_id));
			while ($ligne = $req->fetch())
			{
				$lesMediasRealises[] = new Media($ligne["media_id"], $ligne["media_title"], $ligne["media_type"], $ligne["media_year"], $ligne["media_cover"], $ligne["media_link"]);
			}
			$req->closeCursor();
			return $lesMediasRealises;
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
    }
}
?>