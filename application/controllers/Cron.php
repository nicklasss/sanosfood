<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {

	public function index() { }

//---------------------------------------------------------CORREO olvido clave
	public function cada1minuto() {
		$fecha = date('Y-m-d H:i:s');
		$this->load->model('Pedidos_model');
		$data['pedidos'] = $this->Pedidos_model->pedidosPendientesBorrables();

        $this->db->trans_start();      //======================== INICIA TRANSACCION

		foreach($data['pedidos'] as $pedido) {
			//----- agregar los eliminados al stock del producto
			$this->load->model('Lineaspedidos_model');
			$data = $this->Lineaspedidos_model->listar($pedido->id);
			foreach($data['lineas'] as $linea) {
				$this->load->model('Productos_model');
				$this->Productos_model->modificarStocK($linea->id_producto, -$linea->unidades);
			}

			//-------------borrar el pedido
	        $this->load->model('Pedidos_model');
	        $this->Pedidos_model->eliminar($pedido->id);

			//-------------borrar las lineas del pedido
	        $this->load->model('Lineaspedidos_model');
	        $this->Lineaspedidos_model->eliminar($pedido->id);

			//-------------crear el log de pedidos
			$this->load->model('Log_pedidos_model');
			$this->Log_pedidos_model->crear($pedido->id, $pedido->idusuario, $fecha, EST_CANCELADO, 'Cancelado por Tiempo excedido');
		}

        $this->db->trans_complete();   //======================== TERMINA TRANSACCION
    }

}