<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {


	public function index()
	{
		$this->load->view('web/encabezado');
		$this->load->view('web/home');
		$this->load->view('web/piedepagina');

	}
}
