<?php
// recibe los valores 
$nombre = $this->input->post('usuario',TRUE);

// posible valdacion
// valida que no exista en la bd
$this->db->select('clave')->from('sanosadminfood')->where('usuario', $usuario)->limit(1, 0);
$query = $this->db->get();

if ($query->num_rows() == 0) {
	print json_encode( array('res'=>'bad','msj'=>'Usuario no existe') );
	exit(); } 

$row = $query->row();

print json_encode( array('res'=>'ok','usuario'=>array('clave' => $row->clave)) );

exit();

?>