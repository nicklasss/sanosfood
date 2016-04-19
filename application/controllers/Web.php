<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {


/*------------------------ solo para proceso actualiuzar base de datos
public function encriptarclaves() {
		$this->db->from('usuarios');
		$query = $this->db->get();
		$this->load->helper('security');
		foreach ($query->result() as $usuario) {
			$objeto = array('clave'=>encriptar($usuario->clave));
			$this->db->where('id', $usuario->id);
			$this->db->update('usuarios', $objeto);
			print $usuario->correo;
		}
}
//---------------------------------- */


//---------------------------------------------------------Index
	public function index() {
		$this->load->view('web/encabezado');
		$this->load->model('Productos_model');
		$data = $this->Productos_model->listarWeb(8);
		$this->load->view('web/home',$data,FALSE);
		$this->load->view('web/piedepagina');
	}

//---------------------------------------------------------cambiarclave
	public function cambiarclave() {
		if(!$this->session->userdata('logeado')){
			redirect('','refresh');
			exit();
		}
		$this->load->view('web/encabezado');
		$this->load->view('web/cambiarclave');
		$this->load->view('web/piedepagina');
	}

//---------------------------------------------------------Login
	public function login() {
		if($this->session->userdata('logeado')){
			redirect('','refresh');
			exit();
		}
		$this->load->view('web/encabezado');
		$this->load->view('web/login');
		$this->load->view('web/piedepagina');
	}

//---------------------------------------------------------Logout
	public function logout() {
		$this->session->set_userdata('usuario',"");
		$this->session->set_userdata('idusuario',"");
		$this->session->set_userdata('logeado', FALSE);
        $this->session->set_userdata('comprando',false);
		redirect('','refresh');
	}

//---------------------------------------------------------micuenta
	public function micuenta() {
		if(!$this->session->userdata('logeado')){
			redirect('','refresh');
			exit();
		}
		$this->load->view('web/encabezado');
		$this->load->model('Usuarios_model');
		$data['usuario'] = $this->Usuarios_model->encontrar($this->session->userdata("usuario"));
		$this->load->model('Direcciones_model');
		$idusuario = $data['usuario']->id;
		$data['direcciones'] = $this->Direcciones_model->direccionesUsuario( $idusuario );
        $this->session->set_userdata('comprando',true);
		$this->load->view('web/micuenta', $data, FALSE); 
		$this->load->view('web/piedepagina');
	}

//---------------------------------------------------------micuenta
	public function comprar() {
		if(!$this->session->userdata('logeado')){
			redirect('','refresh');
			exit();
		}
		$this->load->view('web/encabezado');
		$this->load->model('Usuarios_model');
		$data['usuario'] = $this->Usuarios_model->encontrar($this->session->userdata("usuario"));
		$this->load->model('Direcciones_model');
		$idusuario = $data['usuario']->id;
		$ultimadireccion = $data['usuario']->ultima_direccion;
		$data['direccion'] = $this->Direcciones_model->direccionUsuario( $idusuario, $ultimadireccion );
        $this->session->set_userdata('comprando',true);
		$this->load->view('web/comprar', $data, FALSE); 
		$this->load->view('web/piedepagina');
	}

//---------------------------------------------------------mispedidos
	public function mispedidos() {
		if(!$this->session->userdata('logeado')){
			redirect('','refresh');
			exit();
		}
	
		$this->load->view('web/encabezado');
		$this->load->model('Usuarios_model');
		$data['usuario'] = $this->Usuarios_model->encontrar($this->session->userdata("usuario"));
		$this->load->model('Pedidos_model');
		$id = $data['usuario']->id;
		$data['pedidos'] = $this->Pedidos_model->pedidosUsuario( $id );
		$this->load->view('web/mispedidos', $data, FALSE); 
		$this->load->view('web/piedepagina');
	}

//---------------------------------------------------------mostrarCarrito
	public function mostrarCarrito() {
		$this->load->view('web/encabezado');
		$this->load->view('web/carrito', FALSE); 
		$this->load->view('web/piedepagina');
	}
	
//---------------------------------------------------------olvidoclave
	public function olvidoclave() {
		if($this->session->userdata('logeado')){
			redirect('','refresh');
			exit();
		}
		$this->load->view('web/encabezado');
		$this->load->view('web/olvidoclave'); 
		$this->load->view('web/piedepagina');
	}

//---------------------------------------------------------producto
	public function producto($id = null) {
		if($id == null){ show_404();
		}
		$this->load->view('web/encabezado');
		$this->load->model('Productos_model');
		$data['producto'] = $this->Productos_model->producto($id);
		$this->load->model('Caracteristicas_model');
		$data['caracteristicas'] = $this->Caracteristicas_model->listar();
		$this->load->view('web/producto', $data, FALSE); 
		$this->load->view('web/piedepagina');
	}

//---------------------------------------------------------productos
	public function productos() {
		$quebuscar = @$this->input->post('quebuscar');
		if ($quebuscar == null) {$quebuscar = "*";
		}
		$this->load->view('web/encabezado');
		$this->load->model('Marcas_model');
		$data['marcas'] = $this->Marcas_model->listarConProductos();
		$this->load->model('Categorias_model');
		$data['categorias'] = $this->Categorias_model->listarConProductos();
		$data['quebuscar'] = $quebuscar;
		$data['ppp'] = 6;
		$data['pag'] = 1;
		$ppp = $data['ppp'];
		$pag = $data['pag'];
		$this->load->model('Productos_model');
		$data['productos'] = $this->Productos_model->buscarProductosWeb($quebuscar, $pag, $ppp);
		$data['cant'] = $this->Productos_model->contarProductosBuscar($quebuscar);
		$this->load->view('web/productos', $data, FALSE); 
		$this->load->view('web/piedepagina');
	}

//---------------------------------------------------------productoscaracteristicas
	public function productoscaracteristicas() {
		$this->load->model('Productos_model');
		$data = $this->Productos_model->listarweb();
		$this->load->model('Caracteristicas_model');
		$data['caracteristicas'] = $this->Caracteristicas_model->listar();
		$this->load->model('Pro_car_model');
		$data['pro_car'] = $this->Pro_car_model->listar();
		$this->load->view('web/encabezado');
		$this->load->view('web/productoscaracteristicas', $data, FALSE); 
		$this->load->view('web/piedepagina');
	}

//---------------------------------------------------------Registrarse
	public function registrarse() {
		if($this->session->userdata('logeado')){
			redirect('','refresh');
			exit();
		}
		$this->load->view('web/encabezado');
		$this->load->view('web/registrarse');
		$this->load->view('web/piedepagina');
	}

}

// End of file Web.php 
// Location: ./application/controllers/Web.php