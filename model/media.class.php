<?php
include_once 'connect.php';

class Media
{
    protected $media_id;
    protected $media_title;
    protected $media_type;
    protected $media_year;
    protected $media_cover;
    protected $media_link; 

	/**
	 * Construit un nouvel objet de type média
	 * Prend en paramètre les valeurs à assigner aux attributs de l'objet
	 * Renvoie un objet de type Media
	 */
    public function __construct($id,$titre,$type,$annee,$cover,$lien)
	{
		$this-> media_id = $id;
		$this-> media_title = $titre;
        $this-> media_type = $type;
        $this-> media_year = $annee;
		$this-> media_cover = $cover;
        $this-> media_link = $lien;
    }
	
	/**
	 * Détruit l'objet
	 */
    public function __destruct()
	{
		
    }
	
	/**
	 * Renvoie l'attribut passé en paramètre
	 * $attribut: chaine de caractère correspondant au nom d'un attribut
	 * Renvoie un attribut en fonction de la variable passée en paramètres
	 */
    public function __get($attribut)
	{
		switch($attribut)
		{
			case 'media_id': {return $this->media_id;break;}
            case 'media_title': {return $this->media_title;break;}
            case 'media_type': {return $this->media_type;break;}	
            case 'media_year': {return $this->media_year;break;}
            case 'media_cover': {return $this->media_cover;break;}
            case 'media_link': {return $this->media_link;break;}		
		}
	}
	
	/*
	public function getTags()
	{
		$TableauTags = array();
		try
		{
			$cnx = connexionPDO();
			$req = $cnx->prepare('SELECT tag_name FROM tag, is_associated_with WHERE tag.tag_id = is_associated_with.tag_id AND media_id = ?');
			$req->execute(array($this->media_id));
			while ($ligne = $req->fetch())
			{
				$TableauTags[] = $ligne["tag_name"];
			}
			$req->closeCursor();
			return $TableauTags;
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	public function getGenres()
	{
		$TableauGenres = array();
		try
		{
			$cnx = connexionPDO();
			$req = $cnx->prepare('SELECT genre_name FROM genre, categorized_by WHERE genre.genre_id = categorized_by.genre_id AND media_id = ?');
			$req->execute(array($this->media_id));
			while ($ligne = $req->fetch())
			{
				$TableauGenres[] = $ligne["genre_name"];
			}
			$req->closeCursor();
			return $TableauGenres;
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	public function getProducteur()
	{
		$producteur = '';
		try
		{
			$cnx = connexionPDO();
			$req = $cnx->prepare('SELECT pc_name FROM pc, produced_by WHERE pc.pc_id = produced_by.pc_id AND media_id = ?');
			$req->execute(array($this->media_id));
			$ligne = $req->fetch();
			$producteur = $ligne["pc_name"];
			$req->closeCursor();
			return $producteur;
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
*/
	public function getNoteMoyenne()
	{
		$noteMoyenne = "Pas de note";
		try
		{
			$cnx = connexionPDO();
			$req = $cnx->prepare('SELECT AVG(appr_note) as noteMoyenne FROM appreciation JOIN media ON media.media_id = appreciation.media_id WHERE appreciation.media_id = ?');
			$req->execute(array($this->media_id));
			$ligne = $req->fetch();
			$noteMoyenne = $ligne["noteMoyenne"];
			$req->closeCursor();
			return $noteMoyenne;
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
}
?>