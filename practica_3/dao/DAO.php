<?php
if (!isset($_SESSION)) {
    session_start();
}

class DAO {

	public $conn;

	public function __construct() {

		if (!$this->conn){
			
			if(isset($_SESSION['admin']) && $_SESSION['admin']){
				// aqui vamos a tener que cambiar para la VPS, habra que poner de usuario Admin y de contraseña Administrador
				// puede que tambien haya problemas al poner ¨localhost¨ si no usamos xampp y lo que queremos es usar el VPS
				$this->conn = mysqli_connect("localhost", "root", "", "unitoolsdb");
			}else{
				$this->conn = mysqli_connect("localhost", "Usuario", "User", "unitoolsdb");
			}
		
			if( mysqli_connect_error ()){
			     die ("Conexión con la base de datos fallida : " . mysqli_connect_error());
			}	 
			else{
			      //echo "Conexión con la base de datos establecida.";
			}
		}
	}

	
	public function insertarConsulta($query){
		$result = mysqli_query($this->conn, $query) or die($this->conn->error);
        if($result == null){
            return false;    
        }
		return true; 
	}

	public function ejecutarConsulta($query){
		$result = mysqli_query($this->conn, $query) or die($this->conn->error);
        if(!$result){
			
            return null;    
		}
		
        $array = mysqli_fetch_assoc($result);
		return $array; 
	}
    
	public function devolverConsulta($query){
		$result = mysqli_query($this->conn, $query) or die($this->conn->error);
        if(!$result){
            return null;    
        }
		return $result; 
	}
    
    public function disconnect(){
        $this->conn->close();
    }
}

?>
