<?php

include_once('DAO.php');
include_once('error_class.php');

/* Data Access Object */
class DAOerror extends DAO {

	/*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del post. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */
	
	public function __construct(){
		parent::__construct();
	}

	public function insertError($TOerror){
		$user = $TOerror->get_user();
        $date = $TOerror->get_date();
		$sql = sprintf("INSERT INTO logs(user, date) 
		    VALUES ('$user', '$date')");
		$result = $this->insertarConsulta($sql);
		
		if ($result) {
			return true;
		}
		return null;
	}

	/*
	 searchErrorbyId se usa para buscar un error por su id (no es muy util, es mejor  searchErrorbyUser)
	*/
	public function searchErrorbyId($id){
		$sql = sprintf("SELECT * FROM logs WHERE id_log = $id");
		$result = $this->ejecutarConsulta($sql);
        
		if (count($result) > 0) {
			$log = new TOUpost($result['id_log'], $result['user'], $result['date']);
            return $log;
		}else{
            return null;
        }
	}

	/* 
	searchErrorByUser se usa para saber si X usuario ha producido un error al logearse
	*/
	public function searchErrorByUser($UserId){
		$sql = sprintf("SELECT * FROM logs WHERE user = $UserId");
		$result = $this->ejecutarConsulta($sql);
        
		if (count($result) > 0) {
			$log = new TOerror($result['id_log'], $result['user'], $result['date']);			
            return $log;
		}else{
            return null;
        }
	}

	/*
	muestra todos los errores en la tabla logs
	*/
	public function show_all_data(){
		$sql = sprintf("SELECT * FROM logs ORDER BY id_log DESC");
		$query = $this->devolverConsulta($sql);
        $array = [];
        while($result = mysqli_fetch_assoc($query)){
            $log = new TOerror( $result['id_log'],$result['user'],$result['date']);
            array_push($array, $log);
        }

		return $array; 
	}

	/*
	borra un error según su id 
	*/
	public function borrarError($id) {
		$sql = sprintf("DELETE FROM logs WHERE id_log = $id");
		$result = $this->insertarConsulta($sql);
		
		return $result;
	}
    
}

?>