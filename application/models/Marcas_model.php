<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marcas_model extends CI_Model {

	function __construct() { parent::__construct(); }

//---------------------------------------------------------funcion listar
    function listar(){
    	$query = $this->db->get('marcas');
    	return $query->result();
    }

//---------------------------------------------------------funcion listarConProductos
    function listarConProductos() {
        $query = $this->db->query(" SELECT p.idmarca, m.nombre, count(p.idmarca) 
                                    FROM productos AS p, marcas AS m   
                                    WHERE p.estado = 'PRODUCTO_DISPONIBLE' and p.idmarca = m.id
                                    GROUP BY m.id;");
        return $query->result();
    }   
  
//---------------------------------------------------------funcion editar
    function editar($id = NULL, $atributo = NULL, $valor = NULL){
        if($id != NULL AND $atributo != NULL AND $valor != NULL){
            if($atributo =="nombre"){
                $this->db->where('nombre', $valor);
                if($this->db->count_all_results('marcas')>0){
                    return array('res'=>'bad','msj'=>'ERROR en edición. Ya existe una Marca con ese nombre.'); }
            }
            $this->db->trans_start();
            $object = array($atributo => $valor);
            $this->db->where('id', $id);
            $this->db->update('marcas', $object);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                return array('res'=>'bad','msj'=>'ERROR en edición.'); }
            else {return array('res'=>'ok'); }
        }
    }
    
//---------------------------------------------------------funcion crear
    function crear($nombre = null, $descripcion = null){
        if($nombre == NULL OR $descripcion == null){
            return array('res'=>'bad','msj'=>'ERROR en creación.'); }

        if(strlen($nombre)<3){
            return array('res'=>'bad','msj'=>'ERROR, Ingresa un nombre adecuado'); }

        $this->db->where('nombre', $nombre);
        if($this->db->count_all_results('marcas')>0){
            return array('res'=>'bad','msj'=>'ERROR, Ya existe una Marca con este nombre'); }

        $object = array('nombre' => $nombre, 'descripcion' => $descripcion);
        $this->db->insert('marcas', $object);
        return array('res'=>'ok','id'=>$this->db->insert_id());
    }
    
//---------------------------------------------------------funcion eliminar
    function eliminar($id = null){
        if($id == null){
            return array('res'=>'bad','msj'=>'ERROR en eliminación.'); }
        $this->db->where('idmarca', $id);
        if($this->db->count_all_results('productos')>0){
            return array('res'=>'bad','msj'=>'ERROR no se puede eliminar. Hay productos asociados a esta Marca.'); }
        $this->db->where('id', $id);
        $this->db->delete('marcas');
        return array('res'=>'ok');
    }
}

/* End of file Caracteristicas_model.php */
/* Location: ./application/models/Caracteristicas_model.php */