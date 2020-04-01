<?php

class User {

	public $id_User;
	public $email;
	public $password;
	public $user_name;
	public $premium;

	function __construct($email="",$password="",$user_name="",$premium=0){

		$this->email = $email;
		$this->password = $password;
		$this->user_name = $user_name;
		$this->premium = $premium;
	}

	/* Set functions  ################################################################# */
	
	public function create_User($columna){

		$this->email = $columna['email'];
		$this->password = $columna['password'];
		$this->user_name = $columna['user_name'];
		$this->premium = $columna['premium'];
	}

	public function insert_User(){
		$sql = sprintf("INSERT INTO user(email, password, username, premium ) 
		                VALUES ('$this->email', '$this->password', '$this->user_name', '$this->premium')");
		return $sql;
	}

	public function set_email($correo){
		$this->email = $correo;
		$sql = sprintf("UPDATE user SET email = $correo WHERE id_User = $this->id_User");
		return $sql;
	}

	public function set_password($pass){
		$this->password = $pass;
		$sql = sprintf("UPDATE user SET password = $pass WHERE id_User = $this->id_User");
		return $sql;
	}

	public function set_user_name($user_name){
		$this->user_name = $user_name;
		$sql = sprintf("UPDATE user SET username = $user_name WHERE id_User = $this->id_User");
		return $sql;
	}

	/* Get functions ################################################################# */

	public function get_all_users(){
		$sql = sprintf("SELECT * FROM user");
		return $sql;
	}

	public function get_User($id){
		$sql = sprintf("SELECT * FROM user WHERE id_User = $id");
		return $sql;
	}

	public function get_User(){
		$sql = sprintf("SELECT * FROM user WHERE id_User = $this->id_User");
		return $sql;
	}

	public function get_email(){
		$sql = sprintf("SELECT email FROM user WHERE id_User = $this->id_User");
		return $sql;
	}

	public function get_password(){
		$sql = sprintf("SELECT password FROM user WHERE id_User = $this->id_User");
		return $sql;
	}

	public function get_user_name(){
		$sql = sprintf("SELECT user_name FROM user WHERE id_User = $this->id_User");
		return $sql;
	}

}

?>