<?php

abstract class Form {

	private $formId;
	private $name;
	private $action;

	public function __construct($name){
		if ( !$this->action ) {
            $this->action = htmlentities($_SERVER['REQUEST_URI']);
        }
        $this->name = $name;
	}

	public function gestiona(){
		if ( ! $this->formularioEnviado($_POST) ) {
            echo $this->generaFormulario();
        } else {
            $result = $this->procesaFormulario($_POST);                       
            if ( is_array($result) ) {
                echo $this->generaFormulario($result, $_POST);
            } else {
                header('Location: '.$result);
                exit();
            }
        }  
	}

    private function formularioEnviado(&$params){
        return isset($params['action']) && $params['action'] == $this->formId;
    }     
    
	protected function procesaFormulario($datos){
        return array();
    }
  
	protected function generaCampos(){
        return '';
    }

	private function generaFormulario($errores = array(), &$datos = array()){

		$html  = '<form name="'.$this->name.'" method="post" action = "'. $this->action .'"id="'.$this->formId.'">';
        $html .= '<input type="hidden" name="action" value="'.$this->formId.'" />';

		$html .= $this->generaCampos();
        $html .= '</form>';
		return $html;
	}
}

?>