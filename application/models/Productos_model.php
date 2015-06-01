<?php 
require $_SERVER['DOCUMENT_ROOT'].'/sanosfood/aws/aws-autoloader.php';

use Aws\Common\Aws;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function crear( $nombre = null,
                    $descripcion = null,
                    $ingredientes = null){

        if(strlen($nombre) < 5){
            $data['res'] = 'bad';
            $data['msj'] = 'El nombre del producto debe tener al menos 5 caracteres';
            return $data;
        }
        
        $this->db->where('nombre', $nombre);
        if($this->db->count_all_results('productos')>0){
            $data['res'] = 'bad';
            $data['msj'] = 'ERROR, Ya existe un Producto con este nombre';
            return $data;
        }
        $slug = url_title(limpiarString($nombre),'dash',TRUE);
        $this->db->select('id');
        $this->db->where('nombre', "inactivo");
        $query = $this->db->get('estadosproductos', 1, 0);
        $idinactivo = $query->row()->id;

        $object = array('nombre' => $nombre, 
                        'descripcion' => $descripcion,
                        'ingredientes' => $ingredientes,
                        'idmarca' => "",
                        'precio' => 0,
                        'peso' => 0,
                        'pesoneto' => 0,
                        'largo' => 0,
                        'ancho' => 0,
                        'alto' => 0,
                        'existencias' => 0,
                        'slug' => $slug,
                        'idestadoproducto' => $idinactivo);

        $this->db->insert('productos', $object);
        $id = $this->db->insert_id();
        $data['res'] = 'ok';
        $data['id'] = $id;
        return $data;
    }

//--------------------------------devuelve todos los productos con un estado especifico
    function getProductosPorEstado($estadopro = null, $cant = 10, $pag = 1, $cat = null, $car = null){
        $data['cant'] = $this->db->count_all_results('productos');
        if($estadopro != 'Todos'){
            $this->db->where('idestadoproducto', $estadopro); 
        }
        $this->db->from('productos');
        $this->db->limit($cant,$cant*($pag-1));
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $this->db->select('nombre');
            $this->db->where('id', $row->idestadoproducto);
            $row->nombreestado = $this->db->get('estadosproductos', 1, 0)->row()->nombre;
        }
        $data['productos'] = $query->result();
        return $data;
   }

//--------------------------------Valida campos de Producto con estado diferente de DISPONIBLE
    function editar($dataproducto = null){

        if(json_decode($dataproducto) == null && json_last_error() !== JSON_ERROR_NONE){
            $data['res'] = 'bad';
            $data['msj'] = 'Ha ocurrido un error enviando los datos del producto.';
            return $data;
        }
        $dataproducto = json_decode($dataproducto);
        $datacaracteristicas = $dataproducto->caracteristicas;
        $datacategorias = $dataproducto->categorias;

        $data['est'] = ''; 
        $data['cmp'] = ''; 
        $data['res'] = ''; 

        $objeto = array();
        if (array_key_exists('nombre', $dataproducto)) {
            $nombre = $dataproducto->nombre;
            if ($nombre !== "" AND strlen($nombre) < 8) {
                $data['msj'] = 'El nombre del producto debe tener al menos 8 caracteres';
                $data['res'] = 'bad'; $data['cmp'] = 'nombre'; return $data; 
            } else { $objeto['nombre'] = $nombre;
                     $slug = url_title(limpiarString($nombre),'dash',TRUE);
                     $objeto['slug'] = $slug; }
        }    
        if (array_key_exists('descripcion', $dataproducto)) {
            $descripcion = $dataproducto->descripcion;
            if ($descripcion !== "" AND strlen($descripcion) < 10) {
                $data['msj'] = 'La descripcion del producto debe tener al menos 10 caracteres';
                $data['res'] = 'bad'; $data['cmp'] = 'descripcion'; return $data; 
            } else { $objeto['descripcion'] = $descripcion; }
        } 
        if (array_key_exists('ingredientes', $dataproducto)) {
            $ingredientes = $dataproducto->ingredientes;
            if ($ingredientes !== "" AND strlen($ingredientes) < 10) {
                $data['msj'] = 'Ingredientes del producto debe tener al menos 10 caracteres';
                $data['res'] = 'bad'; $data['cmp'] = 'ingredientes'; return $data; 
            } else { $objeto['ingredientes'] = $ingredientes; }
        }
        if (array_key_exists('peso', $dataproducto)) {
            $peso = $dataproducto->peso;
            if ($peso !== "" AND filter_var($peso, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null) {
                $data['msj'] = 'El Peso del producto debe ser un número entero';
                $data['res'] = 'bad'; $data['cmp'] = 'peso'; return $data; 
            } else { $objeto['peso'] = $peso; }
        }
        if (array_key_exists('pesoneto', $dataproducto)) {
            $pesoneto = $dataproducto->pesoneto;
            if ($pesoneto !== "" AND filter_var($pesoneto, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null) {
                $data['msj'] = 'El Peso Neto del producto debe ser un número entero';
                $data['res'] = 'bad'; $data['cmp'] = 'pesoneto'; return $data; 
            } else { $objeto['pesoneto'] = $pesoneto; }
        }
        if (array_key_exists('largo', $dataproducto)) {
            $largo = $dataproducto->largo;
            if ($largo !== "" AND filter_var($largo, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null) {
                $data['msj'] = 'El Largo del producto debe ser un número entero';
                $data['res'] = 'bad'; $data['cmp'] = 'largo'; return $data; 
            } else { $objeto['largo'] = $largo; }
        }
        if (array_key_exists('ancho', $dataproducto)) {
            $ancho = $dataproducto->ancho;
            if ($ancho !== "" AND filter_var($ancho, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null) {
                $data['msj'] = 'El Ancho del producto debe ser un número entero';
                $data['res'] = 'bad'; $data['cmp'] = 'ancho'; return $data; 
            } else { $objeto['ancho'] = $ancho; }
        }
        if (array_key_exists('alto', $dataproducto)) {
            $alto = $dataproducto->alto;
            if ($alto !== "" AND filter_var($alto, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null) {
                $data['msj'] = 'El Alto del producto debe ser un número entero';
                $data['res'] = 'bad'; $data['cmp'] = 'alto'; return $data; 
            } else { $objeto['alto'] = $alto; }
        }
        if (array_key_exists('idmarca', $dataproducto)) {
            $idmarca = $dataproducto->idmarca;
            $objeto['idmarca'] = $idmarca; 
        }
        if (array_key_exists('precio', $dataproducto)) {
            $precio = $dataproducto->precio;
            if ($precio !== "" AND filter_var($precio, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null) {
                $data['msj'] = 'Ingresa un Precio válido';
                $data['res'] = 'bad'; $data['cmp'] = 'precio'; return $data; 
            } else { $objeto['precio'] = $precio; }
        }
        if (array_key_exists('existencias', $dataproducto)) {
            $existencias = $dataproducto->existencias;
            if ($existencias !== "" AND filter_var($existencias, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null) {
                $data['msj'] = 'Ingresa un valor de Existencias válido';
                $data['res'] = 'bad'; $data['cmp'] = 'existencias'; return $data; 
            } else { $objeto['existencias'] = $existencias; }
        }

        $this->db->select('idestadoproducto');
        $this->db->where('id', $dataproducto->id);
        $query = $this->db->get('productos', 1, 0);
        $idestadoproducto = $query->row()->idestadoproducto;

        $this->db->select('id');
        $this->db->where('nombre', "inactivo");
        $query = $this->db->get('estadosproductos', 1, 0);
        if ($query->num_rows() == 0) {
            $data['msj'] = 'No se encuentra el estado inactivo en estadosproductos';
            $data['res'] = 'bad'; return $data; 
        }

        $idinactivo = $query->row()->id;

        $this->db->select('id');
        $this->db->where('nombre', "disponible");
        $query = $this->db->get('estadosproductos', 1, 0);
        if ($query->num_rows() == 0) {
            $data['msj'] = 'No se encuentra el estado disponible en estadosproductos';
            $data['res'] = 'bad'; return $data; 
        }
        $iddisponible = $query->row()->id;

        $this->db->trans_start();

        if (count($objeto) > 0) {
            if ($idestadoproducto == $iddisponible) {
                $objeto['idestadoproducto'] = $idinactivo;
                $data['est'] = $idinactivo; 
            }
            $this->db->where('id', $dataproducto->id);
            $this->db->update('productos', $objeto);
        }

        //--------------------------------Borrado y grabado de nuevas categorias del producto
        $this->db->where('idproducto', $dataproducto->id);
        $this->db->delete('pro_cat');
        foreach ($datacategorias as $categoria) {
            $object = array('idproducto' => $dataproducto->id,
                            'idcategoria' => $categoria->idcategoria);
            $this->db->insert('pro_cat', $object);
        }

        //--------------------------------Borrado y grabado de nuevas caracteristicas del producto
        $this->db->where('idproducto', $dataproducto->id);
        $this->db->delete('pro_car');
        foreach ($datacaracteristicas as $caracteristica) {
            $object = array('idproducto' => $dataproducto->id,
                            'idcaracteristica' => $caracteristica->idcaracteristica,
                            'tipo' => $caracteristica->valor);
            $this->db->insert('pro_car', $object);
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $data['msj'] = 'hay errores en la actualizacion de la Base de Datos.';
            $data['res'] = 'bad'; 
            return $data; 
        }

        $data['res'] = 'ok'; 
        return $data; 

    }


//--------------------------------Valida campos de Producto con estado DISPONIBLE
    function editarestado( $id = null){

        $this->db->where('id', $id);
        $query = $this->db->get('productos', 1, 0);
        $producto = $query->row();
 
        if (strlen($producto->nombre) < 5) {
            $data['msj'] = 'El nombre del producto debe tener al menos 5 caracteres';
            $data['res'] = 'bad'; $data['cmp'] = 'nombre';
            return $data; 
        }    
        if (strlen($producto->descripcion) < 10) {
            $data['msj'] = 'La descripcion del producto debe tener al menos 10 caracteres';
            $data['res'] = 'bad'; $data['cmp'] = 'descripcion';
            return $data; 
        } 
        if (strlen($producto->ingredientes) < 10) {
            $data['msj'] = 'Ingredientes del producto debe tener al menos 10 caracteres';
            $data['res'] = 'bad'; $data['cmp'] = 'ingredientes'; 
            return $data; 
        }
        if (filter_var($producto->peso, FILTER_VALIDATE_INT) == null) {
            $data['msj'] = 'El Peso del producto debe ser un número entero';
            $data['res'] = 'bad'; $data['cmp'] = 'peso'; 
            return $data; 
        }
        if (filter_var($producto->pesoneto, FILTER_VALIDATE_INT) == null) {
            $data['msj'] = 'El Peso Neto del producto debe ser un número entero';
            $data['res'] = 'bad'; $data['cmp'] = 'pesoneto'; 
            return $data; 
        }
        if (filter_var($producto->idmarca, FILTER_VALIDATE_INT) == null OR $producto->idmarca == 0) {
            $data['msj'] = 'La marca del producto debe ser una de las opciones';
            $data['res'] = 'bad'; $data['cmp'] = 'idmarca';
            return $data; 
        }
        if (filter_var($producto->largo, FILTER_VALIDATE_INT) == null) {
            $data['msj'] = 'El Largo del producto debe ser un número entero';
            $data['res'] = 'bad'; $data['cmp'] = 'largo';
            return $data; 
        }    
        if (filter_var($producto->ancho, FILTER_VALIDATE_INT) == null) {
            $data['msj'] = 'El Ancho del producto debe ser un número entero';
            $data['res'] = 'bad'; $data['cmp'] = 'ancho'; 
            return $data; 
        }
        if (filter_var($producto->alto, FILTER_VALIDATE_INT) == null) {
            $data['msj'] = 'El Alto del producto debe ser un número entero';
            $data['res'] = 'bad'; $data['cmp'] = 'alto'; 
            return $data; 
        }
        if (filter_var($producto->precio, FILTER_VALIDATE_INT, 1) == null) {
            $data['msj'] = 'Ingresa un Precio válido';
            $data['res'] = 'bad'; $data['cmp'] = 'precio'; 
            return $data; 
        }
        if (filter_var($producto->existencias, FILTER_VALIDATE_INT, 1) == null) {
            $data['msj'] = 'Existencias debe ser un número entero';
            $data['res'] = 'bad'; $data['cmp'] = 'existencias'; 
            return $data; 
        }

        $this->db->where('idproducto', $producto->id);
        if($this->db->count_all_results('pro_cat') == 0){
            $data['msj'] = 'El Producto debe pertenecer a alguna Categoria';
            $data['res'] = 'bad'; $data['cmp'] = ''; 
            return $data; 
        }

        $objeto = array();
        $objeto['idestadoproducto'] = 1;
        $this->db->where('id', $producto->id);
        $this->db->update('productos', $objeto);
        $data['res'] = 'ok'; 
        return $data; 
    }


//--------------------------------Listar
    function listar($cant = 10, $pag = 1, $cat = null, $car = null){
        $data['cant'] = $this->db->count_all_results('productos');
    	if($cat!= null){
    			}

		if($car != null){
				}

		$this->db->from('productos');
		$this->db->limit($cant,$cant*($pag-1));
		$query = $this->db->get();
        foreach ($query->result() as $row) {
            $this->db->select('nombre');
            $this->db->where('id', $row->idestadoproducto);
            $row->nombreestado = $this->db->get('estadosproductos', 1, 0)->row()->nombre;
        }
        $data['productos'] = $query->result();
		return $data;
    }

//--------------------------------Obtiene un producto
    function producto($id = null){
    	$this->db->where('id', $id);
    	$query = $this->db->get('productos', 1, 0);
        $producto = $query->row();
//        $this->db->select('nombre');
//        $this->db->where('id', $producto->idmarca);
//        $producto->marca = $this->db->get('marcas', 1, 0)->row()->nombre;
        $this->db->where('idProducto', $producto->id);
        $producto->caracteristicas = $this->db->get('pro_car')->result();
        $this->db->where('idProducto', $producto->id);
        $producto->categorias = $this->db->get('pro_cat')->result();
    	return $producto;
    }
    
    function buscar($query=null){
        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'B', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y','"'=>'',"'"=>"","¿"=>"" );
        $query_filtrado = strtr( $queryInput, $unwanted_array );
        $query_filtrado = trim(preg_replace("/\b[^\s]{1,2}\b/", "", $query_filtrado));

        $this -> db -> where('MATCH (nombre,descripcion) AGAINST ("' . utf8_encode($query_filtrado) . '")', NULL, FALSE);
        $query = $this -> db -> get('productos');
        return $query->result();
    }

    function agregarfoto($idproducto = null){
        if($idproducto==null){
            $data['res'] = 'bad';
            $data['msj'] = 'Error, producto sin id';
            //return $data; 
        }
        $destino_path = "temp/";
        $path = $_FILES['userfile']['name'];
        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        $destino_path = $destino_path . $idProducto .'.'.$ext;

        if((!empty($_FILES["userfile"])) && ($_FILES['userfile']['error'] == 0)) {
            if (($ext == "jpg" || $ext =="png" || $ext =="jpeg") && ($_FILES["userfile"]["type"] == "image/jpeg" || $_FILES["userfile"]["type"] == "image/png") && ($_FILES["userfile"]["size"] < 100000000)) {

                /*$archivoEntrada = $_FILES['userfile']['tmp_name'];
                $archivoSalida = $target_path2;
                $image = new Imagick($inFile);
                $image->thumbnailImage(110, 110);
                $image->writeImage($outFile);*/
            }
        }

    }

} 

/* End of file Productos_model.php */
/* Location: ./application/models/Productos_model.php */