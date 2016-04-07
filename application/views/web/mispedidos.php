<div class="container">
<div class="row">
	<div class="col-md-5">
		<div class="row panel panel-warning">
			<div class="panel-heading col-md-12">
				<div class"row">
					<strong><h2 class="text-center">Información del Usuario</h2></strong>
				</div>
				<div class"row">
					<div class="col-md-4">
						<label class="text-left"><small>Nombre:</label></small>
					</div>
					<div class="col-md-8">
						<strong><label class="text-left"><?php print $usuario->nombre;?></label></strong>
					</div>	
				</div>
				<div class"row">
					<div class="col-md-4">
						<label class="text-left"><small>Email (usuario):</label></small>
					</div>
					<div class="col-md-8">
						<strong><label class="text-left"><?php print $usuario->correo;?></label></strong>
					</div>	
				</div>
				<div class"row">
					<div class="col-md-4">
						<label class="text-left"><small>Celular:</label></small>
					</div>
					<div class="col-md-8">
						<strong><label class="text-left"><?php print $usuario->celular;?></label></strong>
					</div>	
				</div>
				<div class"row">
					<div class="col-md-4">
						<label class="text-left"><small>Teléfono:</label></small>
					</div>
					<div class="col-md-8">
						<strong><label class="text-left"><?php print $usuario->telefono;?></label></strong>
					</div>	
				</div>
				<div class"row">
					<div class="col-md-4">
						<label class="text-left"><small>Tipo Identidad:</label></small>
					</div>
					<div class="col-md-8">
						<strong><label class="text-left"><?php print $usuario->tipo_identidad;?></label></strong>
					</div>	
				</div>
				<div class"row">
					<div class="col-md-4">
						<label class="text-left"><small>Nro Identidad:</label></small>
					</div>
					<div class="col-md-8">
						<strong><label class="text-left"><?php print $usuario->nro_identidad;?></label></strong>
					</div>	
				</div>

				<div class"row">
					<div class="col-md-4 col-md-offset-4">
						<button type="button" id="btn-editar" class="btn btn-xs btn-info">Editar Información</button>
					</div>
				</div>
			</div>
		</div> <!-- panel-->
	</div>		
	<div class="col-md-7">
		<h2 class="text-center">Pedidos</h2>
		<div class="row">
			<div class="col-md-11 col-md-offset-1 panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php 	
				if (isset($pedidos)) {
					foreach ($pedidos as $pedido) {
					print '<div class="panel panel-default">';
				    print '	<div class="panel-heading" role="tab" id="heading'.$pedido->id.'">';
				    print ' 	<h4 class="panel-title text-center">';
				    print '			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$pedido->id.'" aria-expanded="false" aria-controls="collapse'.$pedido->id.'">';
				    print '				<small>Pedido de fecha: </small><strong>'.substr($pedido->fecha, 0,10).' '.$pedido->estado.'</strong>';
				    print '			</a>';
				    if ($pedido->estado == EST_PENDIENTE) {	
				    print '			<button type="button" class="btn btn-xs btn-success pagar" data-id="'.$pedido->id.'">Pagar</button>';
				    print '			<button type="button" class="btn btn-xs btn-info carrito" data-id="'.$pedido->id.'">Volver al Carrito</button>';
				    print '			<button type="button" class="btn btn-xs btn-danger eliminar" data-id="'.$pedido->id.'">Eliminar</button>';
					}
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
		</div>
	</div>

</div><!-- Container-->


<!---------------------------------------------------------------------------------------------------------------------->
<script type="text/javascript">

$(document).ready(function() { 
	//---------------------------------------------------------Boton EDITAR
	$('.container').on('click','#btn-editar',function(event){
		window.location="<?php print base_url();?>web/micuenta";
	});

	//---------------------------------------------------------Botones de PEDIDOS
	$('.container').on('click','.pagar',function(event){
			alert('pagar'+$(event.target).attr("data-id"));
	});
	$('.container').on('click','.carrito',function(event){
		rta = confirm("presione ACEPTAR para en viar al Carrito el pedido, o CANCEL para dejar ahí");
		if (rta) {
			idpedido = $(event.target).attr("data-id")
			rta1 = moveracarrito(idpedido, function(rta){ });
		}
	});
	$('.container').on('click','.eliminar',function(event){
		rta = confirm("presione ACEPTAR para confirmar ELIMINAR el pedido, o CANCEL para no borrar");
		if (rta) {
			idpedido = $(event.target).attr("data-id")
			rta1 = eliminarpedido(idpedido, function(rta){ });
		}
	});

	//---------------------------------------------------------GUARDAR-EST
	$('#accordion').on('show.bs.collapse', function (e) {
		sarta = '<span></span>'; $('#msg-error').html(sarta);    // Limpia mensaje de error		
		idpedido = $(e.target).attr("data-id");
		yacargado = $(e.target).attr("data-cargado");
		if ($(e.target).attr("data-cargado") == "false") {
			$(e.target).attr("data-cargado", "true");
			rta = buscarItems(idpedido, function(rta){ })
		}	
	})
})

//----------------------------------------------------------------------------------funcion guardar-est
function buscarItems (idpedido, callback) {
	$.ajax({                                               // envio de los datos
		url: "<?php print base_url();?>lineaspedidos/buscar_lineaspedido",
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
			for (var i = 0; i < data.lineas.length; i++) {
				vlrpedido = vlrpedido + parseInt(data.lineas[i].precio);
				sarta += '<tr>'+
							 '<td><a href="<?php print base_url();?>web/producto/'+data.lineas[i].id+'"><img class="img-responsive img-pequenita" src="'+data.lineas[i].imagenproducto+'"/></a></td>'+
							 '<td><a href="<?php print base_url();?>web/producto/'+data.lineas[i].id+'" class="linkproducto">'+data.lineas[i].nombreproducto+'</a></td>'+
							 '<td class="text-center">'+ data.lineas[i].unidades+'</td>'+
							 '<td class="text-right">'+formato_numero(data.lineas[i].precio)+'</td>'+
						 '</tr>';

			};	
			sarta += '<td></td><td></td><td><strong>TOTAL PEDIDO: </td><td class="text-right">'+ formato_numero(vlrpedido) +'</strong></td>'+ 
					'</table>';
			$('#items'+idpedido).html(sarta);
			callback(true);
		}
		else {alert(data.msj);callback(false)}  })
   .error(function(){alert('No hay conexion');callback(false);})
}

//----------------------------------------------------------------------------------funcion guardar
function guardar (callback) {
  $.ajax({                                              
	    url: "<?php print base_url();?>usuario/actualizar",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {	idusuario : <?php print $usuario->id;?>,
	    		nombre : $('#nombre').val(), email : $('#email').val(), celular : $('#celular').val(), telefono : $('#telefono').val(),
	    		tipodcto : $('#tipodcto').val(), nrodcto : $('#nrodcto').val(), direccion : $('#direccion').val(),
	    		barrio : $('#barrio').val(), ciudad : $('#ciudad').val(), region : $('#region').val(), pais : $('#pais').val(),} })

   .done(function(data) {                              
		switch(data.res) {
			case "ok":
				sarta = '<span><strong style="color:green;">** Cambios Realizados OK **</strong></span>';  // Mensaje de error
				$('#msg-error').html(sarta);		
	  			callback(true);
	  			break;
	  		case "wrn":
				sarta = '<span><strong style="color:orange;">'+data.msj+'</strong></span>';  // Mensaje de error
				$('#msg-error').html(sarta);		
	  			callback(true);
	  			break;
	  		case "bad":
				sarta = '<span><strong style="color:red;">'+data.msj+'</strong></span>';  // Mensaje de error
				$('#msg-error').html(sarta);		
	  			callback(false);
	  			break;
		}
    })

   .error(function(){
		sarta = '<span><strong style="color:red;">*** No Hay Conexion con BD</strong></span>';  // Mensaje de error
		$('#msg-error').html(sarta);		
			callback(false);
   	})
}

//----------------------------------------------------------------------------------funcion crearpedido
function eliminarpedido (idpedido, callback) {
	$.ajax({                                              
		url: "<?php print base_url();?>pedido/eliminar",
		context: document.body,
		dataType: "json",
		type: "POST",
		data: {idpedido : idpedido} })
	.done(function(data) {                               
		if(data.res == "ok") {
			location.reload();
			callback(true)}
		else {
			sarta = '<span><strong style="color:red;">'+data.msj+'</strong></span>';  // Mensaje de error
			$('#msg-error').html(sarta);		
			callback(false);
		}
	})
	.error(function(){
		sarta = '<span><strong style="color:red;">== NO HAY CONEXION ==</strong></span>';  // Mensaje de error
		$('#msg-error').html(sarta);		
		callback(false);
	})
}

//----------------------------------------------------------------------------------funcion crearpedido
function moveracarrito (idpedido, callback) {
	$.ajax({                                              
		url: "<?php print base_url();?>pedido/moveracarrito",
		context: document.body,
		dataType: "json",
		type: "POST",
		data: {idpedido : idpedido} })
	.done(function(data) {                               
		if(data.res == "ok") {
			location.reload();
			callback(true)}
		else {
			sarta = '<span><strong style="color:red;">'+data.msj+'</strong></span>';  // Mensaje de error
			$('#msg-error').html(sarta);		
			callback(false);
		}
	})
	.error(function(){
		sarta = '<span><strong style="color:red;">== NO HAY CONEXION ==</strong></span>';  // Mensaje de error
		$('#msg-error').html(sarta);		
		callback(false);
	})
}

//----------------------------------------------------------------------------------funcion formato_numero
function formato_numero(texto) {
	var cadena = "";
    var resultado = "";
	if (isNaN(texto)) { cadena = texto; }
	else { cadena = texto.toString() }

    for (var j, i = cadena.length - 1, j = 0; i >= 0; i--, j++) 
        resultado = cadena.charAt(i) + ((j > 0) && (j % 3 == 0)? ".": "") + resultado; 
    return resultado;
}
    
//----------------------------------------------------------------------------------funcion formato_numero
function formato_fecha(texto) {
	var ano = texto.substring(4);
	var mes = texto.substring(5, 2);
	var dia = texto.substring(8, 2);
    var resultado = dia + "de" + mes + "de" + ano;
    return resultado;
}
</script>
