<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_model extends CI_Model {

    function __construct() {  parent::__construct(); }
    
    function validarUsuario() {
        $usuario = @$this->input->post('usuario',TRUE);
        $clave = @$this->input->post('clave',TRUE);
        if(strlen($clave)<6 or strlen($usuario)<4){
        return false;}

        $this->db->select('clave')->from('usuarios')->where('usuario', $usuario)->limit(1, 0);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {return false; } 

        $row = $query->row();

        if($row->clave== sha1(sha1($usuario).'sal sanosfood'.sha1($clave))) {
            $this->session->set_userdata('logeado',true);
            $this->session->set_userdata('usuario',$usuario);
            return true; }

        return false;
    }


}