<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lineaspedidos extends CI_Controller {

	public function index() {}

//---------------------------------------------------------buscar_lineaspedido
	public function buscar_lineaspedido() {
		if(!$this->session->userdata('logeado')){
			print json_encode(array('res'=>'bad','msj'=>'Debe Iniciar una Sesión.'));
			exit();
		}
		$idpedido = @$this->input->post('idpedido',TRUE);
		$this->load->model('Lineaspedidos_model');
		$data = $this->Lineaspedidos_model->buscar_lineaspedido($idpedido);
		print json_encode(array('res'=>$data['res'], 'msj'=>$data['msj'], 'lineas'=>$data['lineas']));exit();
	}

}

/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */
