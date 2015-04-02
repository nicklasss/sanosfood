<?php

if($resultado){
	print json_encode(array('res'=>'ok'));
    exit();
}else{
	print json_encode( array('res'=>'bad','msj'=>'Usuario o clave incorrectos') );
    exit();
}