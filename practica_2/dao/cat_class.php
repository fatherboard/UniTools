<?php

class TOcategoria{
    
    private $id_cat;
    private $cat_name;
    private $desc;
    
    function __construct($id_cat='', $cat_name='', $desc=''){
        $this->id_cat = $id_cat;
        $this->cat_name = $cat_name;
        $this->desc = $desc;    
    }
    
    /* Set functions (DAO uses)  ################################################################# */
    
    public function create_Post($columna){
        
		$this->id_cat = $columna['id_cat'];
		$this->cat_name = $columna['cat_name'];
		$this->desc = $columna['desc'];

	}

	public function set_cat_name($newName){
		$this->user = $newName;
	}

	public function set_desc($newDesc){
		$this->title = $newDesc;
	}


	/* Get functions ################################################################# */

	public function get_cat(){
		// devuelde un array con todos los datos de la categoria
		$columna = [
            "id_cat" => $this->id_cat,
		    "cat_name" => $this->cat_name,
		    "desc" => $this->desc,
		];

		return $columna;
	}
    
	public function get_id(){
		return $this->id_cat;
	}
    
	public function get_name(){
		return $this->cat_name;
	}

	public function get_desc(){
		return $this->desc;
	}

}
    
?>