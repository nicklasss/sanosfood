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
        $email      = @$this->input->post('email',TRUE);
        $usuario    = $email;
        $clave      = @$this->input->post('clave',TRUE);

 		$this->load->model('Usuarios_model');
		$data = $this->Usuarios_model->crear($email,$usuario,$clave);

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