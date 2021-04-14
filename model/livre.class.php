<?php
include_once 'media.class.php';

class Livre extends Media
{
    private $isbn;
    private $book_synop;
    private $book_tome;
    private $book_saga; 

    public function __construct($id,$titre,$type,$annee,$cover,$lien,$i,$synopsis,$tome,$saga)
	{
		$this-> isbn = $i;
        $this-> book_synop = $synopsis;
		$this-> book_tome = $tome;
        $this-> book_saga = $saga;
		parent::__construct($id,$titre,$type,$annee,$cover,$lien);
    }
    
    public function __destruct()
	{
		
    }
    
    public function __get($attribut)
	{
		switch($attribut)
		{
			case 'isbn': {return $this->isbn;break;}
            case 'book_synop': {return $this->book_synop;break;}
            case 'book_tome': {return $this->book_tome;break;}
            case 'book_saga': {return $this->book_saga;break;}	
			case 'media_id': {return parent::__get('media_id');break;}
			case 'media_title': {return parent::__get('media_title');break;}
			case 'media_type': {return parent::__get('media_type');break;}
			case 'media_year': {return parent::__get('media_year');break;}
			case 'media_cover': {return parent::__get('media_cover');break;}
			case 'media_link': {return parent::__get('media_link');break;}
		}
	}
	
	/*
	public function getAuteurs()
	{
		$TableauAuteurs = array();
		try
		{
			$cnx = connexionPDO();
			$req = $cnx->prepare('SELECT human.*, artist.* FROM human JOIN artist ON human.human_id = artist.human_id JOIN take_part_in ON artist.human_id = take_part_in.human_id WHERE take_part_in.media_id = ? AND take_part_in.work_id = 3');
			$req->execute(array($this->media_id));
			while ($ligne = $req->fetch())
            {
                $TableauAuteurs[] = new Artiste($ligne["human_id"], $ligne["human_lastname"], $ligne["human_firstname"], $ligne["human_sex"], $ligne["human_dob"], $ligne["human_pic"], $ligne["artist_dod"], $ligne["artist_nickname"], $ligne["asv_id"]);
            }
			$req->closeCursor();
			return $TableauAuteurs;
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}*/
}
?>