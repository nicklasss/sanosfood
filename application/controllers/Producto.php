<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function index()
	{
		
	}

	public function crear(){
		$nombre = @$this->input->post('nombre',TRUE);
		$descripcion = @$this->input->post('descripcion',TRUE);
		$ingredientes = @$this->input->post('ingredientes',TRUE);
		$this->load->model('Productos_model');
		$data = $this->Productos_model->crear($nombre,$descripcion,$ingredientes);
		$this->load->view('producto/crear', $data, FALSE);
	}

	public function listar(){
		$cant = @$this->input->post('cant');
		$pagina = @$this->input->post('pagina');
		$idcategoria = @$this->input->post('idcategoria');
		$idmarca = @$this->input->post('idmarca');
		$this->load->model('Productos_model');
		$data = $this->Productos_model->listar($cant, $pagina, $idcategoria, $idmarca);
		if(count($data['productos'])==0){
			print json_encode(array('res'=>'bad','msj'=>'Sin resultados'));exit();
		}
		print json_encode(array('res'=>'ok','productos'=>$data['productos'],'cant'=>$cant));exit();
	}

	public function editar(){
		if(!$this->session->userdata('logeado_admin')){
			print json_encode(array('res'=>'bad','msj'=>'No autorizado.'));
		}
		$dataproducto = @$this->input->post('dataproducto',TRUE);
		$this->load->model('Productos_model');
		print json_encode($this->Productos_model->editar($dataproducto));
	}

	public function listarProductosxCategoria(){
		$idcategoria = @$this->input->post('idcategoria');
		$this->load->model('Productos_model');
		print json_encode($this->Productos_model->listarxCategoria($idcategoria));
	}

	public function listarProductosxMarca(){
		$idmarca = @$this->input->post('idmarca');
		$this->load->model('Productos_model');
		print json_encode($this->Productos_model->listar($idmarca));
	}

	public function editarestado(){
		if(!$this->session->userdata('logeado_admin')){
			print json_encode(array('res'=>'bad','msj'=>'No autorizado.'));
		}
		$id = @$this->input->post('id',TRUE);
		$this->load->model('Productos_model');
		print json_encode($this->Productos_model->editarestado($id));
	}

	public function agregarfoto(){
		if(!$this->session->userdata('logeado_admin')){
			print json_encode(array('res'=>'bad','msj'=>'No autorizado.'));
		}
		$idproducto = @$this->input->post('idproducto',TRUE);
		$this->load->model('Productos_model');
		$this->Productos_model->agregarfoto($idproducto);
	}	

}

/* End of file producto.php */
/* Location: ./application/controllers/producto.php */