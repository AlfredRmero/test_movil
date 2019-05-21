<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_graficas extends CI_Controller {
	//CONSTRUCTOR
	function __construct(){
		parent::__construct();	
		$this->load->model('graficas');		
		$this->load->helper(array( 'url','form'));             	
		$this->load->library(array('form_validation', 'session', 'encrypt'));
		if( $this->session->userdata('idPropietario')==null){ 
 			 exit('No tiene permisos para ver esta informacion.'); 			
 		} 
	}


	// QUERYS

	public function jsnSumTotalTimbradasPorDia(){    	
		$data= $this->graficas->query_GraficaSumTotalTimbradasPorDia($this->session->userdata('idPropietario'));
		echo json_encode($data);
	}

	public function jsnSumBrutoPorDiaAndVehiculo(){    	
		$data= $this->graficas->query_GraficaSumBrutoPorDiaAndVehiculo($_POST['idVehiculo']);
		echo json_encode($data);
	}

	public function jsnSumCombustiblePorDiaAndVehiculo(){    	
		$data= $this->graficas->query_GraficaSumCombustiblePorDiaAndVehiculo($_POST['idVehiculo']);
		echo json_encode($data);
	}

	public function jsnPromVehiculo(){    	
		$data= $this->graficas->query_GraficaPromVehiculo($_POST['idVehiculo']);
		echo json_encode($data);
	}

	public function jsnPromRuta(){    	
		$data= $this->graficas->query_GraficaPromRuta($_POST['idVehiculo']);
		echo json_encode($data);
	}

	public function jsnTipoRecaudo(){    	
		$data= $this->graficas->query_GraficaTipoRecaudo($_POST['idVehiculo']);
		echo json_encode($data);
	}
	
	
	

}