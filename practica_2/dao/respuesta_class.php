<?php

/* Transfer Object */
class TOPost {

	private $id_respuesta;
	private $user;
	private $date;
	private $cat_resp;
	private $content;

	function __construct($user='',$date='',$cat_resp='',$content=''){

		$this->user = $user;
		$this->date = $date;
		$this->cat_resp = $cat_resp;
		$this->content = $content;
	}
	
	/* Set functions (DAO uses)  ################################################################# */
	
	public function create_resp($columna){

		$this->user = $columna['user'];
		$this->title = $columna['title'];
		$this->content = $columna['content'];
		$this->cat_resp = $columna['cat_resp'];
	}

	public function set_user($user){
		$this->user = $user;
	}

	public function set_date($date){
		$this->date = $date;
	}

	public function set_content($content){
		$this->content = $content;
	}

	public function set_category($cat_resp){
		$this->cat_resp = $cat_resp;
	}

	/* Get functions ################################################################# */

	public function get_resp(){
		// devuelde un array con todos los datos de usuario
		$columna = [
		    "user" => $this->user,
		    "date" => $this->date,
		    "content" => $this->content,
		    "cat_resp" => $this->cat_resp
		];

		return $columna;
	}

	public function get_user(){
		return $this->user;
	}

	public function get_date(){
		return $this->date;
	}

	public function get_set_content(){
		return $this->content;
	}

	public function get_category(){
		return $this->cat_resp;
	}
}

?>