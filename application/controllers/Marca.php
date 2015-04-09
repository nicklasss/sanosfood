<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marca extends CI_Controller {

	public function index()
	{
		
	}
	public function editar() {
		if(!$this->session->userdata('logeado_admin')){
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('marca/editar', $data, FALSE);
		}
		$id = $this->input->post('id',TRUE);
		$atributo = @$this->input->post('atributo',TRUE);
		$valor = @$this->input->post('valor',TRUE);
		$this->load->model('Marcas_model');
		$data['resultado'] = $this->Marcas_model->editar($id,$atributo,$valor);
		$this->load->view('marca/editar', $data, FALSE);
	}
	public function crear(){
		if(!$this->session->userdata('logeado_admin')) {
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('marca/crear', $data, FALSE);
		}
		$nombre = @$this->input->post('nombre',TRUE);
		$descripcion = @$this->input->post('descripcion',TRUE);
		$this->load->model('Marcas_model');
		$data['resultado'] = $this->Marcas_model->crear($nombre,$descripcion);
		$this->load->view('marca/crear', $data, FALSE);
	}
	public function eliminar(){
		if(!$this->session->userdata('logeado_admin')) {
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('marca/crear', $data, FALSE);
		}
		$id = @$this->input->post('id',TRUE);
		$this->load->model('Marcas_model');
		$data['resultado'] = $this->Marcas_model->eliminar($id);
		$this->load->view('marca/eliminar', $data, FALSE);
	}

}

/* End of file Caracteristica.php */
/* Location: ./application/controllers/Caracteristica.php */