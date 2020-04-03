<?php

/* Transfer Object */
class TOUPost {

	private $id_Post;
	private $user;
	private $title;
	private $content;
	private $category;

	function __construct($user='',$title='',$content='',$category=''){

		$this->user = $user;
		$this->title = $title;
		$this->content = $content;
		$this->category = $category;
	}
	
	/* Set functions (DAO uses)  ################################################################# */
	
	public function create_Post($columna){

		$this->user = $columna['user'];
		$this->title = $columna['title'];
		$this->content = $columna['content'];
		$this->category = $columna['category'];
	}

	public function set_user($user){
		$this->user = $user;
	}

	public function set_title($title){
		$this->title = $title;
	}

	public function set_content($content){
		$this->content = $content;
	}

	public function set_category($category){
		$this->category = $category;
	}

	/* Get functions ################################################################# */

	public function get_Post(){
		// devuelde un array con todos los datos de usuario
		$columna = [
		    "user" => $this->user,
		    "title" => $this->title,
		    "content" => $this->content,
		    "category" => $this->category
		];

		return $columna;
	}

	public function get_user(){
		return $this->user;
	}

	public function get_title(){
		return $this->title;
	}

	public function get_content(){
		return $this->content;
	}

	public function get_category(){
		return $this->category;
	}
}

?>