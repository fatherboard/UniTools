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
        $category =  $TOUpost->get_category();
		$sql = sprintf("INSERT INTO posts(user,title,content,id_cat) 
		    VALUES ('$user', '$title', '$content', '$category')");
		$result = $this->insertarConsulta($sql);
		
		if ($result) {
			return true;
		}
		return null;
	}

	public function search_post($id){
		$sql = sprintf("SELECT * FROM posts WHERE id_post = $id");
		$result = $this->ejecutarConsulta($sql);
        
		if (count($result) > 0) {
			$post = new TOUpost($result['id_post'], $result['user'], $result['title'], $result['content'], $result['id_cat']);			
            return $post;
		}else{
            return null;
        }
	}

	public function search_certain_post($search){
		$sql = "SELECT * FROM posts WHERE id_post LIKE '%%$search%%' OR user LIKE '%%$search%%' OR title LIKE '%%$search%%' OR content LIKE '%%$search%%' OR id_cat LIKE '%%$search%%'";
		$query = $this->devolverConsulta($sql);
		$array = [];
		while($result = mysqli_fetch_assoc($query)){
            $post = new TOUpost( $result['id_post'],$result['user'],$result['title'],$result['content'],$result['id_cat']);
            array_push($array, $post);
		}
		return $array; 
		
	}

	public function update_title($id,$title){
		$sql = sprintf("UPDATE posts SET title = '" .$title. "' WHERE id_post = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$post = new TOUpost($result['id_post'], $result['user'], $result['title'], $result['content'], $result['id_cat']);			
            return $post;
		}
		return null;
	}

	public function update_content($id,$content){	
		$sql = sprintf("UPDATE posts SET content = '" .$content. "' WHERE id_post = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$post = new TOUpost( $result['id_post'],$result['user'],$result['title'],$result['content'],$result['id_cat']);
			return $post;
		}
		return null;
	}

	public function update_category($id,$category){
		$sql = sprintf("UPDATE posts SET category = $category WHERE id_post = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$post = new TOUpost( $result['id_post'],$result['user'],$result['title'],$result['content'],$result['id_cat']);
			return $post;
		}
		return null;
	}

	public function show_all_data(){
		$sql = sprintf("SELECT * FROM posts ORDER BY id_post DESC");
		$query = $this->devolverConsulta($sql);
        $array = [];
        while($result = mysqli_fetch_assoc($query)){
            $post = new TOUpost( $result['id_post'],$result['user'],$result['title'],$result['content'],$result['id_cat']);
            array_push($array, $post);
        }

		return $array; 
	}
    
}

?>