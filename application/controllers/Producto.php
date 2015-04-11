<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function index()
	{
		
	}

	public function crear(){
		$nombre = @$this->input->post('nombre',TRUE);
		$descripcion = @$this->input->post('descripcion',TRUE);
		$precio = @$this->input->post('precio',TRUE);
		$peso = @$this->input->post('peso',TRUE);
		$largo = @$this->input->post('largo',TRUE);
		$ancho = @$this->input->post('ancho',TRUE);
		$alto = @$this->input->post('alto',TRUE);
		$existencias = @$this->input->post('existencias',TRUE);
		$estado = @$this->input->post('estado',TRUE);
	}

	public function listar(){
		$cant = @$this->input->post('cant');
		$pagina = @$this->input->post('pagina');
		$this->load->model('Productos_model');
		$data = $this->Productos_model->listar($cant,$pagina);
		$this->load->view('producto/listar', $data, FALSE);
	}
	public function editar(){
		if(!$this->session->userdata('logeado_admin')){
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
			$this->load->view('producto/editar', $data, FALSE);
		}
		$id = $this->input->post('id',TRUE);
		$atributo = @$this->input->post('atributo',TRUE);
		$valor = @$this->input->post('valor',TRUE);
		$this->load->model('Productos_model');
		$data['resultado'] = $this->Productos_model->editar($id,$atributo,$valor);
		$this->load->view('producto/editar', $data, FALSE);
	}

}

/* End of file producto.php */
/* Location: ./application/controllers/producto.php */