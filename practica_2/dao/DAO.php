<?php

class DAO {

	public $conn;

	public function __construct() {

		if (!$this->conn){
		
			$this->conn = mysqli_connect("localhost", "root", "", "unitoolsdb");
		
			if( mysqli_connect_error ()){
			     die ("Conexión con la base de datos fallida : " . mysqli_connect_error());
			}	 
			else{
			      echo "Conexión con la base de datos establecida.";
			}
		}
	}

	public function ejecutarConsulta($query){

		$result = mysqli_query($this->conn, $query);
		return $result->fetch_assoc();
	}
}

?>