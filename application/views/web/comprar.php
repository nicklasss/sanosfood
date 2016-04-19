<div class="container">
<div class="row">
	<div class="col-md-6">
		<div class="row panel panel-success">
			<div class="panel-heading col-md-12">
				<div class="row">
					<h2 class="text-center">Información del Usuario</h2>
				</div>
				<div class="row">
					<h6 class="col-md-3 text-right">Nombre:</h6>
					<h5 class="col-md-9"><strong><?php print $usuario->nombre;?></strong></h5>
				</div>
				<div class"row">
					<h6 class="col-md-3 text-right">Usuario (email):</h6>
					<h5 class="col-md-9"><strong><?php print $usuario->correo;?></strong></h5>
				</div>
				<div class"row">
					<h6 class="col-md-3 text-right">Teléfono:</h6>
					<h5 class="col-md-9"><strong><?php print $usuario->telefono;?></strong></h5>
				</div>
				<div class"row">
					<h6 class="col-md-3 text-right">Celular:</h6>
					<h5 class="col-md-9"><strong><?php print $usuario->celular;?></strong></h5>
				</div>
				<div class"row">
					<h6 class="col-md-3 text-right">Tipo Documento:</h6>
					<h5 class="col-md-9"><strong><?php print $usuario->tipo_identidad;?></strong></h5>
				</div>
				<div class"row">
					<h6 class="col-md-3 text-right">Nro Documento:</h6>
					<h5 class="col-md-9"><strong><?php print $usuario->nro_identidad;?></strong></h5>
				</div>
				<div class"row">
					<h4 class="col-md-9 col-sm-offset-3"><strong>Última Dirección de Envío</strong></h4>
				</div>
				<div class"row">
					<h6 class="col-md-3 text-right">Nombre:</h6>
					<h5 class="col-md-9"><strong><?php print $direccion->nombre;?></strong></h5>
				</div>
				<div class"row">
					<h6 class="col-md-3 text-right">Dirección:</h6>
					<h5 class="col-md-9"><strong><?php print $direccion->direccion;?></strong></h5>
				</div>
				<div class"row">
					<h6 class="col-md-3 text-right">Barrio:</h6>
					<h5 class="col-md-9"><strong><?php print $direccion->barrio;?></strong></h5>
				</div>
				<div class"row">
					<h6 class="col-md-3 text-right">Ciudad:</h6>
					<h5 class="col-md-9"><strong><?php print $direccion->ciudad;?></strong></h5>
				</div>
				<div class"row">
					<h6 class="col-md-3 text-right">Region:</h6>
					<h5 class="col-md-9"><strong><?php print $direccion->region;?></strong></h5>
				</div>
				<div class"row">
					<h6 class="col-md-3 text-right">País:</h6>
					<h5 class="col-md-9"><strong><?php print $direccion->pais;?></strong></h5>
				</div>
			</div>  <!-- heading panel -->
		</div> <!-- panel -->
	</div>
	<div class="col-md-6">
		<div class"row">
			<blockquote>
				<p>Importante:</p>
				<footer>Para poder garantizarte la existencia de inventario debe realizar el pago.</footer>
				<footer>El pedido se mantiene pendiente por 2 horas mientras realizas el pago.</footer>
				<footer>Para tu factura es necesaria información como:
				<ul><strong>
					<li>Nombre completo</li>
					<li>Teléfono celular</li>
					<li>Correo electrónico (email)</li>
					<li>Tipo y número de documento de identificación</li>
					<li>Una dirección de envío</li></strong>
				</ul><br></footer>	
				<footer>Reviza tu información, de ser necesario actualízala y/o complétala, dando click en el boton "Actualizar Información"</footer>
				<footer>Si todo esta definido da click al boton "COMPRAR"</footer>

			</blockquote>
		</div>
		<div class"row">
			<div class="col-md-4 col-md-offset-3">
				<button type="button" id="btn-editar" class="btn btn-info">Actualizar Información</button>
			</div>
			<div class="col-md-4">
<?php
if ($usuario->nombre == "" OR $usuario->celular == "" OR $usuario->correo == "" OR
	$usuario->tipo_identidad == "" OR $usuario->nro_identidad == "" OR $direccion->nombre == "") {
	print '<button type="button" id="btn-comprar" class="btn btn-warning" disabled="disabled">COMPRAR</button>';
} else {
	print '<button type="button" id="btn-comprar" class="btn btn-warning">COMPRAR</button>';
}
?>
			</div>
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
	})

    $(".container").on('click','#btn-comprar',function(e){
		rta = crearpedido(function(rta) { })
		alert("El pedido ha sido creado como 'pendiente' ahora va al proceso de pago");
    });

})

//----------------------------------------------------------------------------------funcion crearpedido
function crearpedido (callback) {
	$.ajax({                                              
		url: "<?php print base_url();?>pedido/crear",
		context: document.body,
		dataType: "json",
		type: "POST",
		data: { } })
	.done(function(data) {                               
		if(data.res == "ok") {

			window.location="<?php print base_url();?>web/index"; 


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


</script>
