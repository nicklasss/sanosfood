 
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrito extends CI_Controller {

	public function index() { }

//---------------------------------------------------------productoscaracteristicas
    public function agregarCarrito() {
//		print_r($_POST);
		$data1 = array(
			'id' => $this->input->post('idprod'),
			'imagen' => $this->input->post('imagenprod'),
			'name' => $this->input->post('nombreprod'),
			'descripcioncorta' => $this->input->post('descripcioncortaprod'),
			'qty' => $this->input->post('cantidadprod'),
			'price' => $this->input->post('precioprod'),
		);
		if($this->cart->insert($data1)) {
			print json_encode(array('res'=>'ok', 'cantcart'=>$this->cart->total_items())); exit;
		}
		print json_encode(array('res'=>'bad','msj'=>'No se pudo agregar por clase Cart'));
    } 

//---------------------------------------------------------productoscaracteristicas
    public function actualizarCarrito() {
        $rowid = $this->input->post('rowid');
        $cantidad = $this->input->post('cantidad');
        $data1[] = array('rowid' => $rowid,
        				 'qty' => $cantidad
        );
        $this->cart->update($data1);


		$vlritem1 = 0;
		foreach ($this->cart->contents() as $items) {
			if ($items['rowid'] == $rowid) {
				$vlritem1 = trim($items['price']) ;
			}
		}
		
		$vlritem = number_format($vlritem1 * $cantidad, 0, ",", ".");
		$vlrtotal = number_format($this->cart->total(), 0, ",", ".");
		print json_encode(array('res'=>'ok', 'vlrtotal'=>$vlrtotal, 'canttotal'=>$this->cart->total_items(),'vlritem'=>$vlritem));
    }

//---------------------------------------------------------productoscaracteristicas
    public function vaciarCarrito() {
		$this->cart->destroy();
		redirect('', 'refresh');
    }

//---------------------------------------------------------funcion comprarCarrito
    public function comprarCarrito() {
		$idusuario = $this->session->userdata("idusuario");
		$fecha = date("Y-m-d H:i:s");
		$idestadopedido = 'Pendiente';
		//------ pedir direccion
		//$direccion = 
		//$barrio =
		//$ciudad =
		//$region =
		//$pais =   
		$this->load->model('Pedidos_model');
		$data = $this->Pedidos_model->crear($idusuario, $fecha, $idestadopedido, $direccion, $barrio, $ciudad, $region, $pais);
		$idpedido = $data['id'];
		foreach ($this->cart->contents() as $items) {
			$idproducto = $items->id;
			$unidades = $items->qty;
			$precio = $items->price;
			$this->load->model('Lineaspedidos_model');
			$this->Lineaspedidos_model->crear($idpedido, $idproducto, $unidades, $precio);

			if ($items['rowid'] == $rowid) {
				$vlritem1 = trim($items['price']) ;
			}
		}
		
		$vlritem = number_format($vlritem1 * $cantidad, 0, ",", ".");
		$vlrtotal = number_format($this->cart->total(), 0, ",", ".");
		print json_encode(array('res'=>'ok', 'vlrtotal'=>$vlrtotal, 'canttotal'=>$this->cart->total_items(),'vlritem'=>$vlritem));
    }



}