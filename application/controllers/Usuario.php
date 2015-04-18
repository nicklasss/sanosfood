<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
		
	}
	public function buscar(){
		$query = $this->input->post('query',TRUE);
		$this->load->model('Usuarios_model');
		$data['usuarios'] = $this->Usuarios_model->buscar($query);
		$this->load->view('usuario/buscar', $data, FALSE);
	}

}

/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */