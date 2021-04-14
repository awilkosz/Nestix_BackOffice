<?php
include_once 'humain.class.php';
include_once 'connect.php';

class Utilisateur
{
    private $human_id;
    private $user_pseudo;
    private $user_email;
    private $user_status;
    private $user_password;
    private $user_date_creat;
    private $city_id;
	private $admin;

    public function __construct($id,$pseudo,$email,$status,$password,$date_creat,$idC,$a)
	{
        $this-> human_id = $id;
        $this-> user_pseudo = $pseudo;
        $this-> user_email = $email;
        $this-> user_status = $status;
        $this-> user_password = $password;
        $this-> user_date_creat = $date_creat;
        $this-> city_id = $idC;
		$this-> admin = $a;
    }
    
    public function __destruct()
	{
		
    }
    
    public function __get($attribut)
	{
		switch($attribut)
		{
            case 'human_id' : {return $this->human_id;break;}
            case 'user_pseudo': {return $this->user_pseudo;break;}
            case 'user_email': {return $this->user_email;break;}
            case 'user_status': {return $this->user_status;break;}
            case 'user_password': {return $this->user_password;break;}
            case 'user_date_creat': {return $this->user_date_creat;break;}
            case 'city_id': {return $this->city_id;break;}		
			case 'admin': {return $this->admin;break;}	
		}
    }
}
?>