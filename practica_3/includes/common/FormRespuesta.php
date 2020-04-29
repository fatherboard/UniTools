<?php

include_once('Form.php');
require_once('dao/dao_user.php');
require_once('dao/dao_respuesta.php');

class FormRespuesta extends Form {

	private $post=null;
	
	public function __construct(){
		parent::__construct('respuesta');
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
		
		
		$dao_usuario = new DAOUsuario();
        $dao_respuesta = new DAOrespuesta();
	    $_SESSION['error_respuesta'] = [];
		$contenido = htmlspecialchars(trim(strip_tags($_REQUEST["contenido"])));
		$user = new TOUser();
		$id_post = $_GET["post"];
		$user = $dao_usuario->search_username($_SESSION['username']);
        $userid = $user->get_id();
        

	    if (empty($contenido) ) {
	        $_SESSION['error_respuesta'][] = "No se puede enviar un comentario vacío.";
	    }
		

	    if (count($_SESSION['error_respuesta']) == 0)  {

	        if ($user == null) {
	            $_SESSION['error_respuesta'][] = "Se ha producido un error";
	            return "respuesta.php?post=" . $id_post;
	        }
	        else {
				$respuesta = new TORespuesta('', $id_post, $userid, '', $contenido);
				echo $respuesta->get_post(); //para testeo
                $result = $dao_respuesta->insert_respuesta($respuesta);

                if (!$result) {
                    $_SESSION['error_respuesta'][] = "No se ha podido realizar la respuesta";
                    return "respuesta.php?post=" . $id_post;
                }
	        } 
	    }

	    else {
			return "respuesta.php?post=" . $id_post;
	    }
       
	}
}

?>