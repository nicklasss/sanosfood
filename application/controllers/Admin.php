<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {
		$this->load->view('admin/encabezado');
		$this->load->view('admin/home');
		$this->load->view('admin/piedepagina');
	}
	public function login(){
		$this->load->view('admin/login');
	}

	public function validarusuario(){
		$this->load->model('Admin_model');
		$this->load->view('admin/validarusuario', array('resultado'=>$this->Admin_model->validarUsuario()), FALSE);
	}

	public function home(){
		$this->load->view('admin/encabezado');
		$this->load->view('admin/home');
		$this->load->view('admin/piedepagina');
	}

	public function productos($id = null){
		$this->load->view('admin/encabezado');
		$this->load->model('Productos_model');
		if($id != null){
			$data['producto'] = $this->Productos_model->producto($id);
			$this->load->view('admin/producto', $data, FALSE);
		}else{
			$data['productos'] = $this->Productos_model->listar();
			$this->load->view('admin/productos',$data,FALSE);
		}
		$this->load->view('admin/piedepagina');
	}
}