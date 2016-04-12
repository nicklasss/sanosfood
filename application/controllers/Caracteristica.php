<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caracteristica extends CI_Controller {

	public function index() { }

//---------------------------------------------------------editar
	public function editar() {
		if(!$this->session->userdata('logeado_admin')){
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('caracteristica/editar', $data, FALSE);
		}
		$id = $this->input->post('id',TRUE);
		$atributo = @$this->input->post('atributo',TRUE);
		$valor = @$this->input->post('valor',TRUE);
		$this->load->model('Caracteristicas_model');
		$data['resultado'] = $this->Caracteristicas_model->editar($id,$atributo,$valor);
		print json_encode($data['resultado']);
	}

//---------------------------------------------------------crear
	public function crear(){
		if(!$this->session->userdata('logeado_admin')) {
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('caracteristica/crear', $data, FALSE);
		}
		$nombre = @$this->input->post('nombre',TRUE);
		$descripcion = @$this->input->post('descripcion',TRUE);
		$this->load->model('Caracteristicas_model');
		$data['resultado'] = $this->Caracteristicas_model->crear($nombre,$descripcion);
		print json_encode($data['resultado']);
	}

//---------------------------------------------------------eliminar
	public function eliminar(){
		if(!$this->session->userdata('logeado_admin')) {
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('caracteristica/crear', $data, FALSE);
		}
		$id = @$this->input->post('id',TRUE);
		$this->load->model('Caracteristicas_model');
		$data['resultado'] = $this->Caracteristicas_model->eliminar($id);
		print json_encode($data['resultado']);		
	}
}

/* End of file Caracteristica.php */
/* Location: ./application/controllers/Caracteristica.php */