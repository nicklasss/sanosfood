<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {
		$this->load->view('admin/home');
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

}