<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function crear( $nombre = null,
                    $descripcion = null,
                    $ingredientes = null,
                    $precio = null,
                    $marca = null,
                    $pesoneto = null,
                    $peso = null,
                    $largo = null,
                    $ancho = null,
                    $alto = null,
                    $existencias = null,
                    $estado = null,
                    $datacaracteristicas = null,
                    $datacategorias = null){
        if($nombre == null OR strlen($nombre)<5){
            $data['res'] = 'bad';
            $data['msj'] = 'Ingresa un nombre válido';
            return $data;
        }
        if($descripcion == null OR strlen($descripcion)<20){
            $data['res'] = 'bad';
            $data['msj'] = 'Ingresa una descripción con más de 20 caracteres';
            return $data;
        }
        if($ingredientes == null OR strlen($ingredientes)<20){
            $data['res'] = 'bad';
            $data['msj'] = 'Ingresa ingredientes con más de 20 caracteres';
            return $data;
        }
        if($precio == null OR filter_var($precio, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null){
            $data['res'] = 'bad';
            $data['msj'] = 'Ingresa un precio válido';
            return $data;
        }
        if($marca == null){
            $data['res'] = 'bad';
            $data['msj'] = 'Debes asociar este producto a una marca.';
            return $data;
        }
        if($pesoneto==null OR filter_var($pesoneto, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null){
            $data['res'] = 'bad';
            $data['msj'] = 'Ingresa un peso neto válido.';
            return $data;
        }
        if($peso==null OR filter_var($peso, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null){
            $data['res'] = 'bad';
            $data['msj'] = 'Ingresa un peso válido.';
            return $data;
        }
        if($estado == null){
            $data['res'] = 'bad';
            $data['msj'] = 'Ingresa un estado válido';
            return $data;
        }
        if(filter_var($largo, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null OR $largo == null){
            $largo = 0;
        }
        if(filter_var($ancho, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null OR $ancho == null){
            $ancho = 0;
        }
        if(filter_var($alto, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null OR $alto == null){
            $alto = 0;
        }
        if(filter_var($existencias, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) == null OR $existencias == null){
            $existencias = 0;
        }

        if(json_decode($datacaracteristicas) == null){
            $data['res'] = 'bad';
            $data['msj'] = 'Ha ocurrido un error enviando los datos de caracteristicas.';
            return $data;
        }
        $datacaracteristicas = json_decode($datacaracteristicas);

        if(json_decode($datacategorias) == null){
            $data['res'] = 'bad';
            $data['msj'] = 'Ha ocurrido un error enviando los datos de categorias.';
            return $data;
        }
        $datacategorias = json_decode($datacategorias);

        $data['res'] = 'ok';
        return $data;
    }

    function listar($cant = 10, $pag = 1, $cat = null, $car = null){
        $data['cant'] = $this->db->count_all_results('productos');
    	if($cat!= null){
    			}

		if($car != null){
				}

		$this->db->from('productos');
		$this->db->limit($cant,$cant*($pag-1));
		$query = $this->db->get();
        $data['productos'] = $query->result();
		return $data;
    }
    function producto($id = null){
    	$this->db->where('id', $id);
    	$query = $this->db->get('productos', 1, 0);
        $producto = $query->row();
        $this->db->select('nombre');
        $this->db->where('id', $producto->id_marca);
        $producto->marca = $this->db->get('marcas', 1, 0)->row()->nombre;
        $this->db->where('idProducto', $producto->id);
        $producto->caracteristicas = $this->db->get('pro_car')->result();
        $this->db->where('idProducto', $producto->id);
        $producto->categorias = $this->db->get('pro_cat')->result();
    	return $producto;
    }
    function editar($id = NULL, $atributo = NULL, $valor = NULL){
        if($id != NULL AND $atributo != NULL AND $valor != NULL){
            $this->db->trans_start();
            if($atributo=='nombre'){
                $slug = url_title($valor, 'dash', true);
                $object = array($atributo => $valor, 'slug' => $slug); }
            else {$object = array($atributo => $valor); }
            $this->db->where('id', $id);
            $this->db->update('productos', $object);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                return array('res'=>'bad','msj'=>'Error en la edición.'); }
            else {return array('res'=>'ok'); }
        }
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

}

/* End of file Productos_model.php */
/* Location: ./application/models/Productos_model.php */