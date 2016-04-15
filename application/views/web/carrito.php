<div class="container">

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="row text-center"><h2>Carrito de Compras</h2></div>
		<div class="panel panel-default">
			<table class="table table-condensed table-striped">
				<thead>
					<tr role="row">
						<th width="15%" class="text-center">Imagen</th>
						<th width="50%" class="text-center">Producto</th>
						<th width="10%" class="text-center">Cantidad</th>
						<th width="10%" class="text-center">Subtotal</th>
					</tr role="row">
				</thead>
				<tbody>
<?php
foreach ($this->cart->contents() as $item) {
	print 			'<tr>';
	print 			' 	<td><img class="img-responsive img-pequena" src="'.$item['imagen'].'"/></td>';
	print 			'	<td>';
	print 			'		<h5 class="nombre"><strong>'.$item['name'].'</strong></h5>';
	print 			'		<h6><small>'.$item['descripcioncorta'].'</small></h6>';
	print 			'	</td>';
	print 			'	<td><h5><input type="number" class="form-control input-cantidad" id="id'.$item['rowid'].'" min="0" value="'.$item['qty'].'" data-id="'.$item['rowid'].'"></h5></td>';
	print 			'	<td id="valor'.$item['id'].'" class="text-right">';
	print 			'		<div id="valor-item'.$item['rowid'].'">';
	print 			'			<h5><strong>'.number_format($item['subtotal'],0,',','.').'</strong></h5>';
	print 			'		</div>';
	print 			'	</td>';
	print 			'</tr>';
}
print				'<tr>';
print				'	<td colspan="2">';
						
if ($this->cart->total() == 0) {
	print 			'		<button type="button" class="btn btn-xs btn-warning" id="btn-vaciar" disabled="disabled">Vaciar Carrito</button>';
	print 			'		<button type="button" class="btn btn-xs btn-success" id="btn-comprar" disabled="disabled">Comprar</button>';
} else {
		print 		'		<button type="button" class="btn btn-xs btn-warning" id="btn-vaciar">Vaciar Carrito</button>';
	if ($this->session->userdata("logeado") == true) {
		print '				<button type="button" class="btn btn-xs btn-success" id="btn-comprar">Comprar</button>';
	} else {
		print '				<button type="button" class="btn btn-xs btn-success" id="btn-comprar" disabled="disabled">Comprar</button>';
	}
}
?>					
						</td>
						<td class="text-right"><h5>Total:</h5></td>
						<td class="text-right">
							<div id="valor-total">
								<h4><strong><?php print number_format($this->cart->total(),0,',','.')?></strong></h4>
							</div>
						</td>
					</tr>
<?php
if ($this->session->userdata("logeado") == false) {
	print 		'	<tr>';
	print 		'		<td colspan="4">';
	print 		'			<h5>** Para comprar debe primero: <a href="'.base_url().'web/login">Iniciar Sesión</a> como usuario registrado, o <a href="'.base_url().'web/Registrarse">Registrarse</a>.</h5>';
	print 		'		</td>';
	print 		'	</tr>';
}
?>
				</tbody>
			</table>
		</div> <!-- Panel-->
	</div>
</div>

</div>

<!--------------------------------------------------------------------------------------------------------------------------> 
<script type="text/javascript">

$(document).ready(function() {
	$('#btn-vaciar').click(function(event){ 
		window.location = "<?php print base_url();?>carrito/vaciarCarrito";
	})

	$('.input-cantidad').change(function(event){ 
		rowid = $(event.target).attr("data-id"); 
		cantidad = $('#id'+rowid).val();
		rta = actualizarcarrito( rowid, cantidad, function(rta){});
	})

	$('#btn-comprar').click(function(event){ 
		window.location = "<?php print base_url();?>web/micuenta";
	})
})

//----------------------------------------------------------------------------------funcion guardar
function actualizarcarrito(rowid, cantidad, callback) {
	$.ajax({                                              
	  url: "<?php print base_url();?>carrito/actualizarCarrito",
	  context: document.body,
	  dataType: "json",
	  type: "POST",
	  data: { rowid : rowid, cantidad : cantidad }})
	.done(function(data) {                              
		if(data.res=="ok") {
			// actualiza el valor del item cambiado
			sarta = '<h5><strong>'+data.vlritem+'</strong></h5>';
			$("#valor-item"+rowid).html(sarta); 
			
			// actualiza el valor total de la compra
			sarta = '<h4><strong>'+data.vlrtotal+'</strong></h4>';
			$("#valor-total").html(sarta); 
			
			// actualiza el carrito de la barra de navegacion
			// si el item bajo a cero recarga la pagina para desaparecerlo
			sarta = ' '+data.canttotal;     
			$("#cantcart").html(sarta); 
			if (data.canttotal == 0) { window.location="<?php print base_url();?>web/index"; }
			else { if (cantidad == 0) { location.reload(); }}

			callback(true);
		}
		else {alert(data.msj);callback(false);}
	  })
	.error(function(){alert('No hay conexion');callback(false);})
}

</script>