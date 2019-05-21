<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class consultas extends CI_Model {
	
	private static $db;
	function __construct(){
		parent::__construct();	
		self::$db = &get_instance()->db;	
	}

	public function query_getVencimientosVehiculos($idPropietario) {
        $result = $this->db->query('SELECT * FROM vst_qry_vencimientos WHERE idPropietario=?', array($idPropietario));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_getViajesPerdidosbyfecha($fecha, $idPropietario) {
        $result = $this->db->query('SELECT * FROM vst_op_despachos_norealizados WHERE Fecha=? AND idPropietario=?', array($fecha, $idPropietario));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_getIngresosbyfechasAndVehiculo($fecha1, $fecha2, $idVehiculo,$idPropietario) {
        $result = $this->db->query('CALL pa_portal_ingresos(?, ?, ?, ?)', array($fecha1, $fecha2, $idVehiculo, $idPropietario));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_getDescuentosTimbradasbyfecha($fecha, $idPropietario) {
        $result = $this->db->query('SELECT v.`dfechadia` FechaViaje, d.fecha,d.`descuento`,IF(d.`Observacion`="","N/A",d.`Observacion`) Observacion,m.`nombre`,ve.`codigo` Codigo,ve.`placa` Placa,v.`dviaje` Viaje,u.`nombre` cajero, ve.idPropietario
            FROM   lm_mov_descuentoviaje d 
            INNER JOIN `lm_mae_motivosdescuento`  m ON m.`id`=d.`idMotivoDescuento` 
            JOIN  `lm_mov_viajes` v ON v.`id`= d.`idviaje` 
            JOIN `lm_mae_vehiculo` ve ON v.didvehiculo=ve.id
            JOIN  `vst_mae_usuarios` u ON u.`id`= d.`usuario` 
            WHERE DATE(d.`fecha`) = ? AND d.`descuento` > 0 AND ve.`idPropietario`=?', array($fecha, $idPropietario));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_getRecaudoDiariobyfecha($fecha, $idPropietario) {
        $result = $this->db->query('SELECT ve.codigo, dfechadia fechaViaje, `dhoradespacho` despacho, con.`nombre` conductor, dviaje viaje, `rfecharecaudo` fechaRecaudo,
                    IFNULL(((rfinal-rinicial)-rtimdescuento),0) timbradas  FROM lm_mov_viajes v
                    JOIN `lm_mae_vehiculo` ve ON v.`didvehiculo`=ve.id
                    JOIN `vst_mae_conductorestodos` con ON v.`didconductor`=con.id
                    WHERE ve.`idPropietario`=? AND DATE(`rfecharecaudo`)=?', array($idPropietario, $fecha));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_getCountVencimientosVehiculos($idPropietario) {
        $result = $this->db->query('SELECT IFNULL(COUNT(*),0) valor FROM vst_qry_vencimientos WHERE idPropietario=?', array($idPropietario));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_getCountViajesPerdidos($idPropietario) {
        $result = $this->db->query('SELECT IFNULL(COUNT(*),0) valor FROM vst_op_despachos_norealizados WHERE Fecha=DATE(NOW()) AND idPropietario=?', array($idPropietario));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_getCountDescuentosTimbradas($idPropietario) {
        $result = $this->db->query('SELECT IFNULL(SUM(d.`descuento`),0) valor
                                    FROM   lm_mov_descuentoviaje d 
                                    JOIN  `lm_mov_viajes` v ON v.`id`= d.`idviaje` 
                                    JOIN `lm_mae_vehiculo` ve ON v.didvehiculo=ve.id
                                    WHERE DATE(d.`fecha`) = DATE(NOW()) AND d.`descuento` > 0 AND ve.`idPropietario`=?', array($idPropietario));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }

    public function query_getCountRecaudoDiario($idPropietario) {
        $result = $this->db->query('SELECT COUNT(*) valor FROM lm_mov_viajes v
                                    JOIN `lm_mae_vehiculo` ve ON v.`didvehiculo`=ve.id
                                    WHERE ve.`idPropietario`=? AND DATE(`rfecharecaudo`)=DATE(NOW())', array($idPropietario));
        $a = $result->result_array();
        $result->free_result();
        return $a;
    }



}
