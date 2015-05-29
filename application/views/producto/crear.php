<?php
if ($res == "bad") {
	print json_encode(array('res'=>$res,'msj'=>$msj));exit();
} else {
	print json_encode(array('res'=>$res,'id'=>$id));exit();
}
