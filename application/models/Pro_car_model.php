<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pro_car_model extends CI_Model {

	function __construct() {parent::__construct(); }

    function listar(){
    	$query = $this->db->get('pro_car');
    	return $query->result();
    }
}
/* End of file Caracteristicas_model.php */
/* Location: ./application/models/Caracteristicas_model.php */