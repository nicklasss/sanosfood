<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	public function index() {}


//---------------------------------------------------------CORREO olvido clave
	public function envioCorreoOlvidoClave() {

		$correo = @$this->input->post('correo',TRUE);

		$this->load->model('Usuarios_model');
		$data = $this->Usuarios_model->encontrar($correo);

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
 
		//cargamos la configuración para enviar con gmail
		$this->email->initialize($configGmail);		

		$this->email->from('hlduran.hotmail@gmail.com', 'Humberto Luis Duran');
		$this->email->to('hlduran@hotmail.com'); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 

		$this->email->subject('Pruebas de envio de emails');
		$this->email->message('<h2>mensaje de prueba para olvido clave</h2>');	

		if ($this->email->send()) {print json_encode(array('res'=>'ok'));exit();} 
		else {print json_encode(array('res'=>'bad','msj'=>'Ha ocurrido un error.'));exit();}

//		md5(‘sanossalt’.$hash.$usuario)

/*		$destinatario 	= "hlduran.hotmail@gmail.com"; 
		$asunto 		= "Este mensaje es de prueba"; 
		$cuerpo 		= ' <html> 
							<head> 
							   <title>Prueba de correo</title> 
							</head> 
							<body> 
								<h1>Hola amigos!</h1> 
								<p> 
									<b>Bienvenidos a mi correo electrónico de prueba</b>. 
									Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del artículo de envío de mails por PHP. 
									Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje. 
								</p> 
							</body> 
							</html> 
						'; 

		//para el envío en formato HTML 
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

		//dirección del remitente 
		$headers .= "From: Humberto Luis Duran <hlduran.lazos@gmail.com>\r\n"; 

		//dirección de respuesta, si queremos que sea distinta que la del remitente 
		$headers .= "Reply-To: hlduran.lazos@gmail.com\r\n"; 

		//ruta del mensaje desde origen a destino 
		$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

		//direcciones que recibián copia 
		$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

		//direcciones que recibirán copia oculta 
		$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

		
        if (mail($destinatario, $asunto, $cuerpo, $headers)) {
            print json_encode(array('res'=>'ok'));
        } else {
            print json_encode(array('res'=>'bad', 'msj'=>'Error al enviar el email'));
        }
*/
	}

}

