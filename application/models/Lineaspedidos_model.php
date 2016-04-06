<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lineaspedidos_model extends CI_Model {

	function __construct() { parent::__construct(); }



//---------------------------------------------------------funcion crear
    function crear($idpedido = null, $idproducto = null, $unidades = null, $precio = null) {
        $objecto = array('id_pedido' => $idpedido,
        				'id_producto' => $idproducto, 
        				'unidades' => $unidades,
        				'precio' => $precio);

        $this->db->insert('lineaspedidos', $objecto);

        $data['res'] = 'ok';
        $data['id'] = $this->db->insert_id();
        return $data;
    }

//---------------------------------------------------------funcion eliminar
    function eliminar($idpedido = null){
        if($idpedido == null){
            return array('res'=>'bad','msj'=>'Error en la inserción.'); }
        $this->db->where('id_pedido', $idpedido);
        $this->db->delete('lineaspedidos');
        return array('res'=>'ok');
    }

//---------------------------------------------------------funcion buscar_lineaspedido
    function buscar_lineaspedido($idpedido = null){
        $this->db->where('id_pedido', $idpedido);
        $query = $this->db->get('lineaspedidos');
        if($query->num_rows() < 1){
	        $data['lineas'] = "";
   			$data['msj'] = 'el pedido no tiene lineas de productos';
        	$data['res'] = "bad";
        	return $data;
        }

        foreach ($query->result() as $row) {
            $this->db->select('nombre');
            $this->db->where('id', $row->id_producto);
            $row->nombreproducto = $this->db->get('productos', 1, 0)->row()->nombre;
            $this->db->select('imagen');
            $this->db->where('idproducto', $row->id_producto);
            $row->imagenproducto = $this->db->get('imagenes', 1, 0)->row()->imagen;
        }

        $data['lineas'] = $query->result();
        $data['res'] = "ok";
		$data['msj'] = '';
        return $data;
    }

//---------------------------------------------------------funcion conseguirLineas
    function conseguirLineas($idpedido = null){
        $this->db->where('id_pedido', $idpedido);
        $query = $this->db->get('lineaspedidos');
        if($query->num_rows() < 1){
            $data['lineas'] = "";
            $data['msj'] = 'el pedido no tiene lineas de productos';
            $data['res'] = "bad";
            return $data;
        }

        foreach ($query->result() as $fila) {
            $this->db->select('nombre', 'descripcioncorta');
            $this->db->where('id', $fila->id_producto);
//            $query1 = $this->db->get('productos', 1, 0);
//            $file->nombreproducto =   $query1->row()->nombre;
//            $file->descripcioncorta =   $query1->row()->descripcioncorta;  

            $fila->nombreproducto = $this->db->get('productos', 1, 0)->row()->nombre;
            $fila->descripcioncorta = $this->db->get('productos', 1, 0)->row()->descripcioncorta;

            $this->db->select('imagen');
            $this->db->where('idproducto', $fila->id_producto);
            $fila->imagenproducto = $this->db->get('imagenes', 1, 0)->row()->imagen;
        }

        $data['lineas'] = $query->result();
        $data['res'] = "ok";
        $data['msj'] = '';
        return $data;
    }


}

/* End of file Caracteristicas_model.php */
/* Location: ./application/models/Caracteristicas_model.php */