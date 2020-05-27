<?php

/* Transfer Object */
class TOEstrellas {

	private $id;
	private $project;
	private $user;
	private $rating;
	
	function __construct($id='',$project='',$user='',$rating=''){
		$this->id = $id;
		$this->project = $project;
		$this->user = $user;
		$this->rating = $rating;
	}
	
	public function set_id($id){
		$this->id = $id;
	}

	public function set_project($project){
		$this->project = $project;
	}

	public function set_user($user){
		$this->user = $user;
    }

    public function set_rating($rating){
		$this->type = $rating;
    }
    

	/* Get functions ################################################################# */

	public function get_permission(){
		// devuelve un array con todos los datos de usuario
		$columna = [
		    "id" => $this->id,
		    "project" => $this->project,
		    "user" => $this->user,
		    "rating" => $this->rating
		];

		return $columna;
	}
	
	public function get_id(){
		return $this->id;
	}

	public function get_project(){
		return $this->project;
	}

	public function get_user(){
		return $this->user;
	}

	public function get_rating(){
		return $this->rating;
	}
}
?>