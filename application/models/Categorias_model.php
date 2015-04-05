<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function listar(){
    	$query = $this->db->get('categorias');
    	return $query->result();
    }	

}

/* End of file Categorias_model.php */
/* Location: ./application/models/Categorias_model.php */