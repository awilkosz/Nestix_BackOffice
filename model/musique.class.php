<?php
include_once 'media.class.php';

class Musique extends Media
{
	private $song_album;
	private $song_moment;
	private $song_path;

    public function __construct($id,$titre,$type,$annee,$cover,$lien,$album,$moment,$path)
	{
		$this-> song_album = $album;
		$this-> song_moment = $moment;
		$this-> song_path = $path;
		parent::__construct($id,$titre,$type,$annee,$cover,$lien);
    }
    
    public function __destruct()
	{
		
    }
    
    public function __get($attribut)
	{
		switch($attribut)
		{
			case 'song_album': {return $this->song_album;break;}	
			case 'song_moment': {return $this->song_moment;break;}
			case 'song_path': {return $this->song_path;break;}
			case 'media_id': {return parent::__get('media_id');break;}
			case 'media_title': {return parent::__get('media_title');break;}
			case 'media_type': {return parent::__get('media_type');break;}
			case 'media_year': {return parent::__get('media_year');break;}
			case 'media_cover': {return parent::__get('media_cover');break;}
			case 'media_link': {return parent::__get('media_link');break;}
		}
	}
	
	/*
	public function getInterpretes()
	{
		$TableauInterpretes = array();
		try
		{
			$cnx = connexionPDO();
			$req = $cnx->prepare('SELECT human.*, artist.* FROM human JOIN artist ON human.human_id = artist.human_id JOIN take_part_in ON artist.human_id = take_part_in.human_id WHERE take_part_in.media_id = ? AND take_part_in.work_id = 2');
			$req->execute(array($this->media_id));
			while ($ligne = $req->fetch())
            {
                $TableauInterpretes[] = new Artiste($ligne["human_id"], $ligne["human_lastname"], $ligne["human_firstname"], $ligne["human_sex"], $ligne["human_dob"], $ligne["human_pic"], $ligne["artist_dod"], $ligne["artist_nickname"], $ligne["asv_id"]);
            }
			$req->closeCursor();
			return $TableauInterpretes;
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}*/
}
?>