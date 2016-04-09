<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

	function __construct() { parent::__construct(); }
    
//---------------------------------------------------------funcion crear
    function crear($idusuario = null, $fecha = null, $estado = null, $ultimadireccion = null, $direccion = null, $barrio = null, 
                   $ciudad = null, $region = null, $pais = null) {
        $objecto = array('idusuario' => $idusuario,
                        'fecha' => $fecha, 
                        'estado' => $estado,
                        'nom_direccion' => $ultimadireccion,
                        'direccion' => $direccion,
                        'barrio' => $barrio,
                        'ciudad' => $ciudad,
                        'region' => $region,
                        'pais' => $pais);

        $this->db->insert('pedidos', $objecto);
        $data['id'] = $this->db->insert_id();
        $data['res'] = 'ok';
        return $data;
    }

//---------------------------------------------------------funcion eliminar
    function eliminar($id = null){
        if($id == null){
            return array('res'=>'bad','msj'=>'Error en la inserción.'); }
        $this->db->where('id', $id);
        $this->db->delete('pedidos');
        return array('res'=>'ok');
    }

//---------------------------------------------------------funcion pedidosUsuario
    function pedidosUsuario($id = null){
    	$this->db->where('idusuario', $id);
    	$this->db->order_by('fecha', 'desc');
    	$query = $this->db->get('pedidos');
        foreach ($query->result() as $pedido) {
            $this->db->select('nombre');
//            $this->db->where('id', $pedido->idestadopedido);
//            $pedido->nombre = $this->db->get('estadospedidos', 1, 0)->row()->nombre;
        }

    	return $query->result();
    }

//---------------------------------------------------------funcion conseguirPedido
    function getPedido($id = null){
        $this->db->where('id', $id);
        $query = $this->db->get('pedidos', 1, 0);
        if($query->num_rows() == 0){
            show_404();
        }
        $pedido = $query->row();

        $this->db->select('nombre,usuario,correo,telefono,celular');
        $this->db->where('id', $pedido->idusuario);
        $usuario = $this->db->get('usuarios', 1, 0)->row();
        $pedido->nombre = $usuario->nombre;
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

//---------------------------------------------------------funcion pedidosPendientesBorrables
    function pedidosPendientesBorrables(){
        $estado = EST_PENDIENTE;
        $tiempolimite = strtotime(date('Y-m-d H:i:s'))-TIEMPO_PENDIENTE;

        $this->db->where('estado', EST_PENDIENTE);
        $query = $this->db->get('pedidos');
        $resultado = array();

        foreach ($query->result() as $pedido) {
            if (strtotime($pedido->fecha) < $tiempolimite) {
                $resultado[] = $pedido;
            }
        }
        return $resultado;
    }

//---------------------------------------------------------funcion getPedidosPorEstado
    function getPedidosPorEstado($estado = null, $pag = 1){
        $this->db->where('nombre', $estado);
        if($this->db->count_all_results('estadospedidos') == 0 AND $estado != 'Todos'){
            show_404();
        }
        if($estado != 'Todos'){
            $this->db->where('estado', $estado);
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('pedidos', 10, (($pag-1)*10));
        $resultado = array();
        foreach ($query->result() as $pedido) {
            $this->db->where('id', $pedido->idusuario);
            $usuario = $this->db->get('usuarios', 1, 0)->row();
            $pedido->usuario = $usuario->correo;
            $resultado[] = $pedido;
        }
        return $resultado;
    }

//---------------------------------------------------------funcion contarPedidos
    function contarPedidos($estado = null){
        if($estado !='Todos'){
            $this->db->where('estado', $estado);
//            $this->db->where('estado', $estado);
        }
        return $this->db->count_all_results('pedidos');
    }
    
//---------------------------------------------------------funcion cambiarEstado
    function cambiarEstado($id = null, $estado = null, $observacion = ""){
        $this->db->where('id', $id);
        $query = $this->db->get('pedidos', 1, 0);
        if($query->num_rows() != 1){ return false; }
        
        $pedido = $query->row();
        $objecto = array('id_pedido'     => $id, 
                         'id_usuario'    =>$pedido->idusuario,
                         'fecha'        =>  date('Y-m-d H:i:s'),
                         'estado'       => $estado,
                         'observacion'  =>'(ADMIN) '.$observacion);
        $this->db->insert('log_pedidos', $objecto);

        $objecto = array('estado' => $estado );
        $this->db->where('id', $id);
        $this->db->update('pedidos', $objecto);
        return true;
    }
}

/* End of file pedidos_model.php */
/* Location: ./application/models/pedidos_model.php */