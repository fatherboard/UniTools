<?php

include_once('includes/Form.php');
require_once('dao/user_class.php');
require_once('dao/dao_user.php');

class FormNewProject extends Form {

	public function __construct(){
		parent::__construct('newProject');
	}

	protected function generaCampos(){

        $html = '<div class= "t2 text-center">';
        $html .= '<h2> Creación de un nuevo proyecto</h2>';
        $html .= '</div>';
        $html .= '<div class="b2 text-center">';
        $html .=  '<div class="fb-row">';
        $html .= '<p>Título:</p> <textarea class="field tittle-row" name="titulo" rows="1"></textarea> ';                           
        $html .= '</div>';                            
        $html .= '<p>Contenido:</p> <textarea class="field" name="contenido" rows="2" ></textarea>';                            
        $html .= '<p>Lenguaje:</p> <textarea class="field" name="lenguaje" rows="2"></textarea>';                        
		$html .= '<p>Privado: <input value ="1" type="checkbox" name="privado"></span></p>';	                                
        $html .= '<p>Archivo: <input type="file" name="archivo" value="archivo"/></p>';                        
		$html .= '<p class="submit-center text-center"><input type="submit" value="Subir"class="field v-center"/></p>';                                
		$html .= '</div>';                                
        return $html;
	}

	protected function procesaFormulario($datos){

	    if(!isset($_SESSION)) { 
	        session_start(); 
	    } 

	    if(!isset($datos['privado'])){
        	$datos['privado'] = 0;
        }

        $titulo = $datos['titulo'];
        $contenido = $datos['contenido'];
        $lenguaje = $datos['lenguaje'];
        $privado = $datos['privado'];
        $candado = 0;
        $file = $datos['archivo'];

        $proj_data = new TOUproject();
        $dao_proj = new DAOproject();
        $dao_user = new DAOUsuario();
        $user_id = $dao_user->search_username($_SESSION['username'])->get_id();
        $new_proj = new TOUproject('',$user_id, $titulo, $contenido, $lenguaje, $privado,$candado,3,$file);
		

		if (!$dao_proj->insert_Project($new_proj)) {
            //echo "Error al insertar project";
            alert("Error al insertar project");
        }

        $dao_user->disconnect();
        return "proyectos.php";      
	}
}

?>
