<?php

class TOerror {

	private $id_log;
	private $user;
	private $date;


	function __construct($id_log ='',$user='',$date=''){
        $this->id_log = $id_log;
		$this->user = $user;
		$this->date = $date;
	}
	
	/* Set functions (DAO uses)  ################################################################# */
	
	public function create_log($columna){
        
		$this->user = $columna['user'];
		$this->id_log = $columna['id_log'];
		$this->date = $columna['date'];

	}

	public function set_user($user){
		$this->user = $user;
	}

	public function set_date($date){
		$this->date = $date;
	}

	/* Get functions ################################################################# */

	public function get_post(){
		$columna = [
            "id_log" => $this->id_log,
		    "user" => $this->user,
		    "date" => $this->date,
		];

		return $columna;
	}
    
	public function get_id(){
		return $this->id_log;
	}
    
	public function get_user(){
		return $this->user;
	}

	public function get_date(){
		return $this->date;
	}
}




?>