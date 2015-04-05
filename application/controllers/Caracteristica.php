<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caracteristica extends CI_Controller {

	public function index()
	{
		
	}
	public function editar(){
		if(!$this->session->userdata('logeado_admin')){
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('caracteristica/editar', $data, FALSE);
		}
		$id = $this->input->post('id',TRUE);
		$atributo = @$this->input->post('atributo',TRUE);
		$valor = @$this->input->post('valor',TRUE);
		$this->load->model('Caracteristicas_model');
		$data['resultado'] = $this->Caracteristica_model->editar($id,$atributo,$valor);
		$this->load->view('caracteristica/editar', $data, FALSE);
	}

}

/* End of file Caracteristica.php */
/* Location: ./application/controllers/Caracteristica.php */