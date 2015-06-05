<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {


	public function index()
	{
		$this->load->view('web/encabezado');
		$this->load->model('Productos_model');
		$data = $this->Productos_model->listar8();
		$this->load->view('web/home',$data,FALSE);
		$this->load->view('web/piedepagina');

	}
}
