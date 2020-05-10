<?php

/* Transfer Object */
class TOUser {

	private $userId;
	private $email;
	private $password;
	private $user_name;
	private $premium;
	private $admin;
	private $name;
	private $aboutMe;
	function __construct($userId='',$email='',$password='',$user_name='',$premium='', $admin='', $name='', $aboutMe=''){
		$this->userId = $userId;
		$this->email = $email;
		$this->password = $password;
		$this->user_name = $user_name;
		$this->premium = $premium;
		$this->admin = $admin;
		$this->name = $name;
		$this->aboutMe = $aboutMe;
	}
	
	/*
	function __construct($columna){
		$this->email = $columna['email'];
		$this->password = $columna['password'];
		$this->user_name = $columna['user_name'];
		$this->premium = $columna['premium'];
	}
	*/
	/* Set functions (DAO uses)  ################################################################# */
	
	public function create_User($columna){
		$this->email = $columna['email'];
		$this->password = $columna['password'];
		$this->user_name = $columna['user_name'];
		$this->premium = $columna['premium'];		
		$this->admin = $columna['admin'];
		$this->name = $columna['name'];
		$this->aboutMe = $columna['aboutMe'];
	}

	public function set_email($correo){
		$this->email = $correo;
	}

	public function set_password($pass){
		$this->password = $pass;
	}

	public function set_user_name($user_name){
		$this->user_name = $user_name;
	}

	/* Get functions ################################################################# */

	public function get_user(){
		// devuelve un array con todos los datos de usuario
		$columna = [
		    "email" => $this->email,
		    "password" => $this->password,
		    "user_name" => $this->user_name,
		    "premium" => $this->premium,
		    "admin" => $this->admin
		];

		return $columna;
	}
	
	public function get_email(){
		return $this->email;
	}

	public function get_password(){
		return $this->password;
	}

	public function get_username(){
		return $this->user_name;
	}

	public function get_premium(){
		return $this->premium;
	}

	public function get_id(){
		return $this->userId;
	}

	public function isAdmin(){
		return $this->admin;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_aboutMe(){
		return $this->aboutMe;
	}
}
?>