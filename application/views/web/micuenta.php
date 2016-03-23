
<div class="container">
<form>
	<div class="row registro form-group">
		<div class="col-md-4">
			<span>Nombre del Usuario</span>
			<strong><input class="form-control" readonly value="<?php print $usuario->nombres." ".$usuario->apellidos;?>"/></strong>
		</div>
		<div class="col-md-4">
			<span>Correo Electrónico</span>
			<strong><input class="form-control" readonly value="<?php print $usuario->correo;?>"/></strong>
		</div>
		<div class="col-md-2">
			<span>Celular</span>
			<strong><input class="form-control" readonly value="<?php print $usuario->celular;?>"/></strong>
		</div>
		<div class="col-md-2">
			<span>Teléfono</span>
			<strong><input class="form-control" readonly value="<?php print $usuario->telefono;?>"/></strong>
		</div>
	</div>

	<div class="row registro  form-group">
		<div class="col-md-1">
			<span>Dcto</span>
			<strong><input class="form-control" readonly value="<?php print $usuario->tipo_identidad;?>"/></strong>
		</div>
		<div class="col-md-2">
			<span>Número</span>
			<strong><input class="form-control" readonly value="<?php print number_format($usuario->nro_identidad, 0, ",", ".");?>"/></strong>
		</div>
		<div class="col-md-4">
			<span>Dirección</span>
			<strong><input class="form-control" readonly value="<?php print $usuario->direccion;?>"/></strong>
		</div>
		<div class="col-md-2">
			<span>Barrio</span>
			<strong><input class="form-control" readonly value="<?php print $usuario->barrio;?>"/></strong>
		</div>
		<div class="col-md-2">
			<span>Ciudad</span>
			<strong><input class="form-control" readonly value="<?php print $usuario->ciudad;?>"/></strong>
		</div>
	</div>

	<div class="row registro  form-group">
		<div class="col-md-3">
			<span>Región</span>
			<strong><input class="form-control" readonly value="<?php print $usuario->region;?>"/></strong>
		</div>
		<div class="col-md-3">
			<span>País</span>
			<strong><input class="form-control" readonly value="<?php print $usuario->pais;?>"/></strong>
		</div>
	</div>

</form>


<div class="row">
<div class="col-md-6 col-md-offset-3 panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<div class="panel-heading text-center"><h2>Pedidos</h2></div>
	<?php 	
	if (isset($pedidos)) {
		foreach ($pedidos as $pedido) {
		print '<div class="panel panel-default">';
	    print '	<div class="panel-heading" role="tab" id="heading'.$pedido->id.'">';
	    print ' 	<h4 class="panel-title">';
	    print '			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$pedido->id.'" aria-expanded="false" aria-controls="collapse'.$pedido->id.'">';
	    print '				Pedido de fecha: '.$pedido->fecha.' '.$pedido->id.'';
	    print '			</a>';
	    print '		</h4>';
	    print '	</div>';
	    print '	<div id="collapse'.$pedido->id.'" data-id="'.$pedido->id.'" data-cargado="false" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$pedido->id.'">';
		print '		<div class="panel-body" id="items'.$pedido->id.'">';
	    print '';
	    print '  </div>';
	    print ' </div>';
	  	print '</div>';
		};
	}
	?>
</div>

</div><!-- Container-->


<!---------------------------------------------------------------------------------------------------------------------->
<script type="text/javascript">

$(document).ready(function() { 
//----------------------------------------------------------------------------------GUARDAR-EST
	$('#accordion').on('show.bs.collapse', function (e) {
		idpedido = $(e.target).attr("data-id");
		yacargado = $(e.target).attr("data-cargado");
		if ($(e.target).attr("data-cargado") == "false") {
			$(e.target).attr("data-cargado", "true");
			rta = buscarItems(idpedido, function(rta){
			})
		}	
	})

})

//----------------------------------------------------------------------------------funcion guardar-est
function buscarItems (idpedido, callback) {
	$.ajax({                                               // envio de los datos
		url: "<?php print base_url();?>pedido/web_itemsxPedido",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {idpedido : idpedido }})
	.done(function(data) {                               // respuesta del servidor
		if(data.res == "ok") {
			var vlrpedido = 0;
			sarta = '<table class = "table table-hover table-condensed table-striped no-footer">'+
						'<tr>'+
							'<th class="text-center"> Imagen </th>'+
							'<th> Producto </th>'+
							'<th class="text-center"> Cantidad </th>'+
							'<th class="text-right"> Precio </th>'+
						'</tr>';
			for (var i = 0; i < data.items.length; i++) {
				vlrpedido = vlrpedido + parseInt(data.items[i].precio);
				sarta += '<tr>'+
							 '<td><a href="<?php print base_url();?>web/producto/'+data.items[i].id+'"><img class="img-responsive img-pequenita" src="'+data.items[i].imagenproducto+'"/></a></td>'+
							 '<td><a href="<?php print base_url();?>web/producto/'+data.items[i].id+'">'+data.items[i].nombreproducto+'</a></td>'+
							 '<td class="text-center">'+ data.items[i].unidades+'</td>'+
							 '<td class="text-right">'+data.items[i].precio+'</td>'+
						 '</tr>';

			};	
			sarta += '<td></td><td></td><td><strong>TOTAL PEDIDO: </strong></td><td class="text-right"><strong>'+ vlrpedido +'</strong></td>'+ 
					'</table>';
			$('#items'+idpedido).html(sarta);
			callback(true);
		}
		else {alert(data.msj);callback(false)}  })
   .error(function(){alert('No hay conexion');callback(false);})
}

</script>
