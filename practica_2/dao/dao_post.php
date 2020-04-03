<?php

include_once('DAO.php');
include_once('post_class.php');

/* Data Access Object */
class DAOpost extends DAO {

	/*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del post. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */
	
	public function __construct(){
		parent::__construct();
	}

	public function insert_Post($TOUpost){
		$user = $TOUpost->get_user();
        $title = $TOUpost->get_title();
        $content = $TOUpost->get_content();
        $category =  $TOUpost->category();
		$sql = sprintf("INSERT INTO posts(user,title,content,category) 
		    VALUES ('$user', '$title', '$content', '$category')");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$post = new TOUpost($result['user'],$result['title'],$result['content'],$result['category']);
			return $post;
		}
		return null;
	}

	public function search_post($id){
		$sql = sprintf("SELECT * FROM posts WHERE id_post = $id");
		$result = $this->ejecutarConsulta($sql);
		// he modificado esta funcion para que devuelva el array solo para ver si lo crea bien (hay que cambiar a return $post)
		if (count($result) > 0) {
			$post = new TOUpost($result['user'],$result['title'],$result['content'],$result['categoria']);
			return $post;
		}else{
            return null;
        }
	}

	public function update_title($id,$title){
		$sql = sprintf("UPDATE posts SET title = $title WHERE id_post = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$post = new TOUpost($result['user'],$result['title'],$result['content'],$result['categoria']);
			return $post;
		}
		return null;
	}

	public function update_content($id,$content){	
		$sql = sprintf("UPDATE posts SET content = '" .$content. "' WHERE id_post = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$post = new TOUpost($result['user'],$result['title'],$result['content'],$result['categoria']);
			return $post;
		}
		return null;
	}

	public function update_category($id,$category){
		$sql = sprintf("UPDATE posts SET category = $category WHERE id_post = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$post = new TOUpost($result['user'],$result['title'],$result['content'],$result['categoria']);
			return $post;
		}
		return null;
	}

	public function show_all_data(){
		$sql = sprintf("SELECT * FROM posts");
		$result = $this->ejecutarConsulta($sql);
		if (count($result) > 0) {
			$post = new TOUpost($result['user'],$result['title'],$result['content'],$result['categoria']);
			return $post;
		}
		return null; //antes ponía "return result"
	}

}

?>