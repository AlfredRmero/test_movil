<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app extends CI_Model {
	private static $db;
	function __construct(){
		parent::__construct();	
		self::$db = &get_instance()->db;	
	}

	function getLogin($cedula,$pass){	
		$this->db->trans_start();
		$this->db->select('*');
		$this->db->from('vst_portal_propietarios');
		$this->db->where("cedula", $cedula);
		$this->db->where("acceso", $pass);
		$data = $this->db->get();
		$a= $data->result_array();
		if (count($a)>=1){
			$datos=$a[0];			
			$this->db->query('INSERT INTO lm_portal_acceso (idPropietario,fechahora,ipacceso) VALUES (?,now(),?)',array($datos['idPropietario'],$_SERVER['REMOTE_ADDR']));
		}
		$data->free_result();	
		$this->db->trans_complete();
		return	$a;			
	}

	/*
	function cambiarPass($id,$Pass){  
		$id=$this->db->query('SELECT idPersonal FROM `lm_mae_usuario` WHERE id=?', array($id));  
		$id=$id->result_array();   
		$this->db->query('update lm_mae_personal set acceso= ? where id=?', array($Pass,$id[0]['idPersonal']));
		return true;		
	}	
	*/
}
