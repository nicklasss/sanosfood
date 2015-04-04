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