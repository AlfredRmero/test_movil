<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_consultas extends CI_Controller {
	//CONSTRUCTOR
	function __construct(){
		parent::__construct();	
		$this->load->model('consultas');	
		$this->load->model('general');		
		$this->load->helper(array( 'url','form'));             	
		$this->load->library(array('form_validation', 'session', 'encrypt'));
		if( $this->session->userdata('idPropietario')==null){ 
 			 exit('No tiene permisos para ver esta informacion.'); 			
 		} 
	}

	public function vstVencimientoVehiculo(){
		$this->load->view('Consultas/vencimiento_vehiculo');				
	}

	public function vstViajesPerdidos(){
		$this->load->view('Consultas/viajes_perdidos');				
	}

	public function vstDescuentosTimbradas(){
		$this->load->view('Consultas/descuentos_timbradas');				
	}

	public function vstRecaudoDiario(){
		$this->load->view('Consultas/recaudo_diario');				
	}

	public function vstIngresos(){
		$data['vehiculos'] = $this->general->query_Vehiculos($this->session->userdata('idPropietario'));
		$this->load->view('Consultas/ingresos', $data);				
	}



	// QUERYS

	public function jsnVencimientosVehiculo(){    	
		$data= $this->consultas->query_getVencimientosVehiculos($this->session->userdata('idPropietario'));	
		echo json_encode($data);
	}

	public function jsnViajesPerdidosbyFecha(){    	
		$data= $this->consultas->query_getViajesPerdidosbyfecha($_POST["fecha"], $this->session->userdata('idPropietario'));	
		echo json_encode($data);
	}

	public function jsnDescuentosTimbradasbyFecha(){    	
		$data= $this->consultas->query_getDescuentosTimbradasbyfecha($_POST["fecha"], $this->session->userdata('idPropietario'));	
		echo json_encode($data);
	}	

	public function jsnRecaudoDiariobyFecha(){    	
		$data= $this->consultas->query_getRecaudoDiariobyfecha($_POST["fecha"], $this->session->userdata('idPropietario'));	
		echo json_encode($data);
	}	

	public function jsnIngresosbyFechasAndVehiculo(){    	
		$data= $this->consultas->query_getIngresosbyfechasAndVehiculo($_POST["fecha1"], $_POST["fecha2"], $_POST["idVehiculo"], $this->session->userdata('idPropietario'));	
		echo json_encode($data);
	}	

	public function jsnCountVencimientosVehiculo(){    	
		$data= $this->consultas->query_getCountVencimientosVehiculos($this->session->userdata('idPropietario'));	
		echo json_encode($data);
	}

	public function jsnCountViajesPerdidos(){    	
		$data= $this->consultas->query_getCountViajesPerdidos($this->session->userdata('idPropietario'));	
		echo json_encode($data);
	}

	public function jsnCountDescuentosTimbradas(){    	
		$data= $this->consultas->query_getCountDescuentosTimbradas($this->session->userdata('idPropietario'));	
		echo json_encode($data);
	}	

	public function jsnCountRecaudoDiario(){    	
		$data= $this->consultas->query_getCountRecaudoDiario($this->session->userdata('idPropietario'));	
		echo json_encode($data);
	}	

}