<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class general extends CI_Model {
	
	private static $db;
	function __construct(){
		parent::__construct();	
		self::$db = &get_instance()->db;	
	}

    public function query_Vehiculos($idPropietario) {
        $result = $this->db->query('SELECT * FROM `lm_mae_vehiculo`');
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_ListPosiciones($idPropietario){
		$result=$this->db->query('call pa_gis_get_UltimasPosiciones()');
		$a= $result->result_array();
		$result->free_result();				
		return	$a;	
	}

	public function query_ListPuntos($fecha, $vehiculo){
        $result=$this->db->query('call paGetHistoricoPuntoFecha (?,?)', array($fecha, $vehiculo));
		$a= $result->result_array();
		$result->free_result();
		return	$a;	
	}	

	public function query_ListAlarmas($fecha, $vehiculo){                    
		$result=$this->db->query('SELECT * FROM vst_historico_alarmasreg_todas c WHERE c.`fecha` = ? AND c.`Codigo`= ? ',array($fecha, $vehiculo));
		$a= $result->result_array();
		$result->free_result();				
		return	$a;
	}

}
