 
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrito extends CI_Controller {

	public function index() { }

//---------------------------------------------------------agregarCarrito
    public function agregarCarrito() {
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

//---------------------------------------------------------actualizarCarrito
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

//---------------------------------------------------------vaciarCarrito
    public function vaciarCarrito() {
		$this->cart->destroy();
        $this->session->set_userdata('comprando',false);
		redirect('', 'refresh');
    }
}

/* End of file Carrito.php */
/* Location: ./application/controllers/Carrito.php */