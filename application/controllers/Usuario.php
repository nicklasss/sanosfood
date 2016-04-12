<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index() {}

//---------------------------------------------------------buscar
	public function buscar(){
		$query = $this->input->post('query',TRUE);
		
		$this->load->model('Usuarios_model');
		$data['usuarios'] = $this->Usuarios_model->buscar($query);

		print json_encode(array('res'=>'ok','usuarios'=>$data['usuarios']));
	}

//---------------------------------------------------------buscar
    public function encontrar(){
        $usuario = $this->input->post('usuario',TRUE);
        
        $this->load->model('Usuarios_model');
        $data['usuario'] = $this->Usuarios_model->encontrar($usuario);
        print json_encode(array('res'=>'ok','usuario'=>$data['usuario']));
    }

//---------------------------------------------------------buscar
    public function crear() {
        $email      = @$this->input->post('email',TRUE);
        $usuario    = $email;
        $clave      = @$this->input->post('clave',TRUE);

 		$this->load->model('Usuarios_model');
		$data = $this->Usuarios_model->crear($email, $usuario, $clave);

        print json_encode(array('res'=>$data['res'],'msj'=>$data['msj']));
    }

//---------------------------------------------------------buscar
    public function cambiarclave() {
        $idusuario    = @$this->input->post('idusuario',TRUE);
        $claveactual  = @$this->input->post('claveactual',TRUE);
        $nuevaclave   = @$this->input->post('nuevaclave',TRUE);

        $this->load->model('Usuarios_model');
        $data = $this->Usuarios_model->cambiarclave($idusuario, $claveactual, $nuevaclave);

        if ($data['res'] == "bad") {
            print json_encode(array('res'=>$data['res'],'msj'=>$data['msj']));
        } else {
            print json_encode(array('res'=>$data['res']));
        }
    }

//---------------------------------------------------------buscar
    public function cambiarclaveolvido() {
        $llave   = @$this->input->post('llave',TRUE);
        $nuevaclave   = @$this->input->post('nuevaclave',TRUE);

        $this->load->model('Usuarios_model');
        $data = $this->Usuarios_model->cambiarclaveolvido($llave, $nuevaclave);

        if ($data['res'] == "bad") {
            print json_encode(array('res'=>$data['res'],'msj'=>$data['msj']));
        } else {
            print json_encode(array('res'=>$data['res']));
        }
    }

//---------------------------------------------------------buscar
    public function actualizar() {
        $idusuario  = @$this->input->post('idusuario',TRUE);
        $nombre     = @$this->input->post('nombre',TRUE);
        $email      = @$this->input->post('email',TRUE);
        $usuario    = $email;
        $celular    = @$this->input->post('celular',TRUE);
        $telefono   = @$this->input->post('telefono',TRUE);
        $tipodcto   = @$this->input->post('tipodcto',TRUE);
        $nrodcto    = @$this->input->post('nrodcto',TRUE);
        $ultimadireccion = @$this->input->post('ultimadireccion',TRUE);
        
        if(!$this->session->userdata('logeado')){
            print json_encode(array('res'=>'bad','msj'=>'No autorizado.'));
        }

        $this->load->model('Usuarios_model');
        print json_encode($this->Usuarios_model->actualizar($idusuario, $nombre, $usuario, $email, $celular, 
                                                            $telefono, $tipodcto, $nrodcto, $ultimadireccion));
    }

//---------------------------------------------------------buscar
    public function eliminar(){
        if(!$this->session->userdata('logeado')) {
            $data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
        }
        
        $idusuario = @$this->input->post('idusuario',TRUE);
        $this->load->model('Usuarios_model');
        $data['resultado'] = $this->Usuarios_model->eliminar($idusuario);
        print json_encode($data['resultado']);

                $this->session->set_userdata('usuario',"");
        redirect('','refresh');
    }

//---------------------------------------------------------buscar
    public function web_logear() {
        $usuario = @$this->input->post('usuario',TRUE);
        $clave = @$this->input->post('clave',TRUE);

        $this->load->model('Usuarios_model');
        $data = $this->Usuarios_model->web_logear($usuario,$clave);

        if ($data['res'] == "bad") {
            print json_encode(array('res'=>$data['res'],'msj'=>$data['msj'], 'err'=>$data['err']));
        } else {
            print json_encode(array('res'=>$data['res']));
        }
    }
}

/* End of file Usuario.php */
/* Location: ./application/controllers/Usuario.php */