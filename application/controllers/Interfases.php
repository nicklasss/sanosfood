<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interfases extends CI_Controller {

	public function index() { }

//---------------------------------------------------------prueba
// funcion para pruebas de cosas para mostrar en el navegador	
	public function prueba() {
		$clave = $this->uri->segment(1);
		$correo = "hlduran@hotmail.com";
		print($clave);
	}

//---------------------------------------------------------(CRON) cada1minuto
	public function cada1minuto() {
		$fecha = date('Y-m-d H:i:s');
		$this->load->model('Pedidos_model');
		$data['pedidos'] = $this->Pedidos_model->pedidosPendientesBorrables();

        $this->db->trans_start();      //======================== INICIA TRANSACCION

		foreach($data['pedidos'] as $pedido) {
			//----- agregar los eliminados al stock del producto
			$this->load->model('Lineaspedidos_model');
			$data = $this->Lineaspedidos_model->listar($pedido->id);
			foreach($data['lineas'] as $linea) {
				$this->load->model('Productos_model');
				$this->Productos_model->modificarStocK($linea->id_producto, -$linea->unidades);
			}

			//-------------borrar el pedido
	        $this->load->model('Pedidos_model');
	        $this->Pedidos_model->eliminar($pedido->id);

			//-------------borrar las lineas del pedido
	        $this->load->model('Lineaspedidos_model');
	        $this->Lineaspedidos_model->eliminar($pedido->id);

			//-------------crear el log de pedidos
			$this->load->model('Log_pedidos_model');
			$this->Log_pedidos_model->crear($pedido->id, $pedido->idusuario, $fecha, EST_CANCELADO, '(crontab) Cancelado por Tiempo excedido');
			print("pedido borrado");
		}

        $this->db->trans_complete();   //======================== TERMINA TRANSACCION
    }

//---------------------------------------------------------(EMAIL) envioCorreo
	public function envioCorreo() {
		$correo = @$this->input->post('correo',TRUE);
		$clave = md5('sanossalt'.date('Y-m-d H:i:s').$correo);
		$urlenviada = base_url().'interfases/reciboCorreoOlvidoClave/'.$clave;

		$this->load->model('Recuperaclave_model');
		$data = $this->Recuperaclave_model->crear($correo, $clave);
		if ($data['res'] !== "ok") { print json_encode(array('res'=>'bad','msj'=>$data['msj']));exit(); }
		else { print json_encode(array('res'=>'ok','msj'=>""));exit(); }
/*
		//cargamos la libreria email de Codeigniter
		$this->load->library('email');

		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'hlduran.hotmail@gmail.com',
			'smtp_pass' => 'htoluis1957',
//			'smtp_user' => 'correo_gmail',
//			'smtp_pass' => 'password',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"	);    
		$this->email->initialize($configGmail);		

		$this->email->from('hlduran.hotmail@gmail.com', 'Humberto Luis Duran');
		$this->email->to($correo); 
		$this->email->subject('Solicitud de cambio de clave por olvido');
		$this->email->message('<h2>mensaje de prueba para olvido clave</h2><br>'.$urlenviada);	
		$this->email->send();

		if ($this->email->send()) {print json_encode(array('res'=>'ok'));exit();} 
		else {print json_encode(array('res'=>'bad','msj'=>'Error enviando email'));exit();}
*/

	}

//---------------------------------------------------------(EMAIL) envioCorreo
	public function contactenos() {
		$correo = @$this->input->post('correo',TRUE);
		$asunto = @$this->input->post('asunto',TRUE);
		$mensaje = @$this->input->post('mensaje',TRUE);

		$this->load->library('email');
		$this->email->from($correo); 
		$this->email->to(CORREO_CONTACTENOS, 'Sanoosfoods');
		$this->email->subject($asunto);
		$this->email->message($mensaje);	

		if ($this->email->send()) {print json_encode(array('res'=>'ok'));exit();} 
		else {print json_encode(array('res'=>'bad','msj'=>'Error enviando email'));exit();}

/*
		//cargamos la libreria email de Codeigniter
		$this->load->library('email');

		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'hlduran.hotmail@gmail.com',
			'smtp_pass' => 'htoluis1957',
//			'smtp_user' => 'correo_gmail',
//			'smtp_pass' => 'password',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"	);    
		$this->email->initialize($configGmail);		

		$this->email->from('hlduran.hotmail@gmail.com', 'Humberto Luis Duran');
		$this->email->to($correo); 
		$this->email->subject('Solicitud de cambio de clave por olvido');
		$this->email->message('<h2>mensaje de prueba para olvido clave</h2><br>'.$urlenviada);	
		$this->email->send();

		if ($this->email->send()) {print json_encode(array('res'=>'ok'));exit();} 
		else {print json_encode(array('res'=>'bad','msj'=>'Error enviando email'));exit();}
*/

	}

//---------------------------------------------------------(EMAIL) reciboCorreoOlvidoClave
	public function reciboCorreoOlvidoClave() {
		$claverecibida = $this->uri->segment(3);

		$this->load->model('Recuperaclave_model');
		$data = $this->Recuperaclave_model->buscar($claverecibida);
		if ($data['res'] != 'ok') { print('<h2>'.$data['msj'].'</h2>');exit(); }

		foreach ($data['recuperaclave'] as $linea) {
			$fechavisita = strtotime(date('Y-m-d H:i:s'));
			$fechabd = strtotime($linea->fecha); 
			$diferencia = $fechavisita - $fechabd;
			if (strtotime(date('Y-m-d H:i:s')) - strtotime($linea->fecha) > TIEMPO_CLAVE) {
				print("<h2>Tiempo para cambio de clave termino hace: ".($diferencia - TIEMPO_CLAVE)." segundos</h2>");exit(); }
			else {
				$this->load->view('web/encabezado');
				$this->load->view('web/cambiarclave');
				$this->load->view('web/piedepagina');
			}
		}
	}

//---------------------------------------------------------(PAGOS) recepcionpago
	public function solicitudpago($idusuario = null, $idpedido = null, $valor = null) {

//		verificar quien ejecuta para estar seguro que es de pagos reales

//		if($idusuario == null or $idpedido == null or $valor == null){
//		 show_404(); }

		$this->load->view('web/encabezado');
		$this->load->view('web/piedepagina');
	}

//---------------------------------------------------------(PAGOS) recepcionpago
	public function recepcionpago() {

//		verificar quien ejecuta para estar seguro que es de pagos reales
		$idpedido = $this->uri->segment(3);
		$aprobado = $this->uri->segment(4);
		if($idpedido == null OR $aprobado == null OR $aprobado == "no") { 
			print("datos de url mal o negados");
			exit();
		}
	
		//-------------cambia estado en pedidos y crear el log
		$this->load->model('Pedidos_model');
		$this->Pedidos_model->cambiarestado($idpedido, EST_PAGADO, "Autorizacion recibida por url");

	}

}

// End of file Interfases.php
// Location: ./application/controllers/Interfases.php