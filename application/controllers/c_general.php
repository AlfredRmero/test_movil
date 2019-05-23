<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_general extends CI_Controller {
	//CONSTRUCTOR
	function __construct(){
		parent::__construct();	
		$this->load->model('general');		
		$this->load->helper(array( 'url','form'));             	
		$this->load->library(array('form_validation', 'session', 'encrypt'));
		if( $this->session->userdata('idPropietario')==null){ 
 			 exit('No tiene permisos para ver esta informacion.'); 			
 		} 
	}

	public function vstDashboard(){
		$this->load->view('app/dashboard');				
	}

	public function vstMapa(){
		$this->load->view('app/mapa');				
	}

	public function vstPuntosVirtuales(){
		$data['vehiculos'] = $this->general->query_Vehiculos();
		$this->load->view('app/puntosVirtuales', $data);				
	}

	public function vstAlarmas(){
		$data['vehiculos'] = $this->general->query_Vehiculos();
		$this->load->view('app/alertas', $data);				
	}


	// QUERYS

	public function jsnVehiculos(){    	
		$data= $this->general->query_Vehiculos();
		echo json_encode($data);
	}

	public function jsnlistPosiciones() {
        $data = $this->general->query_ListPosiciones();
        echo json_encode((array) $data);
    }

    public function jsnlistPuntos() {
        $data = $this->general->query_ListPuntos($_POST["fecha"], $_POST["vehiculo"]);
        echo json_encode((array) $data);
    }

    public function jsnlistAlarmas() {
        $data = $this->general->query_ListAlarmas($_POST["fecha"], $_POST["vehiculo"]);
        echo json_encode((array) $data);
    }

	public function jsnCountAlarmasCriticas(){    	
		$data= $this->general->query_CountAlarmasCriticas();	
		echo json_encode($data);
	}

	public function jsnCountAlarmasNOCriticas(){    	
		$data= $this->general->query_CountAlarmasNOCriticas();	
		echo json_encode($data);
	}

	public function jsnGraficaTopVehiculos(){    	
		$data= $this->general->query_graficaTopVehiculos();	
		echo json_encode($data);
	}

}