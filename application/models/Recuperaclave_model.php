<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recuperaclave_model extends CI_Model {

	function __construct() { parent::__construct(); }

//---------------------------------------------------------listar
    function buscar($clave = null){
        if($clave == null){
	        $data["msj"] = "Viene llave vacia.";
	        $data['res'] = 'bad'; 
            return $data;
        }

    	$this->db->where('llave_enviada', $clave);
    	$query = $this->db->get('recuperaclave', 1, 0);
        if($query->num_rows() == 0){
	        $data['msj'] = "Llave no encontrada";
	        $data['res'] = 'bad'; 
	        return $data;
	    }
        $data["msj"] = "";
        $data['res'] = 'ok'; 
        $data['recuperaclave'] = $query->result();
       	return $data;
    }

//---------------------------------------------------------crear
    function crear($correo = null, $urlenviada = null){
        if($correo == null OR $urlenviada == null) {
	        $data["msj"] = "Viene correo y/o llave vacia.";
	        $data['res'] = 'bad'; 
            return $data;
        }
		$fecha = date("Y-m-d H:i:s");
        $objecto = array('fecha' => $fecha,
        				'correo' => $correo,
        				'llave_enviada' => $urlenviada);
        $this->db->insert('recuperaclave', $objecto);
        $data["msj"] = "";
        $data['res'] = 'ok'; 
        return $data;
    }
    
//---------------------------------------------------------eliminar
    function eliminar($correo = null){
        if($correo == null){
	        $data["msj"] = "Viene correo vacio.";
	        $data['res'] = 'bad'; 
            return $data;
        }
        $this->db->where('correo', $correo);
        $this->db->delete('recuperaclave');
        $data["msj"] = "";
        $data['res'] = 'ok'; 
        return $data;
    }
}

// End of file Recuperaclave_model.php 
// Location: ./application/models/Recuperaclave_model.php