<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Log_pedidos_model extends CI_Model {

	function __construct() { parent::__construct(); }
    
//---------------------------------------------------------crear
    function crear($idpedido = null, $idusuario = null, $fecha = null, $estado = null, $observacion = null) {
        $objecto = array('id_pedido' => $idpedido,
        				'id_usuario' => $idusuario,
                        'fecha' => $fecha, 
                        'estado' => $estado,
                        'observacion' => $observacion);

        $this->db->insert('log_pedidos', $objecto);
        $data['id'] = $this->db->insert_id();
        $data['res'] = 'ok';
        return $data;
    }
}

// End of file Log_pedidos_model.php 
// Location: ./application/models/Log_pedidos_model.php