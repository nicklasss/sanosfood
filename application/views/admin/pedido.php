<form class="form-horizontal form-contenedor">

<div class="row registro">
	<div class="col-md-4">Nombre</div>
	<div class="col-md-1">dcto</div>
	<div class="col-md-2">Número</div>
	<div class="col-md-5">email</div>
</div>
<div class="row registro">
	<div class="col-md-4"><h4><?php print $pedido->nombres." ".$pedido->apellidos;?></h4></div>
	<div class="col-md-1"><h4><?php print $pedido->fecha;?></h4></div>
	<div class="col-md-2"><h4><?php print $pedido->estado;?></h4></div>
</div>

<!--<div class="row registro">
	<div class="col-md-2">Usuario</div>
	<div class="col-md-2">Fijo</div>
	<div class="col-md-3">Celular</div>
	<div class="col-md-5">Dirección</div>
</div>
<div class="row registro">
	<div class="col-md-2"><h4><?php print $usuario->usuario;?></h4></div>
	<div class="col-md-2"><h4><?php print $usuario->telefono;?></h4></div>
	<div class="col-md-3"><h4><?php print $usuario->celular;?></h4></div>
	<div class="col-md-5"><h4><?php print $usuario->direccion;?></h4></div>
</div>

<div class="row registro">
	<div class="col-md-3">Barrio</div>
	<div class="col-md-3">Ciudad</div>
	<div class="col-md-3">Departamento</div>
	<div class="col-md-3">Pais</div>
</div>
<div class="row registro">
	<div class="col-md-3"><h4><?php print $usuario->barrio;?></h4></div>
	<div class="col-md-3"><h4><?php print $usuario->ciudad;?></h4></div>
	<div class="col-md-3"><h4><?php print $usuario->region;?></h4></div>
	<div class="col-md-3"><h4><?php print $usuario->pais;?></h4></div>
</div>-->

</form>

<div class="row registro">
	<div class="col-md-5"><h2>PEDIDOS</h2></div>
</div>
<div class="row">
	<div class="col-md-5">
		<div class="panel panel-default panel-usuarios">
			<table class="table table-condensed table-striped">
				<thead>
				<tr role="row">
				  <th>Fecha</th>
				  <th>Estado</th>
				</tr>
				</thead>
				<tbody id="lista">
<?php 	
if (isset($pedido->lineas)) {
	foreach ($pedido->lineas as $linea) {
		print '<tr role="row">';
		print '<td>'.$linea->nombre.'</td>';
		print '<td>'.$linea->unidades.'</td>';
		print '<td>'.$linea->precio.'</td>';
		print '</tr>';
	};
}
?>
				</tbody>
			</table> 
		</div>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function() { 

	$('.form-contenedor').on('click','.btn-limpiar',function(event){
		limpiarpantalla();
	});
});


</script>