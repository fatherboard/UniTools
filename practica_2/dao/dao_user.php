<?php

include_once('DAO.php');
include_once('user_class.php');

/* Data Access Object */
class DAOUsuario extends DAO {

	/*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del user. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */
	
	public function __construct(){
		parent::__construct();
	}

	public function insert_User($TOUser){
		$mail = $TOUser->get_email();
        $pass = $TOUser->get_password();
        $name = $TOUser->get_user_name();
        $premium =  $TOUser->get_premium();
		$sql = sprintf("INSERT INTO user(email, password, username, premium ) 
		    VALUES ('$mail', '$pass', '$name', '$premium')");
		$result = $this->ejecutarConsulta($sql);
		$user = new TOUser($result['email'],$result['password'],$result['username'],$result['premium']);
		return $user;
	}

	public function search_user($id){
		$sql = sprintf("SELECT * FROM user WHERE id_User = $id");
		$result = $this->ejecutarConsulta($sql);
		$user = new TOUser($result['email'],$result['password'],$result['username'],$result['premium']);
		return $user;
	}

	public function update_email($id,$mail){
		$sql = sprintf("UPDATE user SET email = $mail WHERE id_User = $id");
		$result = $this->ejecutarConsulta($sql);
		$user = new TOUser($result['email'],$result['password'],$result['username'],$result['premium']);
		return $user;
	}

	public function update_password($id,$pass){	
		$sql = sprintf("UPDATE user SET password = $pass WHERE id_User = $id");
		$result = $this->ejecutarConsulta($sql);
		$user = new TOUser($result['email'],$result['password'],$result['username'],$result['premium']);
		return $user;
	}

	public function update_user_name($id,$name){
		$sql = sprintf("UPDATE user SET username = $name WHERE id_User = $id");
		$result = $this->ejecutarConsulta($sql);
		$user = new TOUser($result['email'],$result['password'],$result['username'],$result['premium']);
		return $user;
	}

	/*
	public function search_all_users(){
		$sql = sprintf("SELECT * FROM user");
		$result = $this->ejecutarConsulta($sql);

		for ($i=0;$i < len(result); $i++){
			$elem = new TOUser($result[i]['idUser'],$result[i]['email'],$result[i]['password'],$result[i]['username'],$result[i]['premium']);
			$row.add($elem);
		}
		return $row;
	} */
}

?>