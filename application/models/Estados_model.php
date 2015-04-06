<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estados_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function listar(){
    	$query = $this->db->get('estados');
    	return $query->result();
    }	
	function editar($id = NULL, $atributo = NULL, $valor = NULL){
        if($id != NULL AND $atributo != NULL AND $valor != NULL){
            $this->db->trans_start();
            $object = array($atributo => $valor);
            $this->db->where('id', $id);
            $this->db->update('estados', $object);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                return array('res'=>'bad','msj'=>'Error en la edición.'); }
            else { return array('res'=>'ok'); }
        }
    }
}

/* End of file Estados_model.php */
/* Location: ./application/models/Estados_model.php */