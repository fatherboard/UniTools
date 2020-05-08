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
		$id_user = $TOUser->get_id();
		$mail = $mail = $TOUser->get_email();
        $pass = $TOUser->get_password();
        $username = $TOUser->get_username();
        $premium =  $TOUser->get_premium();
        $admin = $TOUser->isAdmin();
		$sql = "INSERT INTO user SET email='$mail' , password='$pass', username='$username', premium='$premium', admin='$admin'";
		
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
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_user'],$result['email'],$result['password'],$result['username'],$result['premium'], $result['admin']);
			return $user;
		}
	}

	public function search_premium($username){
		
		$sql = sprintf("SELECT premium FROM user WHERE username = '" .$username. "'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else{
			$result = $this->ejecutarConsulta($sql);
			$premium = $result;
			return $premium;
		}
	}

	public function search_username($username){
		$sql = sprintf("SELECT * FROM user WHERE username = '" .$username. "'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_user'],$result['email'],$result['password'],$result['username'],$result['premium'], $result['admin']);
			return $user;
		}	
	}

	public function update_email($username,$mail){
		$sql = sprintf("UPDATE user SET email ='" .$mail. "' WHERE username = '" .$username. "' ");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_user'],$result['email'],$result['password'],$result['username'],$result['premium'], $result['admin']);
			return $user;
		}
	}

	public function update_premium($username){
		$sql = sprintf("UPDATE user SET premium = 1 WHERE username = '" .$username. "'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_user'],$result['email'],$result['password'],$result['username'],$result['premium'], $result['admin']);
			return $user;
		}
	}

	public function downgrade_premium($username){
		$sql = sprintf("UPDATE user SET premium = 0 WHERE username = '" .$username. "'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_user'],$result['email'],$result['password'],$result['username'],$result['premium'], $result['admin']);
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
			$user = new TOUser($result['id_user'],$result['email'],$result['password'],$result['username'],$result['premium'], $result['admin']);
			return $user;
		}
	}

	
	public function update_user_name($old_username, $new_username){
		$sql = sprintf("UPDATE user SET username = '" .$new_username. "' WHERE username = $old_username");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id_user'],$result['email'],$result['password'],$result['username'],$result['premium'], $result['admin']);
			return $user;
		}
	}

}

?>