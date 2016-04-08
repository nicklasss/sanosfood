<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prueba_model extends CI_Model {

	function __construct() { parent::__construct(); }

//---------------------------------------------------------funcion listar
    function crear() {
		$objecto = array('minuto' => '1');
        $this->db->insert('prueba', $objecto);
    }
}	
