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

	public function insert_respuesta($TORespuesta){
        $user = $TORespuesta->get_user();
        $id_post =  $TORespuesta->get_post();
		$content = $TORespuesta->get_content();
		$answer_to = $TORespuesta->get_answer();
		
		$sql = sprintf("INSERT INTO respuesta(id_post,user,content,answer_to) 
		    VALUES ('$id_post', '$user', '$content', $answer_to)");
		$result = $this->insertarConsulta($sql);
		return $result;
	}

	public function search_respuesta($id){
		$sql = sprintf("SELECT * FROM respuesta WHERE id_respuesta = $id");
		$result = $this->ejecutarConsulta($sql);
		$respuesta = new TOrespuesta($result['id_respuesta'], $result['id_post'], $result['user'], $result['date'], $result['content'], $result['answer_to']);
		return $respuesta;
	}

	public function update_content($id,$content){
		$sql = sprintf("UPDATE respuesta SET content = $content WHERE id_respuesta = $id");
		$result = $this->ejecutarConsulta($sql);
		return $result;
	}

	public function show_all_answers($id){
		$sql = sprintf("SELECT * FROM respuesta WHERE id_post = $id  AND answer_to = '-1' ORDER BY id_respuesta ASC");
		$query = $this->devolverConsulta($sql);
        $array = [];
        while($result = mysqli_fetch_assoc($query)){
            $respuesta = new TORespuesta($result['id_respuesta'],$result['id_post'],$result['user'],$result['date'],$result['content'],$result['answer_to']);
            array_push($array, $respuesta);
        }

		return $array; 
	}

	public function show_nested_answers($id,$id_post){
		$sql = sprintf("SELECT * FROM respuesta WHERE id_post = $id AND answer_to = $id_post ORDER BY id_respuesta ASC");
		$query = $this->devolverConsulta($sql);
        $array = [];
        while($result = mysqli_fetch_assoc($query)){
            $respuesta = new TORespuesta($result['id_respuesta'],$result['id_post'],$result['user'],$result['date'],$result['content'],$result['answer_to']);
            array_push($array, $respuesta);
        }

		return $array; 
	}

}

?>