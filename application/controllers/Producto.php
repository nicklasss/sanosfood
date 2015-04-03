<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function index()
	{
		
	}

	public function listar(){
		$cant = @$this->input->post('cant');
		$pagina = @$this->input->post('pagina');
		$this->load->model('Productos_model');
		$data['resultado'] = $this->Productos_model->listar($cant,$pagina);
		$this->load->view('producto/listar', $data, FALSE);
	}

}

/* End of file producto.php */
/* Location: ./application/controllers/producto.php */