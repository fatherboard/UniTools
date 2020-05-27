<?php

include_once('DAO.php');
require_once('dao/TOEstrellas.php');

/* Data Access Object */
class DAOestrellas extends DAO {

	/*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del post. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */
	
	public function __construct(){
		parent::__construct();
	}

	public function insert_estrellas($TOEstrellas){
        $id = $TOEstrellas->get_id();
        $project =  $TOEstrellas->get_project();
		$user = $TOEstrellas->get_user();
		$rating = $TOEstrellas->get_rating();
		
		$sql = sprintf("INSERT INTO estrellas(id,project,user,rating) 
		    VALUES ('$id', '$project', '$user', $rating)");
		$result = $this->insertarConsulta($sql);
		return $result;
	}

	public function show_project_estrellas($project){
		$sql = sprintf("SELECT AVG(rating) AS avg FROM estrellas WHERE project = $project");
		$result = $this->ejecutarConsulta($sql);
	
		return $result['avg'];
	}

	public function show_estrellas($project, $user){
		$sql = sprintf("SELECT * FROM estrellas WHERE project = $project AND user = $user");
		$result = $this->ejecutarConsulta($sql);
		$respuesta = new TOEstrellas($result['id'], $result['project'], $result['user'], $result['rating']);
		return $respuesta;
	}

	public function update_estrellas($project,$user,$rating){
		$sql = sprintf("UPDATE estrellas SET rating = $rating WHERE user = $user AND project = $project");
		$result = $this->ejecutarConsulta($sql);
		return $result;
	}

	public function deleteEstrellas($project,$user) {
		$sql = sprintf("DELETE FROM estrellas WHERE project = $project AND user = $user");
		$result = $this->insertarConsulta($sql);
		return $result;
	}

	public function inEstrellas($project, $user){
        $sql = sprintf("SELECT * FROM estrellas WHERE project = $project AND user = $user");
        
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$estrellas = new TOEstrellas($result['id'], $result['project'], $result['user'], $result['rating']);
			return $estrellas;
		}
	}
}

?>