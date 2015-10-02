<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadopedido extends CI_Controller {

	public function index()
	{
		
	}
	public function editar() {
		if(!$this->session->userdata('logeado_admin')){
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('estadopedido/editar', $data, FALSE);
		}
		$id = $this->input->post('id',TRUE);
		$atributo = @$this->input->post('atributo',TRUE);
		$valor = @$this->input->post('valor',TRUE);
		$this->load->model('Estadospedidos_model');
		$data['resultado'] = $this->Estadospedidos_model->editar($id,$atributo,$valor);
		print json_encode($data['resultado']);
//		$this->load->view('estadopedido/editar', $data, FALSE);
	}
	public function crear(){
		if(!$this->session->userdata('logeado_admin')) {
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('estadopedido/crear', $data, FALSE);
		}
		$nombre = @$this->input->post('nombre',TRUE);
		$descripcion = @$this->input->post('descripcion',TRUE);
		$this->load->model('Estadospedidos_model');
		$data['resultado'] = $this->Estadospedidos_model->crear($nombre,$descripcion);
		print json_encode($data['resultado']);
//		$this->load->view('estadopedido/crear', $data, FALSE);
	}
	public function eliminar(){
		if(!$this->session->userdata('logeado_admin')) {
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('estadopedido/crear', $data, FALSE);
		}
		$id = @$this->input->post('id',TRUE);
		$this->load->model('Estadospedidos_model');
		$data['resultado'] = $this->Estadospedidos_model->eliminar($id);
		print json_encode($data['resultado']);
//		$this->load->view('estadopedido/eliminar', $data, FALSE);
	}

}

/* End of file Caracteristica.php */
/* Location: ./application/controllers/Caracteristica.php */