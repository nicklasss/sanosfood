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

	public function buscar($pag = 1) {
		$quebuscar = @$this->input->post('quebuscar');
		$this->load->view('web/encabezado');
		$this->load->model('Productos_model');
		$data = $this->Productos_model->buscarProductosWeb($quebuscar, $pag);

		$this->load->model('Marcas_model');
		$data['marcas'] = $this->Marcas_model->listarConProductos();
		$this->load->model('Categorias_model');
		$data['categorias'] = $this->Categorias_model->listarConProductos();

		$this->load->library('pagination');
		$config['base_url'] = base_url().'web/buscar/'.$pag;
		$config['total_rows'] = $this->Productos_model->contarProductos($quebuscar);
		$config['per_page'] = 3;
		$config['num_links'] = 3;
		$config['display_pages'] = TRUE;					/*FALSE si quiere solamente los enlaces "siguiente" y "anterior"*/
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<nav class="text-center"><ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="disabled"><span>';
		$config['cur_tag_close'] = '</span></li>';
		$config['next_link'] = '&rsaquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_link'] = '&raquo;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_link'] = '&laquo;';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&lsaquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);

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
