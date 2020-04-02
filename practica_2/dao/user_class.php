<?php

/* Transfer Object */
class TOUser {

	private $userId;
	private $email;
	private $password;
	private $user_name;
	private $premium;

	function __construct($userId='',$email='',$password='',$user_name='',$premium=''){
		$this->userId = $userId;
		$this->email = $email;
		$this->password = $password;
		$this->user_name = $user_name;
		$this->premium = $premium;
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
		$this->userId = $columna['userId'];
		$this->email = $columna['email'];
		$this->password = $columna['password'];
		$this->user_name = $columna['user_name'];
		$this->premium = $columna['premium'];
	}

	public function set_email($correo){
		$this->email = $correo;
	}

	public function set_userId($id){
		$this->id_User = $id;
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
			"userId" => $this->userId,
		    "email" => $this->email,
		    "password" => $this->password,
		    "user_name" => $this->user_name,
		    "premium" => $this->premium
		];

		return $columna;
	}
	
	public function get_userId(){
		return $this->userId;
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
}
?>