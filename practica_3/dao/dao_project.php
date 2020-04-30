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
	$user = $TOUproject->get_user();
    $title = $TOUproject->get_title();
    $content = $TOUproject->get_content();
    $lenguaje =  $TOUproject->get_lenguaje();
    $candado = $TOUproject->get_candado();
    $estrellas = $TOUproject->get_estrellas();
    $sql = sprintf("INSERT INTO projects(user,title,content,lenguaje,candado,estrellas) 
		 VALUES ('$user', '$title', '$content', '$lenguaje', '$candado', '$estrellas')");
		$result = $this->insertarConsulta($sql);
		
		if ($result) {
			return true;
		}
		return null;
	}
  
  public function search_project($id)
  {
		$sql = sprintf("SELECT * FROM projects WHERE id_Proyecto = $id");
		$result = $this->ejecutarConsulta($sql);
        
		if (count($result) > 0) {
			$proj = new TOUproject($result['id_Proyecto'], 
            $result['user'], $result['title'], $result['content'], 
             $result['lenguaje'], $result['candado'],$result['estrellas']);			
            return $proj;
		}else{
            return null;
        }
	}
  
  public function search_certain_project($search)
    {
		$sql = "SELECT * FROM projects WHERE id_Proyecto LIKE '%%$search%%' OR user LIKE '%%$search%%' OR title LIKE '%%$search%%' OR content LIKE '%%$search%%' OR lenguaje LIKE '%%$search%%'";
		$query = $this->devolverConsulta($sql);
		$array = [];
		while($result = mysqli_fetch_assoc($query)){
            $proj = new TOUproject($result['id_Proyecto'], 
            $result['user'], $result['title'], $result['content'], 
             $result['lenguaje'], $result['candado'],$result['estrellas']);			
            array_push($array, $proj);
		}
		return $array;
	 }
  
  public function update_title($id,$title)
    {
		$sql = sprintf("UPDATE projects SET title = '" .$title. "' WHERE id_Proyecto = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$proj = new TOUproject($result['id_Proyecto'], 
            $result['user'], $result['title'], $result['content'], 
             $result['lenguaje'], $result['candado'],$result['estrellas']);			
            return $proj;
		}
		return null;
	}

	public function update_content($id,$content){	
		$sql = sprintf("UPDATE projects SET content = '" .$content. "' WHERE id_Proyecto = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$proj = new TOUproject($result['id_Proyecto'], 
            $result['user'], $result['title'], $result['content'], 
             $result['lenguaje'], $result['candado'],$result['estrellas']);			
            return $proj;
		}
		return null;
	}

	public function update_lenguaje($id,$lenguaje){
		$sql = sprintf("UPDATE projects SET lenguaje = $lenguaje WHERE id_Proyecto = $id");
		$result = $this->ejecutarConsulta($sql);
		
		if (count($result) > 0) {
			$proj = new TOUproject($result['id_Proyecto'], 
            $result['user'], $result['title'], $result['content'], 
             $result['lenguaje'], $result['candado'],$result['estrellas']);			
            return $proj;
		}
		return null;
	}
  
  public function show_all_data(){
		$sql = sprintf("SELECT * FROM projects ORDER BY id_Proyecto DESC");
		$query = $this->devolverConsulta($sql);
        $array = [];
        while($result = mysqli_fetch_assoc($query)){
            $proj = new TOUproject($result['id_Proyecto'], 
            $result['user'], $result['title'], $result['content'], 
             $result['lenguaje'], $result['candado'],$result['estrellas']);			

            array_push($array, $proj);
        }

		return $array; 
	}
}
