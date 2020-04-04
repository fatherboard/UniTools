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
        $username = $TOUser->get_username();
        $premium =  $TOUser->get_premium();
		$sql = "INSERT INTO user SET email='$mail' , password='$pass', username='$username', premium='$premium'";
		
		if (!$this->insertarConsulta($sql))
			return false;
		else 
		{
			return true;
		}
	}

	//TODO Delete if we transition form userId -> username as primary key
	
	public function search_userId($userId){
		$sql = sprintf("SELECT * FROM user WHERE id_User = $userId");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_User'],$result['email'],$result['password'],$result['username'],$result['premium']);
			return $user;
		}
	}

	public function search_username($username){
		$sql = sprintf("SELECT * FROM user WHERE username = '" .$username. "'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_User'],$result['email'],$result['password'],$result['username'],$result['premium']);
			return $user;
		}	
	}

	//TODO change userId -> username
	public function update_email($username,$mail){
		$sql = sprintf("UPDATE user SET email ='" .$mail. "' WHERE username = '" .$username. "' ");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_User'],$result['email'],$result['password'],$result['username'],$result['premium']);
			return $user;
		}
	}

	public function update_password($username,$pass){	
		$sql = sprintf("UPDATE user SET password = '" .$pass. "' WHERE username = '" .$username. "' ");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_User'],$result['email'],$result['password'],$result['username'],$result['premium']);
			return $user;
		}
	}

	//TODO Check for errors
	public function update_user_name($old_username, $new_username){
		$sql = sprintf("UPDATE user SET username = '" .$new_username. "' WHERE username = $old_username");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_User'],$result['email'],$result['password'],$result['username'],$result['premium']);
			return $user;
		}
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