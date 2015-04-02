<?php

if($resultado){
	print json_encode(array('res'=>'ok'));
    exit();
}else{
	print json_encode( array('res'=>'bad','msj'=>'Usuario o clave incorrectos','debug'=>'recibo '.$this->input->post('usuario').' y '.$this->input->post('clave')) );
    exit();
}