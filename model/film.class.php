<?php
include_once 'media.class.php';
include_once 'artiste.class.php';

class Film extends Media
{
    private $visa;
    private $movie_runtime;
    private $movie_trailer;
    private $movie_synop;
    private $movie_budget;
    private $movie_saga; 

    public function __construct($id,$titre,$type,$annee,$cover,$lien,$v,$duree,$trailer,$synopsis,$budget,$saga)
	{
		$this-> visa = $v;
		$this-> movie_runtime = $duree;
        $this-> movie_trailer = $trailer;
        $this-> movie_synop = $synopsis;
		$this-> movie_budget = $budget;
        $this-> movie_saga = $saga;
		parent::__construct($id,$titre,$type,$annee,$cover,$lien);
    }
    
    public function __destruct()
	{
		
    }
    
    public function __get($attribut)
	{
		/*On renvoie l'attribut en fonction du paramètes
		Dans le cas d'un héritage, on appelle la fonction __get
		de l'objet parent */
		switch($attribut)
		{
			case 'visa': {return $this->visa;break;}
            case 'movie_runtime': {return $this->movie_runtime;break;}
            case 'movie_trailer': {return $this->movie_trailer;break;}	
            case 'movie_synop': {return $this->movie_synop;break;}
            case 'movie_budget': {return $this->movie_budget;break;}
            case 'movie_saga': {return $this->movie_saga;break;}	
			case 'media_id': {return parent::__get('media_id');break;}
			case 'media_title': {return parent::__get('media_title');break;}
			case 'media_type': {return parent::__get('media_type');break;}
			case 'media_year': {return parent::__get('media_year');break;}
			case 'media_cover': {return parent::__get('media_cover');break;}
			case 'media_link': {return parent::__get('media_link');break;}
		}
    }
    
    public function getActeurs()
	{
		$tableauActeurs = array();
		try
		{
			$cnx = connexionPDO();
			$req = $cnx->prepare('SELECT human.*, artist.* FROM human JOIN artist ON human.human_id = artist.human_id JOIN take_part_in ON artist.human_id = take_part_in.human_id WHERE take_part_in.media_id = ? AND take_part_in.work_id = 1');
			$req->execute(array($this->media_id));
			while ($ligne = $req->fetch())
            {
                $tableauActeurs[] = new Artiste($ligne["human_id"], $ligne["human_lastname"], $ligne["human_firstname"], $ligne["human_sex"], $ligne["human_dob"], $ligne["human_pic"], $ligne["artist_dod"], $ligne["artist_nickname"], $ligne["asv_id"]);
            }
			$req->closeCursor();
			return $tableauActeurs;
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	public function getRealisateurs()
	{
		$tableauRealisateurs = array();
		try
		{
			$cnx = connexionPDO();
			$req = $cnx->prepare('SELECT human.*, artist.* FROM human JOIN artist ON human.human_id = artist.human_id JOIN take_part_in ON artist.human_id = take_part_in.human_id WHERE take_part_in.media_id = ? AND take_part_in.work_id = 1');
			$req->execute(array($this->media_id));
			while ($ligne = $req->fetch())
            {
                $tableauRealisateurs[] = new Artiste($ligne["human_id"], $ligne["human_lastname"], $ligne["human_firstname"], $ligne["human_sex"], $ligne["human_dob"], $ligne["human_pic"], $ligne["artist_dod"], $ligne["artist_nickname"], $ligne["asv_id"]);
            }
			$req->closeCursor();
			return $tableauRealisateurs;
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	/*
	public function getScenaristes()
	{
		$tableauScenaristes = array();
		try
		{
			$cnx = connexionPDO();
			$req = $cnx->prepare('SELECT human.*, artist.* FROM human JOIN artist ON human.human_id = artist.human_id JOIN take_part_in ON artist.human_id = take_part_in.human_id WHERE take_part_in.media_id = ? AND take_part_in.work_id = 1');
			$req->execute(array($this->media_id));
			while ($ligne = $req->fetch())
            {
                $tableauScenaristes[] = new Artiste($ligne["human_id"], $ligne["human_lastname"], $ligne["human_firstname"], $ligne["human_sex"], $ligne["human_dob"], $ligne["human_pic"], $ligne["artist_dod"], $ligne["artist_nickname"], $ligne["asv_id"]);
            }
			$req->closeCursor();
			return $tableauScenaristes;
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}*/
}
?>