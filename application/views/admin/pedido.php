<form class="form-horizontal form-contenedor">

<div class="row registro">
	<div class="col-md-2"></div>
	<div class="col-md-3">
		<label for="exampleInputEmail1">Nombre del Usuario</label>
		<input class="form-control" readonly value="<?php print $pedido->nombres." ".$pedido->apellidos;?>"/>
	</div>
	<div class="col-md-3">
		<label for="exampleInputEmail1">Fecha y Hora</label>
		<input class="form-control" readonly value="<?php print $pedido->fecha;?>"/>
	</div>
	<div class="col-md-2">
		<label for="exampleInputEmail1">Estado</label>
		<input class="form-control" readonly value="<?php print $pedido->estado;?>"/>
	</div>
</div>


</form>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-4"><h2>Lineas del Pedido</h2></div>
</div>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 panel panel-default panel-usuarios">
		<table class="table table-condensed table-striped">
			<thead>
			<tr role="row">
			  <th>Producto</th>
			  <th>Estado</th>
			  <th>Precio Unitario</th>
			</tr>
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
		</table> 
	</div>
</div>


<script type="text/javascript">

</script>