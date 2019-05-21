<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class graficas extends CI_Model {
	
	private static $db;
	function __construct(){
		parent::__construct();	
		self::$db = &get_instance()->db;	
	}


	public function query_GraficaSumTotalTimbradasPorDia($idPropietario) {
        $result = $this->db->query('SELECT DATE_FORMAT(dfechadia, "%m/%d") fecha, IFNULL(SUM(IF(((((`v`.`rfinal` - `v`.`rinicial`) - 0.0) - `v`.`rtimdescuento`) < 0),0,(((`v`.`rfinal` - `v`.`rinicial`) - 0.0) - `v`.`rtimdescuento`))),0) tim FROM lm_mov_viajes v
				JOIN `lm_mae_vehiculo` ve ON v.`didvehiculo`=ve.id
				WHERE ve.`idPropietario`=? AND dfechadia > DATE_SUB(CURDATE(), INTERVAL 15 DAY)
				GROUP BY dfechadia', array($idPropietario));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_GraficaSumBrutoPorDiaAndVehiculo($idVehiculo) {
        $result = $this->db->query('SELECT DATE_FORMAT(dfechadia, "%m/%d") fecha, IFNULL(SUM((IF(((((`v`.`rfinal` - `v`.`rinicial`) - 0.0) - `v`.`rtimdescuento`) < 0),0,(((`v`.`rfinal` - `v`.`rinicial`) - 0.0) - `v`.`rtimdescuento`)))*rpasaje),0) bruto FROM lm_mov_viajes v
						JOIN `lm_mae_vehiculo` ve ON v.`didvehiculo`=ve.id
						WHERE ve.id=? AND dfechadia > DATE_SUB(CURDATE(), INTERVAL 15 DAY)
						GROUP BY dfechadia', array($idVehiculo));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_GraficaSumCombustiblePorDiaAndVehiculo($idVehiculo) {
        $result = $this->db->query('SELECT DATE_FORMAT(des.fecha, "%m/%d") fecha, IFNULL(SUM(valor),0) valor FROM `lm_mov_descdiario` des
						JOIN `lm_mae_vehiculo` ve ON des.`idVehiculo`=ve.`id`
						WHERE ve.id=? AND des.`idConcepto` IN (344,381)  AND des.`fecha` > DATE_SUB(CURDATE(), INTERVAL 15 DAY)
						GROUP BY des.fecha', array($idVehiculo));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_GraficaPromVehiculo($idVehiculo) {
        $result = $this->db->query('SELECT DATE_FORMAT(dfechadia, "%m/%d") fecha, IFNULL(ROUND(IFNULL(SUM(IF(((((`v`.`rfinal` - `v`.`rinicial`) - 0.0) - `v`.`rtimdescuento`) < 0),0,(((`v`.`rfinal` - `v`.`rinicial`) - 0.0) - `v`.`rtimdescuento`))),0)/IFNULL(COUNT(*),0)),0) prom FROM `lm_mov_viajes` v
			JOIN `lm_mae_vehiculo` ve ON v.`didvehiculo`=ve.`id`
			WHERE ve.`id`=? AND destado=1 AND dfechadia > DATE_SUB(CURDATE(), INTERVAL 15 DAY)
			GROUP BY dfechadia', array($idVehiculo));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_GraficaPromRuta($idVehiculo) {
        $result = $this->db->query('SELECT DATE_FORMAT(dfechadia, "%m/%d") fecha, IFNULL(ROUND(IFNULL(SUM(IF(((((`v`.`rfinal` - `v`.`rinicial`) - 0.0) - `v`.`rtimdescuento`) < 0),0,(((`v`.`rfinal` - `v`.`rinicial`) - 0.0) - `v`.`rtimdescuento`))),0)/IFNULL(COUNT(*),0)),0) prom FROM `lm_mov_viajes` v
			WHERE v.`didrutap`=(SELECT idRuta FROM `lm_mae_vehiculo` WHERE id=?) AND destado=1 AND dfechadia > DATE_SUB(CURDATE(), INTERVAL 15 DAY)
			GROUP BY dfechadia', array($idVehiculo));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_GraficaTipoRecaudo($idVehiculo) {
        $result = $this->db->query('SELECT DATE_FORMAT(dfechadia, "%m/%d") fecha, IF(automatico=1, "AUTOMATICO", "MANUAL") tipo, COUNT(*) valor FROM `lm_mov_viajes` v
                WHERE v.`didvehiculo`=? AND destado=1 AND dfechadia > DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND `rfecharecaudo` IS NOT NULL
                GROUP BY dfechadia, automatico', array($idVehiculo));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }
	



}
