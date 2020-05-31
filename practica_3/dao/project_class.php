<?php

/* Transfer Object */
class TOUproject {

	private $id;
	private $user;
	private $titulo;
	private $contenido;
	private $lenguaje;
  	private $candado;

	private $privado;


  function __construct($id='',$user='',$titulo='',$contenido='',$lenguaje='',$privado='',$candado='')
  {
    $this->id = $id;
    $this->user = $user;
    $this->titulo = $titulo;
    $this->contenido = $contenido;
    $this->lenguaje = $lenguaje;
    $this->privado = $privado;
    $this->candado = $candado;

  }
   
  public function create_Project($columna){
        
	$this->user = $columna['user'];;
	$this->titulo = $columna['titulo'];;
	$this->contenido = $columna['contenido'];
	$this->lenguaje = $columna['lenguaje'];
    $this->candado = $columna['candado'];
    $this->privado = $columna['privado'];
  }
  
  public function set_user($user){
	$this->user = $user;
  }

  public function set_privado($p){
  	$this->privado = $p;	
  }

   public function set_titulo($titulo){
		$this->titulo = $titulo;
   }

   public function set_contenido($contenido){
		$this->contenido = $contenido;
	}

public function set_lenguaje($lenguaje){
		$this->lenguaje = $lenguaje;
	}
  
  public function set_candado($candado){
		$this->candado = $candado;
	}
  
  
  public function get_project(){
	$columna = [
        "id" => $this->id,
		"user" => $this->user,
		"titulo" => $this->titulo,
		"contenido" => $this->contenido,
		"lenguaje" => $this->lenguaje,
        "candado" => $this->candado,
        "privado" => $this->privado
		];

		return $columna;
	}
  
  public function get_id(){
		return $this->id;
	}
    
	public function get_user(){
		return $this->user;
	}

	public function get_titulo(){
		return $this->titulo;
	}

	public function get_privado(){
		return $this->privado;
	}

	public function get_contenido(){
		return $this->contenido;
	}

	public function get_lenguaje(){
		return $this->lenguaje;
	}
  
  public function get_candado(){
		return $this->candado;
	}
 }
