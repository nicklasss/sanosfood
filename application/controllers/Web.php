<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {


	public function index()
	{
		$this->load->view('web/encabezado');
		$this->load->model('Productos_model');
		$data = $this->Productos_model->listarWeb(8);
		$this->load->view('web/home',$data,FALSE);
		$this->load->view('web/piedepagina');
	}

	public function producto($id = null) {
		if($id == null){ show_404();
		}
		$this->load->view('web/encabezado');
		$this->load->model('Productos_model');
		$data['producto'] = $this->Productos_model->producto($id);
		$this->load->model('Caracteristicas_model');
		$data['caracteristicas'] = $this->Caracteristicas_model->listar();
		$this->load->view('web/producto', $data, FALSE); 
		$this->load->view('web/piedepagina');
	}

	public function buscar() {
		$quebuscar = @$this->input->post('quebuscar');
		if ($quebuscar == null) {$quebuscar = "*";
		}
		$this->load->view('web/encabezado');
		$this->load->model('Marcas_model');
		$data['marcas'] = $this->Marcas_model->listarConProductos();
		$this->load->model('Categorias_model');
		$data['categorias'] = $this->Categorias_model->listarConProductos();
		$data['quebuscar'] = $quebuscar;
		$data['ppp'] = 3;
		$data['pag'] = 1;
		$ppp = $data['ppp'];
		$pag = $data['pag'];
		$this->load->model('Productos_model');
		$data['productos'] = $this->Productos_model->buscarProductosWeb($quebuscar, $pag, $ppp);
		$data['cant'] = $this->Productos_model->contarProductosBuscar($quebuscar);
		$this->load->view('web/buscar', $data, FALSE); 
		$this->load->view('web/piedepagina');
	}

	public function productoscaracteristicas() {
		$this->load->model('Productos_model');
		$data = $this->Productos_model->listarweb();
		$this->load->model('Caracteristicas_model');
		$data['caracteristicas'] = $this->Caracteristicas_model->listar();
		$this->load->model('Pro_car_model');
		$data['pro_car'] = $this->Pro_car_model->listar();
		$this->load->view('web/encabezado');
		$this->load->view('web/productoscaracteristicas', $data, FALSE); 
		$this->load->view('web/piedepagina');
	}

}
