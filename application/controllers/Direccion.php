<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direccion extends CI_Controller {

	public function index() {}

//----------------------------------------------------------------------------------funcion crear
    function crear() {
        $idusuario		= @$this->input->post('idusuario',TRUE);
        $nombre			= @$this->input->post('nombre',TRUE);
        $direccion  	= @$this->input->post('direccion',TRUE);
        $barrio     	= @$this->input->post('barrio',TRUE);
        $ciudad     	= @$this->input->post('ciudad',TRUE);
        $region     	= @$this->input->post('region',TRUE);
        $pais       	= @$this->input->post('pais',TRUE);

 		$this->load->model('Direcciones_model');
		$data = $this->Direcciones_model->crear($idusuario, $nombre, $direccion, $barrio, $ciudad, $region, $pais);

        if ($data['res'] == "bad") {
            print json_encode(array('res'=>$data['res'],'msj'=>$data['msj']));
        } else {
            print json_encode(array('res'=>$data['res'], 'id'=>$data['id']));
        }
    }

//----------------------------------------------------------------------------------funcion actualizar
    function actualizar() {
        $id  			= @$this->input->post('id',TRUE);
        $nombre			= @$this->input->post('nombre',TRUE);
        $direccion  	= @$this->input->post('direccion',TRUE);
        $barrio     	= @$this->input->post('barrio',TRUE);
        $ciudad     	= @$this->input->post('ciudad',TRUE);
        $region     	= @$this->input->post('region',TRUE);
        $pais       	= @$this->input->post('pais',TRUE);
        
        if(!$this->session->userdata('logeado')){
            print json_encode(array('res'=>'bad','msj'=>'No autorizado.'));
        }

        $this->load->model('Direcciones_model');
        print json_encode($this->Direcciones_model->actualizar($id, $nombre, $direccion, $barrio, $ciudad, $region, $pais));
    }

//----------------------------------------------------------------------------------funcion eliminar
	public function eliminar(){
		if(!$this->session->userdata('logeado')) {
			$data['resultado'] = array('res'=>'bad','msj'=>'No autorizado.');
		}
		
		$id = @$this->input->post('id',TRUE);
		$this->load->model('Direcciones_model');
		$data['resultado'] = $this->Direcciones_model->eliminar($id);
		print json_encode($data['resultado']);
//		$this->load->view('marca/eliminar', $data, FALSE);
	}
}

/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */
