<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	function __construct() { parent::__construct(); }

//--------------------------------Encuentra un usuario por el id
    function get($id=null){
        $this->db->where('id', $id);
        $query = $this->db->get('usuarios', 1, 0);
        if($query->num_rows()!=1){
            return false;
        }
        return $query->row();
    }

//--------------------------------Busca un usuarios por el usuario o email
    function encontrar($usuario = null){
        $this->db->where('usuario', $usuario);
        $query = $this->db->get('usuarios', 1, 0);
        if($query->num_rows()!=1){
            return false;
        }
        return $query->row();
    }

//--------------------------------Lista todos usuarios de usuarios
    function listar(){
        $this->db->order_by('nombres', 'asc');
    	$query = $this->db->get('usuarios');
    	return $query->result();
    }

//--------------------------------Actualiza la informacion del usuario web
    function actualizar($idusuario = null, $nombre = null, $usuario = null, $email = null, $celular = null, $telefono = null,
                        $tipodcto = null, $nrodcto = null, $ultimadireccion = null) {

        if ($email == "") {
            $data['msj'] = 'Email borrado, Desea Borra toda la Cuenta?';
            $data['res'] = 'wrn';
            return $data; 
        }

        $objeto = array();
        $objeto['nombre'] = $nombre;
        $objeto['tipo_identidad'] = $tipodcto;
        $objeto['nro_identidad'] = $nrodcto;
        $objeto['correo'] = $email;
        $objeto['usuario'] = $usuario;
        $objeto['telefono'] = $telefono;
        $objeto['celular'] = $celular;
        $objeto['ultima_direccion'] = $ultimadireccion;

        $this->db->trans_start();
            $this->db->where('id', $idusuario);
            $this->db->update('usuarios', $objeto);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $data['msj'] = 'Error actualizando BD usuarios';
            $data['res'] = 'bad';
        } else { $data['res'] = 'bad'; }

        $data['res'] = 'ok'; 
        return $data; 
    }

//--------------------------------Valida campos de Producto con estado diferente de DISPONIBLE
    function editar($id = NULL, $atributo = NULL, $valor = NULL){
        if($id != NULL AND $atributo != NULL AND $valor != NULL){
            $this->db->trans_start();
            $object = array($atributo => $valor);
            $this->db->where('id', $id);
            $this->db->update('usuarios', $object);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                return array('res'=>'bad','msj'=>'Error en la edición.'); }
            else {return array('res'=>'ok'); }
        }
    }

//--------------------------------borra un usuario por el id
    function eliminar($id = null){
        if($id == null){
            return array('res'=>'bad','msj'=>'Error en la inserción.'); }
        $this->db->where('id', $id);
        $this->db->delete('usuarios');
        return array('res'=>'ok');
    }

//--------------------------------Logea un usuario web
    function web_logear($usuario = null, $clave = null) {
        $this->db->select('id, clave')->from('usuarios')->where('usuario', $usuario)->limit(1, 0);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            $data['res'] = 'bad';
            $data['msj'] = 'No existe este nombre de usuario';
            return $data;
        }
        
        $row = $query->row();
        $this->load->helper('security');
        if (verificar($clave, $row->clave)) {
            $this->session->set_userdata('logeado',true);
            $this->session->set_userdata('idusuario',$row->id);
            $this->session->set_userdata('usuario',$usuario);
            $data['res'] = 'ok';
            return $data;
        }
        $data['res'] = 'bad';
        $data['msj'] = 'Usuario o Clave invalido';
        return $data;
    }

//--------------------------------Crea un nuevo usuario web
    function crear($email = null, $usuario = null, $clave = null) {

        $this->db->where('usuario', $usuario);
        if($this->db->count_all_results('usuarios') > 0) {
            $data['res'] = 'bad';
            $data['msj'] = 'Ya existe un Usuario con este nombre';
            return $data;
        }

        $this->load->helper('security');


        $object = array('correo' => $email, 'usuario' => $usuario, 'clave' => encriptar($clave));

        $this->db->insert('usuarios', $object);

        $this->session->set_userdata('logeado',true);
        $this->session->set_userdata('usuario',$usuario);

        $data['res'] = 'ok';
        return $data;
    }

//--------------------------------Crea un nuevo usuario web
    function cambiarclave($idusuario = null, $claveactual = null, $nuevaclave = null) {

        $this->db->select('clave')->from('usuarios')->where('id', $idusuario)->limit(1, 0);
        $query = $this->db->get();

        $row = $query->row();
        $this->load->helper('security');
        if (!verificar($claveactual, $row->clave)) {
            $data['res'] = 'bad';
            $data['msj'] = 'Contraseña Actual es invalida';
            return $data;
        }

        $objeto = array('clave'=>encriptar($nuevaclave));
        $this->db->where('id', $idusuario);
        $this->db->update('usuarios', $objeto);

        $data['res'] = 'ok';
        $data['msj'] = 'Contraseña cambiada correctamente';
        return $data;
    }

//--------------------------------Busca usuarios por nombre parcial para admin
    function buscar($query = ''){
        if($query ==""){ $data['usuarios'] = array(); }
        
        if($query =="*") {
            $query = $this->db->query(" SELECT id,nombres,apellidos,usuario,correo,ciudad
                                        FROM usuarios;");
            return $query->result();
        }

        $palabras = preg_split("/ (.| ) /", $query);
        $against = "";
        foreach ($palabras as $palabra) {
            $against .= $palabra.'* ';
        }
        $query = $this->db->query(" SELECT id,nombres,apellidos,usuario,correo,ciudad
                                    FROM usuarios
                                    WHERE MATCH(nombres,apellidos,usuario,correo,ciudad) AGAINST ('$against' IN BOOLEAN MODE);");
        return $query->result();
    }
}

/* End of file Caracteristicas_model.php */
/* Location: ./application/models/Caracteristicas_model.php */