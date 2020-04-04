<?php

include_once('DAO.php');
include_once('cat_class.php');

/* Data Access Object */
class DAOcategoria extends DAO {

	/*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  de la categoria. Y nosotros podemos usar el TO para modificarlo, o crear una,
	 *  y darsela al DAO para que la use.
	 */
	
	public function __construct(){
		parent::__construct();
	}

	public function insert_cat($TOcategoria){
        $cat_name = $TOcategoria->get_name();
        $description = $TOcategoria->get_desc();
		$sql = sprintf("INSERT INTO categories(cat_name,desc) 
		    VALUES ('$cat_name', '$description')");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$post = new TOcategoria($result['id_cat'], $result['cat_name'], $result['desc']);			
			return $post;
		}
		return null;
	}

	public function search_cat($id){
		$sql = sprintf("SELECT * FROM categories WHERE id_cat = $id");
		$result = $this->ejecutarConsulta($sql);
        
		if (count($result) > 0) {
			$post = new TOcategoria($result['id_cat'], $result['cat_name'], $result['desc']);			
			return $post;
		}
		return null;
	}

	public function update_name($id,$newName){
		$sql = sprintf("UPDATE categories SET cat_name = '" .$newName. "' WHERE id_cat = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$post = new TOcategoria($result['id_cat'], $result['cat_name'], $result['desc']);			
			return $post;
		}
		return null;
	}

	public function update_content($id,$newDesc){	
		$sql = sprintf("UPDATE categories SET desc = '" .$neDesc. "' WHERE id_cat = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$post = new TOcategoria($result['id_cat'], $result['cat_name'], $result['desc']);			
			return $post;
		}
		return null;
	}

	public function show_all_data(){
		$sql = sprintf("SELECT * FROM categories ORDER BY id_cat ASC");
		$query = $this->devolverConsulta($sql);
        $array = [];
        while($result = mysqli_fetch_assoc($query)){
            $post = new TOcategoria($result['id_cat'], $result['cat_name'], $result['desc']);			
            array_push($array, $post);
        }

		return $array; 
	}
    
}

?>