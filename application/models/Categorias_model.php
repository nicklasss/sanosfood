<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function listar() {
        $this->db->order_by('nombre', 'asc');
    	$query = $this->db->get('categorias');
    	return $query->result();
    }	
	
    function editar($id = NULL, $atributo = NULL, $valor = NULL){
        if($id != NULL AND $atributo != NULL AND $valor != NULL){
            if($atributo =="nombre"){
                $this->db->where('nombre', $valor);
                if($this->db->count_all_results('categorias')>0){
                    return array('res'=>'bad','msj'=>'ERROR en edición. Ya existe una categoria con ese nombre.'); }
            }
            $this->db->trans_start();
            $object = array($atributo => $valor);
            $this->db->where('id', $id);
            $this->db->update('categorias', $object);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                return array('res'=>'bad','msj'=>'ERROR en edición.'); }
            else {return array('res'=>'ok'); }
        }
    }
    
    function crear($nombre = null, $descripcion = null){
        if($nombre == NULL OR $descripcion == null){
            return array('res'=>'bad','msj'=>'ERROR en creación.'); }

        if(strlen($nombre)<3){
            return array('res'=>'bad','msj'=>'ERROR, Ingresa un nombre adecuado'); }

        $this->db->where('nombre', $nombre);
        if($this->db->count_all_results('categorias')>0){
            return array('res'=>'bad','msj'=>'ERROR, Ya existe una categoría con este nombre'); }

        $object = array('nombre' => $nombre, 'descripcion' => $descripcion);
        $this->db->insert('categorias', $object);
        return array('res'=>'ok','id'=>$this->db->insert_id());
    }
    
    function eliminar($id = null){
        if($id == null){
            return array('res'=>'bad','msj'=>'ERROR en inserción.'); }
        $this->db->where('idcategoria', $id);
        if($this->db->count_all_results('pro_cat')>0){
            return array('res'=>'bad','msj'=>'ERROR en inserción. Hay productos asociados a esta categoria.'); }
        $this->db->where('id', $id);
        $this->db->delete('categorias');
        return array('res'=>'ok');
    }
}

/* End of file Categorias_model.php */
/* Location: ./application/models/Categorias_model.php */