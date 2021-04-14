<?php
include_once 'connect.php';

class Ville
{
    protected $city_id;
    protected $city_name;
    protected $country_id;

    public function __construct($id,$name,$idC)
	{
		$this-> city_id = $id;
		$this-> city_name = $name;
        $this-> country_id = $idC;
    }
    
    public function __destruct()
	{
		
    }
    
    public function __get($attribut)
	{
		switch($attribut)
		{
			case 'city_id': {return $this->city_id;break;}
            case 'city_name': {return $this->city_name;break;}
            case 'country_id': {return $this->country_id;break;}			
		}
	}
}
?>