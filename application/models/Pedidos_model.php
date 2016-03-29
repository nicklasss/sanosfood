<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

	function __construct() { parent::__construct(); }
    
    function pedidosUsuario($id = null){
    	$this->db->where('idusuario', $id);
    	$this->db->order_by('fecha', 'desc');
    	$query = $this->db->get('pedidos', 50, 0);
        foreach ($query->result() as $row) {
            $this->db->select('nombre');
            $this->db->where('id', $row->idestadopedido);
            $row->nombreestado = $this->db->get('estadospedidos', 1, 0)->row()->nombre;
        }
    	return $query->result();
    }

    function web_itemsxPedido($idpedido = null){
        $this->db->where('id_pedido', $idpedido);
//        $this->db->order_by('fecha', 'desc');
        $query = $this->db->get('lineaspedidos');
        foreach ($query->result() as $row) {
            $this->db->select('nombre');
            $this->db->where('id', $row->id_producto);
            $row->nombreproducto = $this->db->get('productos', 1, 0)->row()->nombre;

            $this->db->select('imagen');
            $this->db->where('idproducto', $row->id_producto);
            $row->imagenproducto = $this->db->get('imagenes', 1, 0)->row()->imagen;

        }
        $data['items'] = $query->result();
        $data['res'] = "ok";
        return $data;
    }

    function getPedido($id = null){
        $this->db->where('id', $id);
        $query = $this->db->get('pedidos', 1, 0);
        if($query->num_rows()==0){
            show_404();
        }
        $pedido = $query->row();
        $this->db->select('nombres,apellidos,usuario,correo,telefono,celular');
        $this->db->where('id', $pedido->idusuario);
        $usuario = $this->db->get('usuarios', 1, 0)->row();
        $pedido->nombres = $usuario->nombres;
        $pedido->apellidos = $usuario->apellidos;
        $pedido->usuario = $usuario->usuario;
        $pedido->correo = $usuario->correo;
        $pedido->telefono = $usuario->telefono;
        $pedido->celular = $usuario->celular;
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
        $this->db->where('id', $estado);
        if($this->db->count_all_results('estadospedidos')==0 AND $estado != 'Todos'){
            show_404();
        }
        if($estado != 'Todos'){
            $this->db->where('idestadopedido', $estado);
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('pedidos', 10, (($pag-1)*10));
        $resultado = array();
        foreach ($query->result() as $row) {
            $this->db->where('id', $row->idusuario);
            $usuario = $this->db->get('usuarios', 1, 0)->row();
            $row->usuario = $usuario->usuario;
            $row->ciudad = $usuario->ciudad;
            $resultado[] = $row;
        }
        return $resultado;
    }

    function contarPedidos($estado = null){
        if($estado !='Todos'){
            $this->db->where('idestadopedido', $estado);
        }
        return $this->db->count_all_results('pedidos');
    }
    
    function cambiarEstado($id = null,$estado = null,$observacion =""){
        $this->db->where('id', $id);
        $query = $this->db->get('pedidos', 1, 0);
        if($query->num_rows()!=1){ return false; }
        
        $pedido = $query->row();
        $object = array('idPedido' => $id, 'idUsuario' =>$pedido->idusuario,'fecha' =>  date('Y-m-d H:i:s'),'accion'=>'cambiar estado de '.$pedido->idestadopedido.' a '.$estado,'observacion'=>$observacion);
        $this->db->insert('log_pedidos', $object);
        $object = array('idestadopedido' => $estado );
        $this->db->where('id', $id);
        $this->db->update('pedidos', $object);
        return true;
    }
}

/* End of file pedidos_model.php */
/* Location: ./application/models/pedidos_model.php */