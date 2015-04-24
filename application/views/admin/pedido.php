<form class="form-horizontal form-contenedor">
<div class="row registro">
	<div class="col-md-2"></div>
	<div class="col-md-3">
		<label>Nombre del Usuario</label>
		<input class="form-control" readonly value="<?php print $pedido->nombres." ".$pedido->apellidos;?>"/>
	</div>
	<div class="col-md-3">
		<label>Fecha y Hora</label>
		<input class="form-control" readonly value="<?php print $pedido->fecha;?>"/>
	</div>
	<div class="col-md-2">
		<label>Estado</label>
		<input class="form-control" readonly value="<?php print $pedido->estado;?>"/>
	</div>
</div>
</form>

<div class="row registro">
	<div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h2>Pedidos</h2></div>
			<table class="table table-condensed table-striped" id="tabla-car">
				<thead>
				<tr role="row">
				  <th width="50%">Producto</th>
				  <th width="20%">Unidades</th>
				  <th width="30%">Precio Unitario</th>
				</tr role="row">
				</thead>
				<tbody>
<?php 	
if (isset($pedido->lineas)) {
	foreach ($pedido->lineas as $linea) {
		print '<tr role="row">';
		print '<td>'.$linea->nombre.'</td>';
		print '<td>'.$linea->unidades.'</td>';
		print '<td>'.number_format($linea->precio , 0, ",", ".").'</td>';
		print '</tr>';
	};
}
?>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>
