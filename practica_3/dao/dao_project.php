<?php

include_once('DAO.php');
include_once('project_class.php');

/* Data Access Object */
class DAOproject extends DAO {

  public function __construct(){
		parent::__construct();
  }
 
  public function insert_Project($TOUproject)
  {  
    $userId = $TOUproject->get_user();
    $titulo = $TOUproject->get_titulo();
    $contenido = $TOUproject->get_contenido();
    $lenguaje =  $TOUproject->get_lenguaje();
    $candado = $TOUproject->get_candado();
    $privado = $TOUproject->get_privado();
    $estrellas = $TOUproject->get_estrellas();
    $file = $TOUproject->get_file();
    $sql = sprintf("INSERT INTO project(userId,titulo,contenido,lenguaje,privado,candado,estrellas, file) 
		 VALUES ('$userId', '$titulo', '$contenido', '$lenguaje', '$privado','$candado', '$estrellas', '$file')");
		$result = $this->insertarConsulta($sql);

    if ($result) {
			return true;
		}
		return null;
    }
  
  public function search_project($id)
  {
		$sql = sprintf("SELECT * FROM project WHERE id = $id");
		$result = $this->ejecutarConsulta($sql);
        
		if (count($result) > 0) {
			$proj = new TOUproject($result['id'], 
            $result['userId'], $result['titulo'], $result['contenido'], 
             $result['lenguaje'], $result['candado'],$result['estrellas']);			
            return $proj;
		}else{
            return null;
        }
	}
  
  public function search_certain_project($search)
    {
		$sql = "SELECT * FROM project WHERE id LIKE '%%$search%%' OR userId LIKE '%%$search%%' OR titulo LIKE '%%$search%%' OR contenido LIKE '%%$search%%' OR lenguaje LIKE '%%$search%%'";
		$query = $this->devolverConsulta($sql);
		$array = [];
		while($result = mysqli_fetch_assoc($query)){
            $proj = new TOUproject($result['id'], 
            $result['userId'], $result['titulo'], $result['contenido'], 
             $result['lenguaje'],$result['privado'], $result['candado'],$result['estrellas']);			
            array_push($array, $proj);
		}
		return $array;
	 }
  
  public function update_titulo($id,$titulo)
    {
		$sql = sprintf("UPDATE project SET titulo = '" .$titulo. "' WHERE id = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$proj = new TOUproject($result['id'], 
            $result['userId'], $result['titulo'], $result['contenido'], 
             $result['lenguaje'], $result['privado'],$result['candado'],$result['estrellas']);			
            return $proj;
		}
		return null;
	}

	public function update_contenido($id,$contenido){	
		$sql = sprintf("UPDATE project SET contenido = '" .$contenido. "' WHERE id = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$proj = new TOUproject($result['id'], 
            $result['userId'], $result['titulo'], $result['contenido'], 
             $result['lenguaje'],$result['privado'], $result['candado'],$result['estrellas']);			
            return $proj;
		}
		return null;
	}

	public function update_lenguaje($id,$lenguaje){
		$sql = sprintf("UPDATE project SET lenguaje = $lenguaje WHERE id = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$proj = new TOUproject($result['id'], 
            $result['userId'], $result['titulo'], $result['contenido'], 
             $result['lenguaje'], $result['privado'],$result['candado'],$result['estrellas']);			
            return $proj;
		}
		return null;
	}
  
  public function show_all_data(){
		$sql = sprintf("SELECT * FROM project ORDER BY id DESC");
		$query = $this->devolverConsulta($sql);
        $array = [];
        while($result = mysqli_fetch_assoc($query)){
            $proj = new TOUproject($result['id'], 
            $result['userId'], $result['titulo'], $result['contenido'], 
             $result['lenguaje'], $result['privado'],$result['candado'],$result['estrellas']);			

            array_push($array, $proj);
        }

		return $array; 
	}
}