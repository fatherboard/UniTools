<?php

include_once('DAO.php');
require_once('dao/TOPermissions.php');

/* Data Access Object */
class DAOpermissions extends DAO {

	/*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del post. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */
	
	public function __construct(){
		parent::__construct();
	}

	public function insert_permission($TOPermission){
        $id = $TOPermission->get_id();
        $project =  $TOPermission->get_project();
		$user = $TOPermission->get_user();
		$type = $TOPermission->get_type();
		
		$sql = sprintf("INSERT INTO permissions(id,project,user,type) 
		    VALUES ('$id', '$project', '$user', $type)");
		$result = $this->insertarConsulta($sql);
		return $result;
	}

	public function show_project_perm($project){
		$sql = sprintf("SELECT * FROM permissions WHERE project = $project");
		$query = $this->devolverConsulta($sql);
		$array = [];
		while($result = mysqli_fetch_assoc($query)){
            $project = new TOPermissions($result['id'], $result['project'], $result['user'], $result['type']);
            array_push($array, $project);
        }
		
		return $array;
	}

	public function show_permissions($project, $user){
		$sql = sprintf("SELECT * FROM permissions WHERE project = $project AND user = $user");
		$result = $this->ejecutarConsulta($sql);
		$respuesta = new TOPermissions($result['id'], $result['project'], $result['user'], $result['type']);
		return $respuesta;
	}

	public function update_type($project,$user,$type){
		$sql = sprintf("UPDATE permissions SET type = $type WHERE user = $user AND project = $project");
		$result = $this->ejecutarConsulta($sql);
		return $result;
	}

	public function deletePermission($project,$user) {
		$sql = sprintf("DELETE FROM permissions WHERE project = $project AND user = $user");
		$result = $this->insertarConsulta($sql);
		
		return $result;
	}

}

?>