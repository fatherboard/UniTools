<?php

include_once('Form.php');
require_once('dao/dao_user.php');
require_once('dao/dao_respuesta.php');

class FormRespuesta extends Form {

	private $post=null;
	
	public function __construct($id){
		parent::__construct('respuesta');
		$this->post = $id;
	}

	protected function generaCampos(){
		$html = '<fieldset>';
		$html .= '<div><label>Respuesta:</label> <input class="control" type="text" name="contenido"/></div>';
		$html .= '<button type="submit" name="enviar">Enviar</button>';
		$html .= '</fieldset>';
		return $html;
	}

	protected function procesaFormulario($datos){

	    if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    } 
	    
	    $_SESSION['error_respuesta'] = [];
		$contenido = htmlspecialchars(trim(strip_tags($_REQUEST["contenido"])));
        $user = new TOUser();
        
        $dao_usuario = new DAOUsuario();
        $dao_respuesta = new DAOrespuesta();

	    if (empty($contenido) ) {
	        $_SESSION['error_respuesta'][] = "No se puede enviar un comentario vacío.";
	    }
	    $user = $dao_usuario->search_username($_SESSION['username']);

	    if (count($_SESSION['error_respuesta']) == 0)  {

	        if ($user == null) {
	            $_SESSION['error_respuesta'][] = "Se ha producido un error";
	            return "respuesta.php?post=" . $this->post;
	        }
	        else {
                $id_post = $this->post;
                $username = $user->get_username();
                $respuesta = new TORespuesta('', $id_post, $username, null, $contenido);
                $result = $dao_respuesta->insert_respuesta($respuesta);

                if (!$result) {
                    $_SESSION['error_respuesta'][] = "No se ha podido realizar la respuesta";
                    return "respuesta.php?post=" . $this->post;
                }
	        } 
	    }

	    else {
			return "respuesta.php?post=" . $this->post;
	    }
       
	}
}

?>