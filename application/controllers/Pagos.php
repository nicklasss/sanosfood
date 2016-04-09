<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagos extends CI_Controller {

	public function index() { }

//---------------------------------------------------------RECIBE CONFIRMACION PAGO
	public function recepcionpago($idusuario = null, $idpedido = null, $valor = null) {
//		if($idusuario == null or $idpedido == null or $valor == null){
//		 show_404(); }

		$this->load->view('web/encabezado');
		$this->load->view('web/piedepagina');
	}

}