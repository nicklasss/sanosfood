<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caracteristicas_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function listar(){
    	$query = $this->db->get('caracteristicas');
    	return $query->result();
    }		

}

/* End of file Caracteristicas_model.php */
/* Location: ./application/models/Caracteristicas_model.php */