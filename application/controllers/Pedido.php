<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Controller {

	public function index()
	{
		
	}
	public function cambiarestado() {
		if(!$this->session->userdata('logeado_admin')){
			print json_encode(array('res'=>'bad','msj'=>'No autorizado.'));
			exit();
		}
		$idPedido = @$this->input->post('id',TRUE);
		$estado = @$this->input->post('estado',TRUE);
		$observacion = @$this->input->post('observacion',TRUE);
		$this->load->model('Pedidos_model');
		if($this->Pedidos_model->cambiarestado($idPedido,$estado,$observacion)){
			print json_encode(array('res'=>'ok'));exit();
		}else{
			print json_encode(array('res'=>'bad','msj'=>'Ha ocurrido un error.'));exit();
		}
	}

}

/* End of file Caracteristica.php */
/* Location: ./application/controllers/Caracteristica.php */