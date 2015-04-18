<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get($id=null){
        $this->db->where('id', $id);
        $query = $this->db->get('usuarios', 1, 0);
        if($query->num_rows()!=1){
            return false;
        }
        return $query->row();
    }

    function listar(){
    	$query = $this->db->get('usuarios');
    	return $query->result();
    }
    function editar($id = NULL, $atributo = NULL, $valor = NULL){
        if($id != NULL AND $atributo != NULL AND $valor != NULL){
            $this->db->trans_start();
            $object = array($atributo => $valor);
            $this->db->where('id', $id);
            $this->db->update('usuarios', $object);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                return array('res'=>'bad','msj'=>'Error en la edición.'); }
            else {return array('res'=>'ok'); }
        }
    }
    function crear($nombre = null, $descripcion = null){
        if($nombre == NULL OR $descripcion == null){
            return array('res'=>'bad','msj'=>'Error en la creación.'); }

        if(strlen($nombre)<3){
            return array('res'=>'bad','msj'=>'Ingresa un nombre adecuado'); }

        $this->db->where('nombre', $nombre);
        if($this->db->count_all_results('marcas')>0){
            return array('res'=>'bad','msj'=>'Ya existe una caracteristica con este nombre'); }

        $object = array('nombre' => $nombre, 'descripcion' => $descripcion);
        $this->db->insert('marcas', $object);
        return array('res'=>'ok','id'=>$this->db->insert_id());
    }
    function eliminar($id = null){
        if($id == null){
            return array('res'=>'bad','msj'=>'Error en la inserción.'); }
        $this->db->where('id', $id);
        $this->db->delete('usuarios');
        return array('res'=>'ok');
    }
    function buscar($query = ''){
        if($query ==""){
            $data['usuarios'] = array();
        }
        $palabras = preg_split("/ (.| ) /", $query);
        $against = "";
        foreach ($palabras as $palabra) {
            $against .= $palabra.'* ';
        }
        $query = $this->db->query(" SELECT id,nombres,apellidos,usuario,correo,ciudad
                                    FROM usuarios
                                    WHERE MATCH(nombres,apellidos,usuario,correo,ciudad) AGAINST ('$against' IN BOOLEAN MODE);");
        return $query->result();
    }
}

/* End of file Caracteristicas_model.php */
/* Location: ./application/models/Caracteristicas_model.php */