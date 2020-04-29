<?php

/* Transfer Object */
class TOUProject {

	private $id_Proyecto;
	private $user;
	private $title;
	private $content;
	private $lenguaje;
  private $candado;
  private $estrellas;
  
	function __construct($id_Proyecto ='',$user='',$title='',$content='',$lenguaje='',$candado='',$estrellas='')
  {
    $this->id_Proyecto = $id_Proyecto;
		$this->user = $user;
		$this->title = $title;
		$this->content = $content;
		$this->lenguaje = $lenguaje;
    $this->candado = $candado;
    $this->estrellas = $estrellas;
	}
   
  public function create_Project($columna){
        
		$this->user = $columna['user'];;
		$this->title = $columna['title'];;
		$this->content = $columna['content'];
		$this->lenguaje = $columna['lenguaje'];
    $this->candado = $columna['candado'];
    $this->estrellas = $columna['estrellas'];
	}
  
  public function set_user($user){
		$this->user = $user;
	}

	public function set_title($title){
		$this->title = $title;
	}

	public function set_content($content){
		$this->content = $content;
	}

	public function set_lenguaje($lenguaje){
		$this->lenguaje = $lenguaje;
	}
  
  public function set_candado($candado){
		$this->candado = $candado;
	}
  
  public function set_estrellas($estrellas){
		$this->estrellas = $estrellas;
	}
  
  public function get_project(){

		$columna = [
        "id_Proyecto" => $this->id_Proyecto,
		    "user" => $this->user,
		    "title" => $this->title,
		    "content" => $this->content,
		    "lenguaje" => $this->lenguaje,
        "candado" => $this->candado,
        "estrellas" => $this->estrellas
		];

		return $columna;
	}
  
  public function get_id(){
		return $this->id_Post;
	}
    
	public function get_user(){
		return $this->user;
	}

	public function get_title(){
		return $this->title;
	}

	public function get_content(){
		return $this->content;
	}

	public function get_lenguaje(){
		return $this->lenguaje;
	}
  
  public function get_candado(){
		return $this->candado;
	}
  
  public function get_estrellas){
		return $this->estrellas;
	}
  
 }
