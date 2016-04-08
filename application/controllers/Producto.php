<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function index() { }

//--------------------------------Crear nuevo producto
	public function crear(){
		$nombre = @$this->input->post('nombre',TRUE);
		$descripcion = @$this->input->post('descripcion',TRUE);
		$ingredientes = @$this->input->post('ingredientes',TRUE);
		$this->load->model('Productos_model');
		$data = $this->Productos_model->crear($nombre,$descripcion,$ingredientes);

		if ($data['res'] == "bad") {
			print json_encode(array('res'=>$data['res'],'msj'=>$data['msj']));
		} else {
			print json_encode(array('res'=>$data['res'],'id'=>$data['id']));
		}
	}

//-------------------------------- SUBIR IMAGENES
	public function subirImagen(){
        $idproducto = @$this->input->post('idproducto',TRUE);
		if((!empty($_FILES["userfile"])) && ($_FILES['userfile']['error'] == 0)) {
			$filename = basename($_FILES['userfile']['name']);
			$ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
			$tamano = 2000*1024;
			$ext_permitidas = array('jpg','jpeg','gif','png');
			if ((!in_array(strtolower($ext), $ext_permitidas))) {
				$this->session->set_flashdata('error', "Error: solamente imagenes jpg, jpeg, gif o png son aceptadas para subir");
			} else {
				if (!($_FILES["userfile"]["size"] < $tamano)) {
					$this->session->set_flashdata('error', "Error: solamente imagenes menores a: ".$tamano." son aceptadas para subir"); 
				} else {
					$this->load->model('Productos_model');
					$data = $this->Productos_model->guardarImagen($idproducto, $ext);		//graba en la base de datos la direccion de la imagen
					$nombre = $data['id'];
					$direccion = base_url() . "images/" . $nombre . "." . $ext;
					$newname = FCPATH.'images/' . $nombre . "." . $ext;  
					if ((move_uploaded_file($_FILES['userfile']['tmp_name'],$newname))) {   //Intenta cargar el archivo al destino
						$this->session->set_flashdata('ok', "Archivo subido correctamente como: <br>".$direccion);
					}
				}
			}
		} else { 
			$this->session->set_flashdata('error', "Error: No se a subido el archivo");
		}
		redirect('admin/producto/'.$idproducto,'refresh');
	}

//--------------------------------BORRAR IMAGENES
	public function borrarImagen(){
        $idproducto = $this->input->post('numproducto',TRUE);
        $tituloimagen = $this->input->post('titimagen',TRUE);
		$this->load->model('Productos_model');
		$data = $this->Productos_model->borrarImagen($tituloimagen);		
		$imagen = $data['imagen'];

		redirect('admin/producto/'.$idproducto,'refresh');
	}

//--------------------------------Lista con paginacion PRODUCTOS por Categoria o por estado
	public function listar(){
		$cant = @$this->input->post('cant');
		$pagina = @$this->input->post('pagina');
		$idcategoria = @$this->input->post('idcategoria');
		$idmarca = @$this->input->post('idmarca');
		$nomestado = @$this->input->post('nomestado');
		$this->load->model('Productos_model');
		
		if ($nomestado == "Todos") {
			$data = $this->Productos_model->listar($cant, $pagina, $idcategoria, $idmarca);}
		else {
			$data = $this->Productos_model->getProductosPorEstado($nomestado, $cant, $pagina);
		}

		if(count($data['productos'])==0){
			print json_encode(array('res'=>'bad','msj'=>'Sin resultados'));
		}
		print json_encode(array('res'=>'ok','productos'=>$data['productos'],'cant'=>$data['cant']));
	}

//--------------------------------Lista para Web con paginacion PRODUCTOS por Categoria 
	public function listarxCategoriaWeb(){
		$idcategoria = @$this->input->post('idcategoria');
		$ppp = @$this->input->post('ppp');
		$pag = @$this->input->post('pag');
		$this->load->model('Productos_model');
		$data['productos'] = $this->Productos_model->listarxCategoriaWeb($idcategoria, $pag, $ppp);
		$data['cant'] = $this->Productos_model->contarProductosCategoria($idcategoria);
		if(count($data['productos'])==0){
			print json_encode(array('res'=>'bad','msj'=>'Sin resultados'));exit();
		}
		print json_encode(array('res'=>'ok','productos'=>$data['productos'],'cant'=>$data['cant'],));exit();
	}

//--------------------------------Lista para Web con paginacion PRODUCTOS por Marca 
	public function listarxMarcaWeb(){
		$idmarca = @$this->input->post('idmarca');
		$ppp = @$this->input->post('ppp');
		$pag = @$this->input->post('pag');
		$this->load->model('Productos_model');
		$data['productos'] = $data = $this->Productos_model->listarxMarcaWeb($idmarca, $pag, $ppp);
		$data['cant'] = $this->Productos_model->contarProductosMarca($idmarca);
		if(count($data['productos'])==0){
			print json_encode(array('res'=>'bad','msj'=>'Sin resultados'));exit();
		}
		print json_encode(array('res'=>'ok','productos'=>$data['productos'],'cant'=>$data['cant'],));exit();
	}

//--------------------------------busca productos por nomre o descripcion a partir de sarta 
	public function buscar() {
		$quebuscar = @$this->input->post('quebuscar');
		$ppp = @$this->input->post('ppp');
		$pag = @$this->input->post('pag');
		$this->load->model('Productos_model');
		$data['productos'] = $this->Productos_model->buscarProductosWeb($quebuscar, $pag, $ppp);
		$data['cant'] = $this->Productos_model->contarProductosBuscar($quebuscar);
		if(count($data['productos'])==0){
			print json_encode(array('res'=>'bad','msj'=>'Sin resultados'));exit();
		}
		print json_encode(array('res'=>'ok','productos'=>$data['productos'],'cant'=>$data['cant']));exit();
	}

//--------------------------------Edita los campos de un producto 
	public function editar(){
		if(!$this->session->userdata('logeado_admin')){
			print json_encode(array('res'=>'bad','msj'=>'No autorizado.'));
		}
		$dataproducto = @$this->input->post('dataproducto',TRUE);
		$this->load->model('Productos_model');
		print json_encode($this->Productos_model->editar($dataproducto));
	}

//--------------------------------Edita el estado de un producto 
	public function editarestado(){
		if(!$this->session->userdata('logeado_admin')){
			print json_encode(array('res'=>'bad','msj'=>'No autorizado.'));
		}
		$id = @$this->input->post('id',TRUE);
		$estado = @$this->input->post('estado',TRUE);
		$this->load->model('Productos_model');
		print json_encode($this->Productos_model->editarestado($id, $estado));
	}
}

/* End of file producto.php */
/* Location: ./application/controllers/producto.php */