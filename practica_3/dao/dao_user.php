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
		$mail = $mail = $TOUser->get_email();
        $pass = $TOUser->get_password();
        $username = $TOUser->get_username();
        $premium =  $TOUser->get_premium();
		$admin = $TOUser->isAdmin();
		$name = $TOUser->get_name();
		$aboutMe = $TOUser->get_aboutMe();
		$sql = "INSERT INTO user SET email='$mail' , password='$pass', username='$username', premium='$premium', admin='$admin', name='$name', aboutMe='$aboutMe'";
		
		if (!$this->insertarConsulta($sql))
			return false;
		else 
		{
			return true;
		}
	}

	
	public function search_userId($userId){
		$sql = sprintf("SELECT * FROM user WHERE id_User = $userId");
		if (!$this->ejecutarConsulta($sql))
			return null;
		
		
		$result = $this->ejecutarConsulta($sql);
		$user = new TOUser($result['id_user'],$result['email'],$result['password'],$result['username'],$result['premium'], $result['admin'], $result['name'], $result['aboutMe']);
		return $user;
		
	}

	public function search_premium($username){
		
		$sql = sprintf("SELECT premium FROM user WHERE username = '" .$username. "'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else{
			
			return true;
		}
	}

	public function search_username($username){
		$sql = sprintf("SELECT * FROM user WHERE username = '" .$username. "'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_user'],$result['email'],$result['password'],$result['username'],$result['premium'], $result['admin'], $result['name'], $result['aboutMe']);
			return $user;
		}	
	}

	public function update_email($username,$mail){
		$sql = sprintf("UPDATE user SET email ='" .$mail. "' WHERE username = '" .$username. "' ");
		$result = $this->insertarConsulta($sql);
		if ($result == null)
			return null;
		else 
			return true;
	}

	public function update_premium($username){
		$sql = sprintf("UPDATE user SET premium = 1 WHERE username = '" .$username. "'");
		$result = $this->insertarConsulta($sql);
		if ($result == null)
			return null;
		else 
			return true;
	}

	public function downgrade_premium($username){
		$sql = sprintf("UPDATE user SET premium = 0 WHERE username = '" .$username. "'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_user'],$result['email'],$result['password'],$result['username'],$result['premium'], $result['admin'], $result['name'], $result['aboutMe']);
			return $user;
		}
	}

	public function update_password($username,$pass){	
		$sql = sprintf("UPDATE user SET password = 	'" .$pass. "' WHERE username = '" .$username. "' ");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_user'],$result['email'],$result['password'],$result['username'],$result['premium'], $result['admin'], $result['name'], $result['aboutMe']);
			return $user;
		}
	}

	
	public function update_user_name($old_username, $new_username){
		$sql = sprintf("UPDATE user SET username = '" .$new_username. "' WHERE username = '" . $old_username. "'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_user'],$result['email'],$result['password'],$result['username'],$result['premium'], $result['admin'], $result['name'], $result['aboutMe']);
			return $user;
		}
	}

	public function update_name($username, $new_name){
		$sql = sprintf("UPDATE user SET name = '" .$new_name. "' WHERE username = '" .$username. "' ");
		$result = $this->insertarConsulta($sql);
		if ($result == null)
			return null;
		else 
			return true;
	}

	public function update_aboutMe($username, $new_aboutMe){
		$sql = sprintf("UPDATE user SET aboutMe = '" .$new_aboutMe. "' WHERE username = '" .$username. "' ");
		$result = $this->insertarConsulta($sql);
		if ($result == null)
			return null;
		else 
			return true;
	}

}
