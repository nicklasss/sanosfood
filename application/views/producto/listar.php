<?php
if(count($resultado)==0){
	print json_encode(array('res'=>'bad','msj'=>'Sin resultados'));exit();
}
print json_encode(array('res'=>'ok','productos'=>$resultado));exit();