<?php

include_once('DAO.php');
require_once('dao/respuesta_class.php');

/* Data Access Object */
class DAOrespuesta extends DAO {

	/*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del post. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */
	
	public function __construct(){
		parent::__construct();
	}

	public function insert_respuesta($TOrespuesta){
        $user = $TOrespuesta->get_user();
        $id_post =  $TOrespuesta->get_post();
        $content = $TOrespuesta->get_content();
		$sql = sprintf("INSERT INTO respuesta(id_post,user,content) 
		    VALUES ('$id_post', '$user', '$content')");
		$result = $this->insertarConsulta($sql);
		return $result;
	}

	public function search_respuesta($id){
		$sql = sprintf("SELECT * FROM respuesta WHERE id_respuesta = $id");
		$result = $this->ejecutarConsulta($sql);
		$respuesta = new TOrespuesta($result['id_respuesta'], $result['id_post'], $result['user'], $result['date'], $result['content']);
		return $respuesta;
	}

	public function update_content($id,$content){
		$sql = sprintf("UPDATE respuesta SET content = $content WHERE id_respuesta = $id");
		$result = $this->ejecutarConsulta($sql);
		return $result;
	}
}

?>