<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Controller {

	public function index() {}

//---------------------------------------------------------cambiarestado
	public function cambiarestado() {
		if(!$this->session->userdata('logeado_admin')){
			print json_encode(array('res'=>'bad','msj'=>'No autorizado.'));
			exit();
		}
		$idPedido = @$this->input->post('id',TRUE);
		$estado = @$this->input->post('idestadopedido',TRUE);
		$observacion = @$this->input->post('observacion',TRUE);
		$this->load->model('Pedidos_model');
		if($this->Pedidos_model->cambiarestado($idPedido,$estado,$observacion)){
			print json_encode(array('res'=>'ok'));exit();
		} else{
			print json_encode(array('res'=>'bad','msj'=>'Ha ocurrido un error.'));exit();
		}
	}

//---------------------------------------------------------crear
	public function crear() {
		if(!$this->session->userdata('logeado')){
			redirect('','refresh');
			exit();
		}

		$ultimadireccion = @$this->input->post('ultimadireccion',TRUE);
		$idusuario = $this->session->userdata("idusuario");
		$fecha = date("Y-m-d H:i:s");



//			$this->db->trans_begin();
//          $this->db->trans_start();
//		if ($this->db->trans_status() === FALSE)
//			$this->db->trans_rollback();
//			$this->db->trans_commit();



// descargar de productos los que estan pedidos 
// crontab para borarr el pedido por tiempo y reintegrar los productos al stock

		//-------------buscar la direccion de envio
		$this->load->model('Direcciones_model');
		$data['direccion'] = $this->Direcciones_model->buscarxusuarioxnombre($idusuario, $ultimadireccion);

		//-------------crear el pedido
		$direccion = $data['direccion']->direccion;
		$barrio = 	$data['direccion']->barrio;
		$ciudad = 	$data['direccion']->ciudad;
		$region = 	$data['direccion']->region;
		$pais = 	$data['direccion']->pais;
		$this->load->model('Pedidos_model');
		$data = $this->Pedidos_model->crear($idusuario, $fecha, EST_PENDIENTE, $ultimadireccion, $direccion, $barrio, $ciudad, $region, $pais);
		$idpedido = $data['id'];

		//------------- actualizar stock y crear las lineas de pedidos
		foreach ($this->cart->contents() as $item) {
			$idproducto = $item['id'];
			$unidades = $item['qty'];
			$precio = $item['price'];

			//----- descontar cantidad del stock de productos
			$this->load->model('Productos_model');
			$this->Productos_model->modificarStocK($idproducto, $unidades);

			//----- crear lineaspedidos
			$this->load->model('Lineaspedidos_model');
			$this->Lineaspedidos_model->crear($idpedido, $idproducto, $unidades, $precio);
		}

		//-------------crear el log de pedidos
		$this->load->model('Log_pedidos_model');
		$this->Log_pedidos_model->crear($idpedido, $idusuario, $fecha, EST_PENDIENTE, 'Creado inicial por el sistema');


//        $this->db->trans_complete();
//        print $this->db->trans_status();
        if ($this->db->trans_status() === FALSE) {
//			$this->db->trans_rollback();
            print json_encode(array('res'=>'bad', 'msj'=>'hay errores no se completó la transacción.'));exit();
        } else {
			//-------------borrar el carrito
			$this->cart->destroy();
	        $this->session->set_userdata('comprando',false);
//			$this->db->trans_commit();
			print json_encode(array('res'=>'ok'));exit();
		}

    }

//----------------------------------------------------------------------------------funcion eliminar
    public function eliminar(){
        if(!$this->session->userdata('logeado')) {
            $data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
        }
        
        $idpedido = @$this->input->post('idpedido',TRUE);
		$idusuario = $this->session->userdata("idusuario");
		$fecha = date("Y-m-d H:i:s");


		//----- agregar los eliminados al stock del producto
		$this->load->model('Lineaspedidos_model');
		$data = $this->Lineaspedidos_model->listar($idpedido);
		foreach($data['lineas'] as $linea) {
			$this->load->model('Productos_model');
			$this->Productos_model->modificarStocK($idproducto, -$lineas->unidades);
		}

		//-------------borrar el pedido
        $this->load->model('Pedidos_model');
        $data['resultado'] = $this->Pedidos_model->eliminar($idpedido);

		//-------------borrar las lineas del pedido
        $this->load->model('Lineaspedidos_model');
        $data['resultado'] = $this->Lineaspedidos_model->eliminar($idpedido);

		//-------------crear el log de pedidos
		$this->load->model('Log_pedidos_model');
		$this->Log_pedidos_model->crear($idpedido, $idusuario, $fecha, EST_CANCELADO, 'Cancelado por el usuario');

		print json_encode(array('res'=>'ok'));
	}

//----------------------------------------------------------------------------------funcion moveracarrito
    public function moveracarrito(){
        if(!$this->session->userdata('logeado')) {
            $data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
        }
        
        $idpedido = @$this->input->post('idpedido',TRUE);
		$idusuario = $this->session->userdata("idusuario");
		$fecha = date("Y-m-d H:i:s");

		//-------------consigue las lineas del pedido y las graba en carrito
        $this->load->model('Lineaspedidos_model');
        $data = $this->Lineaspedidos_model->conseguirLineas($idpedido);
        foreach($data['lineas'] as $linea) {
			$data1 = array(
				'id' 		=> $linea->id_producto,
				'imagen' 	=> $linea->imagenproducto,
				'name' 		=> $linea->nombreproducto,
				'descripcioncorta' => $linea->descripcioncorta,
				'qty' 		=> $linea->unidades,
				'price' 	=> $linea->precio,
			);
			$this->cart->insert($data1); 
	    }


		//-------------borrar las lineas del pedido
        $this->load->model('Lineaspedidos_model');
        $data['resultado'] = $this->Lineaspedidos_model->eliminar($idpedido);

		//-------------borrar el pedido
        $this->load->model('Pedidos_model');
        $data['resultado'] = $this->Pedidos_model->eliminar($idpedido);

		//-------------crear el log de pedidos
		$this->load->model('Log_pedidos_model');
		$this->Log_pedidos_model->crear($idpedido, $idusuario, $fecha, EST_ACARRITO, 'Enviado al carrito por el usuario');

		print json_encode(array('res'=>'ok'));

	}

}

/* End of file Caracteristica.php */
/* Location: ./application/controllers/Caracteristica.php */