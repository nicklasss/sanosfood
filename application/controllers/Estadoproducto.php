<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadoproducto extends CI_Controller {

	public function index()
	{
		
	}
	public function editar() {
		if(!$this->session->userdata('logeado_admin')){
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('estadoproducto/editar', $data, FALSE);
		}
		$id = $this->input->post('id',TRUE);
		$atributo = @$this->input->post('atributo',TRUE);
		$valor = @$this->input->post('valor',TRUE);
		$this->load->model('Estadosproductos_model');
		$data['resultado'] = $this->Estadosproductos_model->editar($id,$atributo,$valor);
print json_encode($data['resultado']);
//		$this->load->view('estadoproducto/editar', $data, FALSE);
	}
	public function crear(){
		if(!$this->session->userdata('logeado_admin')) {
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('estadoproducto/crear', $data, FALSE);
		}
		$nombre = @$this->input->post('nombre',TRUE);
		$descripcion = @$this->input->post('descripcion',TRUE);
		$this->load->model('Estadosproductos_model');
		$data['resultado'] = $this->Estadosproductos_model->crear($nombre,$descripcion);
print json_encode($data['resultado']);
//		$this->load->view('estadoproducto/crear', $data, FALSE);
	}
	public function eliminar(){
		if(!$this->session->userdata('logeado_admin')) {
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('estadoproducto/crear', $data, FALSE);
		}
		$id = @$this->input->post('id',TRUE);
		$this->load->model('Estadosproductos_model');
		$data['resultado'] = $this->Estadosproductos_model->eliminar($id);
print json_encode($data['resultado']);
//		$this->load->view('estadoproducto/eliminar', $data, FALSE);
	}

}

/* End of file Caracteristica.php */
/* Location: ./application/controllers/Caracteristica.php */