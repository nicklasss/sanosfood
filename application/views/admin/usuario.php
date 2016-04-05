<form class="form-horizontal form-contenedor">
	<div class="row registro">
		<div class="col-md-1"></div>
		<div class="col-md-4">
			<label>Nombre del Usuario</label>
			<input class="form-control input-lg" readonly value="<?php print $usuario->nombre;?>"/>
		</div>
		<div class="col-md-1">
			<label>Dcto</label>
			<input class="form-control" readonly value="<?php print $usuario->tipo_identidad;?>"/>
		</div>
		<div class="col-md-2">
			<label>Número</label>
			<input class="form-control" readonly value="<?php print number_format($usuario->nro_identidad, 0, ",", ".");?>"/>
		</div>
		<div class="col-md-3">
			<label>Correo Electrónico</label>
			<input class="form-control" readonly value="<?php print $usuario->correo;?>"/>
		</div>
	</div>

	<div class="row registro">
		<div class="col-md-1"></div>
		<div class="col-md-2">
			<label>Usuario</label>
			<input class="form-control input-lg" readonly value="<?php print $usuario->usuario;?>"/>
		</div>
		<div class="col-md-2">
			<label>Teléfono</label>
			<input class="form-control" readonly value="<?php print $usuario->telefono;?>"/>
		</div>
		<div class="col-md-2">
			<label>Celular</label>
			<input class="form-control" readonly value="<?php print $usuario->celular;?>"/>
		</div>
		<div class="col-md-4">
			<label>Dirección</label>
			<input class="form-control" readonly value="<?php print $usuario->ultima_direccion;?>"/>
		</div>
	</div>

	<div class="row registro">
		<div class="col-md-1"></div>
		<div class="col-md-2">
			<label>Barrio</label>
			<input class="form-control" readonly value="<?php print $usuario->ultima_direccion;?>"/>
		</div>
		<div class="col-md-2">
			<label>Ciudad</label>
			<input class="form-control" readonly value="<?php print $usuario->ultima_direccion;?>"/>
		</div>
		<div class="col-md-3">
			<label>Región</label>
			<input class="form-control" readonly value="<?php print $usuario->ultima_direccion;?>"/>
		</div>
		<div class="col-md-3">
			<label>País</label>
			<input class="form-control" readonly value="<?php print $usuario->ultima_direccion;?>"/>
		</div>
	</div>

</form>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h2>Pedidos</h2></div>
			<table class="table table-condensed table-striped" id="tabla-car">
				<thead>
				<tr role="row">
				  <th>Estado</th>
				  <th>Fecha y Hora</th>
				  <th>Estado</th>
				</tr role="row">
				</thead>
				<tbody>
<?php 	
if (isset($usuario->pedidos)) {
	foreach ($usuario->pedidos as $pedido) {
		print '<tr role="row">';
		print '<td>'.$pedido->id.'</td>';
		print '<td><a href="../pedido/'.$pedido->id.'">'.$pedido->fecha.'</a></td>';
		print '<td>'.$pedido->estado.'</td>';
		print '</tr>';
	};
}
?>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>
