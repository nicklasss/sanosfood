<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadosproductos_model extends CI_Model {

	function __construct() { parent::__construct(); }

//---------------------------------------------------------listar
    function listar(){
        $this->db->order_by('id', 'asc');
    	$query = $this->db->get('estadosproductos');
    	return $query->result();
    }	

//---------------------------------------------------------editar
	function editar($id = NULL, $atributo = NULL, $valor = NULL){
        if($id != NULL AND $atributo != NULL AND $valor != NULL){
            if($atributo =="nombre"){
                $this->db->where('nombre', $valor);
                if($this->db->count_all_results('estadosproductos')>0){
                    return array('res'=>'bad','msj'=>'ERROR en edición. Ya existe una estado con ese nombre.'); }
            }
            $this->db->trans_start();
            $object = array($atributo => $valor);
            $this->db->where('id', $id);
            $this->db->update('estadosproductos', $object);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                return array('res'=>'bad','msj'=>'ERROR en edición.'); }
            else {return array('res'=>'ok'); }
        }
    }

//---------------------------------------------------------crear
    function crear($nombre = null, $descripcion = null){
        if($nombre == NULL OR $descripcion == null){
            return array('res'=>'bad','msj'=>'ERROR en la creación.'); }

        if(strlen($nombre)<3){
            return array('res'=>'bad','msj'=>'ERROR, Ingresa un nombre adecuado'); }

        $this->db->where('nombre', $nombre);
        if($this->db->count_all_results('estadosproductos')>0){
            return array('res'=>'bad','msj'=>'ERROR, Ya existe un estado con este nombre'); }

        $object = array('nombre' => $nombre, 'descripcion' => $descripcion);
        $this->db->insert('estadosproductos', $object);
        return array('res'=>'ok','id'=>$this->db->insert_id());
    }
    
//---------------------------------------------------------eliminar
    function eliminar($id = null){
        if($id == null){
            return array('res'=>'bad','msj'=>'ERROR en la inserción.'); }
        $this->db->where('idestadoproducto', $id);
        if($this->db->count_all_results('productos')>0){
            return array('res'=>'bad','msj'=>'ERROR no se puede eliminar. Hay productos asociados a este estado.'); }
        $this->db->where('id', $id);
        $this->db->delete('estadosproductos');
        return array('res'=>'ok');
    }
}

// End of file Estadosproductos_model.php 
// Location: ./application/models/Estadosproductos_model.php