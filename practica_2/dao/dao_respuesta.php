<?php

include_once('DAO.php');
include_once('post_class.php');

/* Data Access Object */
class DAOrespuesta extends DAO {

	/*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del post. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */
	
	public function __construct(){
		parent::__construct();
	}

	public function insert_Post($TOUpost){
        $user = $TOrespuesta->get_user();
        $date = $TOrespuesta->get_date();
        $category =  $TOrespuesta->category();
        $content = $TOrespuesta->get_content();
		$sql = sprintf("INSERT INTO respuesta(user,date,category,content) 
		    VALUES ('$user', '$date', '$category', '$content')");
		$result = $this->ejecutarConsulta($sql);
		$post = new TOUpost($result['user'],$result['date'],$result['category'],$result['content']);
		return $post;
	}

	public function search_post($id){
		$sql = sprintf("SELECT * FROM post WHERE id_respuesta = $id");
		$result = $this->ejecutarConsulta($sql);
		$post = new TOUpost($result['user'],$result['date'],$result['category '],$result['content']);
		return $post;
	}

	public function update_content($id,$content){
		$sql = sprintf("UPDATE post SET content = $content WHERE id_respuesta = $id");
		$result = $this->ejecutarConsulta($sql);
		$post = new TOUpost($result['user'],$result['date'],$result['category'],$result['content']);
		return $post;
	}

	public function update_category($id,$category){
		$sql = sprintf("UPDATE post SET category = $category WHERE id_respuesta = $id");
		$result = $this->ejecutarConsulta($sql);
		$post = new TOUpost($result['user'],$result['title'],$result['cetegory'],$result['content']);
		return $post;
	}
}

?>