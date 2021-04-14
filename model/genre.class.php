<?php

class Genre
{
    protected $genre_id;
    protected $genre_name;

    public function __construct($id,$name)
	{
		$this-> genre_id = $id;
		$this-> genre_name = $name;
    }
    
    public function __destruct()
	{
		
    }
    
    public function __get($attribut)
	{
		switch($attribut)
		{
			case 'genre_id': {return $this->genre_id;break;}
            case 'genre_name': {return $this->genre_name;break;}			
		}
	}
}
?>