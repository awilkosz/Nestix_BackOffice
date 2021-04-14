<?php

class Humain
{
     
    protected $human_id; 
    protected $human_lastname; 
    protected $human_firstname; 
    protected $human_sex; 
    protected $human_dob; 
    protected $human_pic;

    public function __construct($id,$lastname,$firstname,$sex,$dob,$pic)
	{
		$this-> human_id = $id;
		$this-> human_lastname = $lastname;
        $this-> human_firstname = $firstname;
        $this-> human_sex = $sex;
		$this-> human_dob = $dob;
        $this-> human_pic = $pic;
    }
    
    public function __destruct()
	{
		
    }
    
    public function __get($attribut)
	{
		switch($attribut)
		{
			case 'human_id': {return $this->human_id;break;}
            case 'human_lastname': {return $this->human_lastname;break;}
            case 'human_firstname': {return $this->human_firstname;break;}	
            case 'human_sex': {return $this->human_sex;break;}
            case 'human_dob': {return $this->human_dob;break;}
            case 'human_pic': {return $this->human_pic;break;}		
		}
	}
}
?>