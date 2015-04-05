<php
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

}

/* End of file Estados_model.php */
/* Location: ./application/models/Estados_model.php */