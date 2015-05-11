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

    function getPedido($id = null){
        $this->db->where('id', $id);
        $query = $this->db->get('pedidos', 1, 0);
        if($query->num_rows()==0){
            show_404();
        }
        $pedido = $query->row();
        $this->db->select('nombres,apellidos');
        $this->db->where('id', $pedido->id_usuario);
        $usuario = $this->db->get('usuarios', 1, 0)->row();
        $pedido->nombres = $usuario->nombres;
        $pedido->apellidos = $usuario->apellidos;
        $this->db->where('id_pedido', $pedido->id);
        $lineas = $this->db->get('lineaspedidos');
        $lineasarr = array();
        foreach ($lineas->result() as $linea) {
            $this->db->select('nombre');
            $this->db->where('id', $linea->id_producto);
            $producto = $this->db->get('productos', 1, 0)->row();
            $linea->nombre = $producto->nombre;
            $lineasarr[] = $linea;
        }
        $pedido->lineas = $lineasarr;
        return $pedido;
    }

    function getPedidosPorEstado($estado = null, $pag = 1){
        $this->db->where('nombre', $estado);
        if($this->db->count_all_results('estadospedidos')==0 AND $estado != 'todos'){
            show_404();
        }
        if($estado != 'todos'){
            $this->db->where('estado', $estado);
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('pedidos', 10, (($pag-1)*10));
        $resultado = array();
        foreach ($query->result() as $row) {
            $this->db->where('id', $row->id_usuario);
            $usuario = $this->db->get('usuarios', 1, 0)->row();
            $row->correo = $usuario->correo;
            $row->ciudad = $usuario->ciudad;
            $resultado[] = $row;
        }
        return $resultado;
    }

    function contarPedidos($estado = null){
        $this->db->where('estado', $estado);
        return $this->db->count_all_results('pedidos');
    }
}

/* End of file pedidos_model.php */
/* Location: ./application/models/pedidos_model.php */