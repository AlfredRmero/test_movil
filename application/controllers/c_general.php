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
		$this->load->view('General/dashboard');				
	}

	public function vstGraficas(){
		$data['vehiculos'] = $this->general->query_Vehiculos($this->session->userdata('idPropietario'));
		$this->load->view('General/graficas', $data);				
	}


	// QUERYS

	public function jsnVehiculos(){    	
		$data= $this->general->query_Vehiculos($this->session->userdata('idPropietario'));
		echo json_encode($data);
	}
	
	
	

}