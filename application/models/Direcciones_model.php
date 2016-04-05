<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Direcciones_model extends CI_Model {

	function __construct() { parent::__construct(); }


//----------------------------------------------------------------------------------funcion actualizar
    function actualizar($id = NULL, $nombre = NULL, $direccion = NULL, $barrio = NULL, $ciudad = NULL, $region = NULL, $pais = NULL){
        $this->db->trans_start();
        $object = array("nombre"=>$nombre, "direccion"=>$direccion, "barrio"=>$barrio, "ciudad"=>$ciudad, "region"=>$region, "pais"=>$pais);
        $this->db->where('id', $id);
        $this->db->update('direcciones', $object);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return array('res'=>'bad','msj'=>'ERROR en edición.'); }
        else {return array('res'=>'ok'); }
    }

//--------------------------------borra un usuario por el id
    function eliminar($id = null){
        if($id == null){
            return array('res'=>'bad','msj'=>'Error en la inserción.'); }
        $this->db->where('id', $id);
        $this->db->delete('direcciones');
        return array('res'=>'ok');
    }   

//--------------------------------Crea una nueva Direccion
    function crear($idusuario = null, $nombre = null, $direccion = null, $barrio = null, $ciudad = null, $region = null, $pais = null) {
        $object = array('id_usuario' => $idusuario,
        				'nombre' => $nombre, 
        				'direccion' => $direccion,
        				'barrio' => $barrio,
        				'ciudad' => $ciudad,
        				'region' => $region,
        				'pais' => $pais);

        $this->db->insert('direcciones', $object);

        $data['res'] = 'ok';
        $data['id'] = $this->db->insert_id();
        return $data;
    }

//--------------------------------Lista todos usuarios de usuarios
    function direccionesUsuario($idusuario = null){
        $this->db->where('id_usuario', $idusuario);
        $this->db->order_by('nombre', 'asc');
        $query = $this->db->get('direcciones');
        return $query->result();
    }

//--------------------------------Lista todos usuarios de usuarios
    function buscarxusuarioxnombre($idusuario = null, $nombre = null){
        $this->db->where('id_usuario', $idusuario);
        $this->db->where('nombre', $nombre);
        $query = $this->db->get('direcciones', 1, 0);

       return $query->row();
    }
}

/* End of file Caracteristicas_model.php */
/* Location: ./application/models/Caracteristicas_model.php */