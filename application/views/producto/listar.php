<?php
if(count($productos)==0){
	print json_encode(array('res'=>'bad','msj'=>'Sin resultados'));exit();
}
print json_encode(array('res'=>'ok','productos'=>$productos,'cant'=>$cant));exit();