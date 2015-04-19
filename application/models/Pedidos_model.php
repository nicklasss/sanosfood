<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function pedidosUsuario($id =null){
    	$this->db->where('id_usuario', $id);
    	$this->db->order_by('fecha', 'desc');
    	$query = $this->db->get('pedidos', 50, 0);
    	return $query->result();
    }
}

/* End of file pedidos_model.php */
/* Location: ./application/models/pedidos_model.php */