<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class general extends CI_Model {
	
	private static $db;
	function __construct(){
		parent::__construct();	
		self::$db = &get_instance()->db;	
	}


	public function query_Vehiculos($idPropietario) {
        $result = $this->db->query('SELECT * FROM `lm_mae_vehiculo` WHERE idPropietario=?', array($idPropietario));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }
	
}
