<?php

/* Transfer Object */
class TORespuesta {

	private $id_respuesta;
	private $id_post;
	private $user;
	private $date;
	private $content;

	function __construct($id_respuesta='', $id_post='', $date='', $user='', $content=''){

		$this->is_respuesta = $id_respuesta;
		$this->is_post = $id_post;
		$this->user = $user;
		$this->date = $date;
		$this->content = $content;
	}
	
	/* Set functions (DAO uses)  ################################################################# */

	public function set_user($user){
		$this->user = $user;
	}

	public function set_date($date){
		$this->date = $date;
	}

	public function set_content($content){
		$this->content = $content;
	}

	public function set_id_post($id){
		$this->id_post = $id;
	}

	/* Get functions ################################################################# */

	public function get_resp(){
		// devuelde un array con todos los datos de usuario
		$columna = [
			"id_respueta" => $this->id_respuesta,
			"id_post" => $this->id_post,
		    "user" => $this->user,
		    "date" => $this->date,
		    "content" => $this->content
		];

		return $columna;
	}

	public function get_id(){
		return $this->id_respuesta;
	}

	public function get_post(){
		return $this->id_post;
	}

	public function get_user(){
		return $this->user;
	}

	public function get_date(){
		return $this->date;
	}

	public function get_content(){
		return $this->content;
	}
}

?>
