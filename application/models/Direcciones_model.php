<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Direcciones_model extends CI_Model {

	function __construct() { parent::__construct(); }


//---------------------------------------------------------actualizar
    function actualizar($id = null, $nombre = null, $direccion = null, $barrio = null, $ciudad = null, $region = null, $pais = null){
        $this->db->trans_start();
        $object = array("nombre"=>$nombre, "direccion"=>$direccion, "barrio"=>$barrio, "ciudad"=>$ciudad, "region"=>$region, "pais"=>$pais);
        $this->db->where('id', $id);
        $this->db->update('direcciones', $object);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return array('res'=>'bad','msj'=>'ERROR en edición.'); }
        else {return array('res'=>'ok'); }
    }

//---------------------------------------------------------eliminar
    function eliminar($id = null){
        if($id == null){
            return array('res'=>'bad','msj'=>'Error en la inserción.'); }
        $this->db->where('id', $id);
        $this->db->delete('direcciones');
        return array('res'=>'ok');
    }   

//---------------------------------------------------------crear
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

//---------------------------------------------------------direccionesUsuario
    function direccionesUsuario($idusuario = null){
        $this->db->where('id_usuario', $idusuario);
        $this->db->order_by('nombre', 'asc');
        $query = $this->db->get('direcciones');
        return $query->result();
    }

//---------------------------------------------------------direccionesUsuario
    function direccionUsuario($idusuario = null, $ultimadireccion = null){

        $this->db->where('id_usuario', $idusuario);
        $this->db->where('nombre', $ultimadireccion);
        $query = $this->db->get('direcciones', 0, 1);
        return $query->row();
    }

//---------------------------------------------------------buscarxusuarioxnombre
    function buscarxusuarioxnombre($idusuario = null, $nombre = null){
        $this->db->where('id_usuario', $idusuario);
        $this->db->where('nombre', $nombre);
        $query = $this->db->get('direcciones', 1, 0);

       return $query->row();
    }
}

// End of file Direcciones_model.php 
// Location: ./application/models/Direcciones_model.php