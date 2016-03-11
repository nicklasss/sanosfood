<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
		
	}
	public function buscar(){
		$query = $this->input->post('query',TRUE);
		
		$this->load->model('Usuarios_model');
		$data['usuarios'] = $this->Usuarios_model->buscar($query);

		print json_encode(array('res'=>'ok','usuarios'=>$data['usuarios']));
//		$this->load->view('usuario/buscar', $data, FALSE);
	}

    function crear() {
        $nombres    = @$this->input->post('nombres',TRUE);
        $apellidos  = @$this->input->post('apellidos',TRUE);
        $email      = @$this->input->post('email',TRUE);
        $usuario    = $email;
        $clave      = @$this->input->post('clave',TRUE);
        $cedula     = @$this->input->post('cedula',TRUE);
        $telefono   = @$this->input->post('telefono',TRUE);
        $celular    = @$this->input->post('celular',TRUE);
        $direccion  = @$this->input->post('direccion',TRUE);
        $barrio     = @$this->input->post('barrio',TRUE);
        $ciudad     = @$this->input->post('ciudad',TRUE);
        $pais       = @$this->input->post('pais',TRUE);
        $departamento  = @$this->input->post('departamento',TRUE);

 		$this->load->model('Usuarios_model');
		$data = $this->Usuarios_model->crear($nombres,$apellidos,$email,$usuario,$clave,$cedula,$telefono,$celular,
														  $direccion,$barrio,$ciudad,$pais,$departamento);

        if ($data['res'] == "bad") {
            print json_encode(array('res'=>$data['res'],'msj'=>$data['msj']));
        } else {
            print json_encode(array('res'=>$data['res']));
        }

    }

    function logear() {
        $usuario = @$this->input->post('usuario',TRUE);
        $clave = @$this->input->post('clave',TRUE);

        $this->load->model('Usuarios_model');
        $data = $this->Usuarios_model->logear($usuario,$clave);

        if ($data['res'] == "bad") {
            print json_encode(array('res'=>$data['res'],'msj'=>$data['msj']));
        } else {
            print json_encode(array('res'=>$data['res']));
        }

    }

}

/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */