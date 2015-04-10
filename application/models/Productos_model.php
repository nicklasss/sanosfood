<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function listar($cant = 10, $pag = 1, $cat = null, $car = null){
        $data['cant'] = $this->db->count_all_results('productos');
    	if($cat!= null){
    			}

		if($car != null){
				}

		$this->db->from('productos');
		$this->db->limit($cant,$cant*($pag-1));
		$query = $this->db->get();
        $data['productos'] = $query->result();
		return $data;
    }
    function producto($id = null){
    	$this->db->where('id', $id);
    	$query = $this->db->get('productos', 1, 0);
        $producto = $query->row();
        $this->db->select('nombre');
        $this->db->where('id', $producto->id_marca);
        $producto->marca = $this->db->get('marcas', 1, 0)->row()->nombre;
    	return $producto;
    }
    function editar($id = NULL, $atributo = NULL, $valor = NULL){
        if($id != NULL AND $atributo != NULL AND $valor != NULL){
            $this->db->trans_start();
            if($atributo=='nombre'){
                $slug = url_title($valor, 'dash', true);
                $object = array($atributo => $valor, 'slug' => $slug); }
            else {$object = array($atributo => $valor); }
            $this->db->where('id', $id);
            $this->db->update('productos', $object);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                return array('res'=>'bad','msj'=>'Error en la edición.'); }
            else {return array('res'=>'ok'); }
        }
    }

}

/* End of file Productos_model.php */
/* Location: ./application/models/Productos_model.php */