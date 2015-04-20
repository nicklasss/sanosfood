<form class="form-horizontal form-contenedor">

<div class="row registro">
	<div class="col-md-1"></div>
	<div class="col-md-4">
		<label>Nombre del Usuario</label>
		<input class="form-control input-lg" readonly value="<?php print $usuario->nombres." ".$usuario->apellidos;?>"/>
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
		<input class="form-control" readonly value="<?php print $usuario->direccion;?>"/>
	</div>
</div>

<div class="row registro">
	<div class="col-md-1"></div>
	<div class="col-md-2">
		<label>Barrio</label>
		<input class="form-control" readonly value="<?php print $usuario->barrio;?>"/>
	</div>
	<div class="col-md-2">
		<label>Ciudad</label>
		<input class="form-control" readonly value="<?php print $usuario->ciudad;?>"/>
	</div>
	<div class="col-md-3">
		<label>Región</label>
		<input class="form-control" readonly value="<?php print $usuario->region;?>"/>
	</div>
	<div class="col-md-3">
		<label>País</label>
		<input class="form-control" readonly value="<?php print $usuario->pais;?>"/>
	</div>
</div>

</form>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-5"><h2>Pedidos</h2></div>
</div>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 panel panel-default panel-usuarios">
		<table class="table table-condensed table-striped">
			<thead>
			<tr role="row">
			  <th>Producto</th>
			  <th>Estado</th>
			</tr>
			</thead>
			<tbody>
<?php 	
if (isset($usuario->pedidos)) {
	foreach ($usuario->pedidos as $pedido) {
		print '<tr role="row">';
		print '<td><a href="../pedido/'.$pedido->id.'">'.$pedido->fecha.'</a></td>';
		print '<td>'.$pedido->estado.'</td>';
		print '</tr>';
	};
}
?>
			</tbody>
		</table> 
	</div>
</div>


<script type="text/javascript">

</script>