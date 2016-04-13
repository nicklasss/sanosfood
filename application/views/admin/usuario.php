<div class="row">
   <div class="col-md-12">
        <div class="panel panel-success">
			<div class="panel-heading text-center"><h2>Información del Usuario</h2></div>
			<form class="form-horizontal form-contenedor">
				<div class="row registro">
					<div class="col-md-4">
						<span><strong>Nombre del Usuario</strong></span>
						<input class="form-control input-lg editable" id="nombre" readonly value="<?php print $usuario->nombre;?>"/>
					</div>
					<div class="col-md-2 text-center">
						<span><strong>Tipo Documento</strong></span>
						<input class="form-control text-center editable" id="tipodcto" readonly value="<?php print $usuario->tipo_identidad;?>"/>
					</div>
					<div class="col-md-2 text-center">
						<span><strong>Número Documento</strong></span>
						<input class="form-control text-center editable" id="nrodcto" readonly value="<?php print number_format($usuario->nro_identidad, 0, ",", ".");?>"/>
					</div>
					<div class="col-md-4">
						<span><strong>Correo Electrónico (usuario)</strong></span>
						<input class="form-control editable" id="correo" readonly value="<?php print $usuario->correo;?>"/>
					</div>
				</div>
				<div class="row registro">
					<div class="col-md-2 text-center">
						<span><strong>Teléfono</strong></span>
						<input class="form-control text-center editable" id="telefono" readonly value="<?php print $usuario->telefono;?>"/>
					</div>
					<div class="col-md-2 text-center">
						<span><strong>Celular</strong></span>
						<input class="form-control text-center editable" id="celular" readonly value="<?php print $usuario->celular;?>"/>
					</div>
					<div class="col-md-2 text-center">
						<span><strong>Última Dirección</strong></span>
						<input class="form-control text-center" id="ultdireccion" readonly value="<?php print $usuario->ultima_direccion;?>"/>
					</div>
					<div class="col-md-4 col-md-offset-2 text-center">
						<div><br>
							<button type="button" class="btn btn-success" id="btn-guardar" >Guardar</button>
							<button type="button" class="btn btn-warning" id="btn-cancelar">Cancelar</button>
							<button type="button" class="btn btn-primary" id="btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
						</div>
					</div>
				</div>
			</form>
		</div> <!-- Panel-->
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
        <div class="panel panel-success">
			<div class="panel-heading text-center"><h2>Pedidos</h2></div>
			<table class="table table-condensed table-striped" id="tabla-car">
				<thead>
				<tr role="row">
					<th class="text-center">id</th>
					<th class="text-center">Fecha y Hora</th>
					<th class="text-center">Dirección envío</th>
					<th class="text-center">Estado</th>
				</tr role="row">
				</thead>
				<tbody>
<?php 	
if (isset($usuario->pedidos)) {
	foreach ($usuario->pedidos as $pedido) {
		print '	<tr role="row">';
		print '		<td class="text-center">'.$pedido->id.'</td>';
		print '		<td class="text-center"><a href="../pedido/'.$pedido->id.'">'.$pedido->fecha.'</a></td>';
		print '		<td class="text-center">'.$pedido->nom_direccion.'</td>';
		print '		<td class="text-center">'.$pedido->estado.'</td>';
		print '	</tr>';
	}
}
?>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>

<!-------------------------------------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
		$('#btn-guardar').hide();
		$('#btn-cancelar').hide();

$(document).ready(function() { 

	//----------------------------------------------------------------------------------EDITAR
	$('.container').on('click','#btn-editar',function(event){
		$('#btn-editar').hide();
		$('#btn-guardar').show();
		$('#btn-cancelar').show();

		snombre = 		$('#nombre').val();
		stipodcto = 	$('#tipodcto').val();
		snrodcto = 		$('#nrodcto').val();
		scorreo = 		$('#correo').val();
		stelefono = 	$('#telefono').val();
		scelular = 		$('#celular').val();
		sultdireccion = $('#ultdireccion').val();

		$('.editable').each(function() {$(this).attr('readonly', false);});

	})

	//----------------------------------------------------------------------------------CANCELAR
	$('.container').on('click','#btn-cancelar',function(event){
		$('#btn-editar').show();
		$('#btn-guardar').hide();
		$('#btn-cancelar').hide();

		$('#nombre').val(snombre);
		$('#tipodcto').val(stipodcto);
		$('#nrodcto').val(snrodcto);
		$('#correo').val(scorreo);
		$('#telefono').val(stelefono);
		$('#celular').val(scelular);
		$('#ultdireccion').val(sultdireccion);

		$('.editable').each(function() {$(this).attr('readonly', true);});
	})

	//----------------------------------------------------------------------------------GUARDAR
	$('.container').on('click','#btn-guardar',function(event){
		enombre = 	$('#nombre').val();
		etipodcto =	$('#tipodcto').val();
		enrodcto = 	$('#nrodcto').val();
		ecorreo = 	$('#correo').val();
		etelefono = $('#telefono').val();
		ecelular = 	$('#celular').val();
		eultdireccion = $('#ultdireccion').val();
		rta = guardar(function(rta){
			if(rta) {
				$('#btn-editar').show();
				$('#btn-guardar').hide();
				$('#btn-cancelar').hide();

				$('.editable').each(function() {$(this).attr('readonly', true);});
			}
		})
	})
	
})

//----------------------------------------------------------------------------------funcion guardar
function guardar (callback) {
  $.ajax({                                               
	    url: "<?php print base_url();?>usuario/admin_actualizar",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {	idusuario : <?php print $this->uri->segment(3);?>,
	    		nombre : enombre,
	    		tipodcto : etipodcto,
	    		nrodcto : enrodcto,
	    		email : ecorreo,
	    		telefono : etelefono,
	    		celular : ecelular }
	    })
   .done(function(data) {                              
		if (data.res == "ok") {
  			callback(true);
  		} else {
			alert(data.msj);
   			callback(false);
		}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}

</script>
