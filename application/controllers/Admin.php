<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {
		$this->load->view('admin/encabezado');
		$this->load->view('admin/home');
		$this->load->view('admin/piedepagina');
	}
	public function login() {
		$this->load->view('admin/login');
	}

	public function validarusuario() {
		$this->load->model('Admin_model');
		$this->load->view('admin/validarusuario', array('resultado'=>$this->Admin_model->validarUsuario()), FALSE);
	}

	public function home() {
		$this->load->view('admin/encabezado');
		$this->load->view('admin/home');
		$this->load->view('admin/piedepagina');
	}
	public function crearproducto(){
		$this->load->view('admin/encabezado');
		$this->load->model('Estados_model');
		$data['estados'] = $this->Estados_model->listar();
		$this->load->model('Marcas_model');
		$data['marcas'] = $this->Marcas_model->listar();
		$this->load->view('admin/crearproducto',$data,FALSE);
		$this->load->view('admin/piedepagina');
	}

	public function productos($id = null) {
		$this->load->view('admin/encabezado');
		$this->load->model('Productos_model');
		if($id != null) { 
			$this->load->model('Estados_model');
			$this->load->model('Marcas_model');
			$data['marcas'] = $this->Marcas_model->listar();
			$data['producto'] = $this->Productos_model->producto($id);
			$data['estados'] = $this->Estados_model->listar();
			$this->load->view('admin/producto', $data, FALSE); }
		else {
			$data = $this->Productos_model->listar();
			$this->load->view('admin/productos',$data,FALSE); }
		$this->load->view('admin/piedepagina');
	}
	public function caracteristicas() {
		$this->load->view('admin/encabezado');
		$this->load->model('Caracteristicas_model');
		$data['caracteristicas'] = $this->Caracteristicas_model->listar();
		$this->load->view('admin/caracteristicas', $data, FALSE);
		$this->load->view('admin/piedepagina');
	}
	public function categorias() {
		$this->load->view('admin/encabezado');
		$this->load->model('Categorias_model');
		$data['categorias'] = $this->Categorias_model->listar();
		$this->load->view('admin/categorias', $data, FALSE);
		$this->load->view('admin/piedepagina');
	}
	public function estados() {
		$this->load->view('admin/encabezado');
		$this->load->model('Estados_model');
		$data['estados'] = $this->Estados_model->listar();
		$this->load->view('admin/estados', $data, FALSE);
		$this->load->view('admin/piedepagina');
	}
	public function marcas() {
		$this->load->view('admin/encabezado');
		$this->load->model('Marcas_model');
		$data['marcas'] = $this->Marcas_model->listar();
		$this->load->view('admin/marcas', $data, FALSE);
		$this->load->view('admin/piedepagina');
	}
}