<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class general extends CI_Model {
	
	private static $db;
	function __construct(){
		parent::__construct();	
		self::$db = &get_instance()->db;	
	}

    public function query_Vehiculos() {
        $result = $this->db->query('SELECT * FROM `lm_mae_vehiculo`');
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_ListPosiciones(){
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

	public function query_CountAlarmasCriticas(){                    
		$result=$this->db->query('SELECT COUNT(*) valor FROM vst_historico_alarmasreg_todas c WHERE c.`fecha` = DATE(NOW()) AND tipo=1');
		$a= $result->result_array();
		$result->free_result();				
		return	$a;
	}

	public function query_CountAlarmasNOCriticas(){                    
		$result=$this->db->query('SELECT COUNT(*) valor FROM vst_historico_alarmasreg_todas c WHERE c.`fecha` = DATE(NOW()) AND tipo=0');
		$a= $result->result_array();
		$result->free_result();				
		return	$a;
	}

	public function query_graficaTopVehiculos(){                    
		$result=$this->db->query('SELECT DATE_FORMAT(fecha, "%d/%m") fecha, Codigo, valor FROM (
								SELECT fecha, Codigo, COUNT(*) valor FROM vst_historico_alarmasreg_todas c
								WHERE fecha > DATE_SUB(CURDATE(), INTERVAL 15 DAY)
								GROUP BY fecha, codigo
								ORDER BY valor DESC
								) q
								GROUP BY fecha
								ORDER BY fecha ASC, valor DESC');
		$a= $result->result_array();
		$result->free_result();				
		return	$a;
	}



}
