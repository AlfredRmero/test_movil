<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_app extends CI_Controller {
	//CONSTRUCTOR
	function __construct(){
		parent::__construct();	
		$this->load->model('app');			
		$this->load->library(array('form_validation', 'session', 'encrypt'));
	}

	//FUNCION INICIAL
	public function index()	{
		if(!$this->session->userdata('idPropietario')){
			$this->load->view('login');				
		}else{			
			$data["propietario"] = array('nombreCorto'=> $this->session->userdata('nombreCorto'));	
			$this->load->view('app', $data);				
		}			
	}

	//FUNCION DE LOGUEO 
	public function login(){		
		$data=$this->app->getLogin($_REQUEST["cedula"],$_REQUEST["pass"]);
		$existe=null;
		$row=null;
		foreach ($data as $row) {			
			$datasession = array( 'idPropietario'  => $row["idPropietario"],
								  'nombreCorto' => $row["nombreCorto"],								  
								  'nombreCompleto' => $row["nombreCompleto"],						
								  'cedula'=>  $row["cedula"],
          						  'loginOk' => TRUE);
			$this->session->set_userdata($datasession);
			$existe=true;			
		}	

		if ($existe) {			        
			echo json_encode(array("resultado"=>true));
		}else{
			echo json_encode(array("resultado"=>false, "message"=>"Verifique los datos ingresados"));
		}	
	}

	
	//FUNCION PARA EL FIN DE LA SESION
	public function logout(){
		$datasession = array( 'idPropietario'  => null,			 
							  'nombreCorto' => null,	
          					  'nombreCompleto' => null,   
							  'cedula'=> null ,	
							  'loginOk'=> null,
          					);
		$this->session->unset_userdata($datasession);
		echo json_encode(array("resultado"=>true));			
	}	


	/*
    public function fechaActual(){  
        date_default_timezone_set('America/Bogota');     	
		$time6 = date('H:i:s', time());
		$arrayJSON[] = array('hora'=> $time6);
		echo json_encode($arrayJSON);       
    }  

    public function cambiarPass() {       
        if ($this->app->cambiarPass($this->session->userdata('idusuario'), $_POST["Pass"])) {
            echo json_encode(array("resultado" => true));
        }
    }
	*/


}