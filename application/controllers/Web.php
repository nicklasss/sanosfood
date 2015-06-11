<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {


	public function index()
	{
		$this->load->view('web/encabezado');
		$this->load->model('Productos_model');
		$data = $this->Productos_model->listar(8);
		$this->load->view('web/home',$data,FALSE);
		$this->load->view('web/piedepagina');
	}

	public function producto($id = null) {
		if($id == null){ show_404();
		}
//		$this->load->model('Estadospedidos_model');
//		$dataencabezado['estadospedidos'] = $this->Estadospedidos_model->listar();
//		$this->load->model('Estadosproductos_model');
//		$dataencabezado['estadosproductos'] = $this->Estadosproductos_model->listar();

//		$this->load->view('web/encabezado',$dataencabezado,FALSE);
		$this->load->view('web/encabezado');
		$this->load->model('Productos_model');
//		$this->load->model('Estadosproductos_model');
//		$this->load->model('Marcas_model');
//		$data['marcas'] = $this->Marcas_model->listar();
//		$this->load->model('Caracteristicas_model');
//		$data['caracteristicas'] = $this->Caracteristicas_model->listar();
//		$this->load->model('Categorias_model');
//		$data['categorias'] = $this->Categorias_model->listar();
		$data['producto'] = $this->Productos_model->producto($id);
//		$data['estados'] = $this->Estadosproductos_model->listar();
		$this->load->view('web/producto', $data, FALSE); 
		$this->load->view('web/piedepagina');
	}

	public function buscar() {
//		$quebuscar = @$this->input->post('quebuscar');
		$quebuscar = "harina";
		$this->load->view('web/encabezado');
		$this->load->model('Productos_model');
		$this->load->model('Marcas_model');
		$data['marcas'] = $this->Marcas_model->listar();
		$this->load->model('Categorias_model');
		$data['categorias'] = $this->Categorias_model->listar();
		$data['productos'] = $this->Productos_model->buscarProductos($quebuscar);
		$this->load->view('web/buscar', $data, FALSE); 
		$this->load->view('web/piedepagina');
	}

}
