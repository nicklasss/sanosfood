<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {

	public function index() { }

//---------------------------------------------------------CORREO olvido clave
	public function cada1minuto() {
		$this->load->model('Prueba_model');
		$this->Prueba_model->crear();

	}
}