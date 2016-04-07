<div class="text-center">
	<h2>Pedido Id: <mark><?php print $pedido->id;?></mark> del <mark><?php print date("Y-m-d", strtotime($pedido->fecha));?></mark></h2>
</div>
<div class="panel panel-info">
	<div class="panel-heading"><h3>Información del Usuario y dirección de envío</h3></div>
	<form class="form-horizontal form-contenedor">
		<div class="row">
			<div class="col-md-3">
				<strong><span>Nombre del Usuario</strong></span>
				<input class="form-control" readonly value="<?php print $pedido->nombre;?>"/>
			</div>
			<div class="col-md-2">
				<strong><span>Usuario</strong></span>
				<input class="form-control" readonly value="<?php print $pedido->usuario;?>"/>
			</div>
			<div class="col-md-3">
				<strong><span>Correo</strong></span>
				<input class="form-control" readonly value="<?php print $pedido->correo;?>"/>
			</div>
			<div class="col-md-2">
				<strong><span>Teléfono</strong></span>
				<input class="form-control" readonly value="<?php print $pedido->telefono;?>"/>
			</div>
			<div class="col-md-2">
				<strong><span>Celular</strong></span>
				<input class="form-control" readonly value="<?php print $pedido->celular;?>"/>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<strong><span>Nombre</strong></span>
				<input class="form-control" readonly value="<?php print $pedido->nom_direccion;?>"/>
			</div>
			<div class="col-md-2">
				<strong><span>Dirección</strong></span>
				<input class="form-control" readonly value="<?php print $pedido->direccion;?>"/>
			</div>
			<div class="col-md-2">
				<strong><span>Barrio</strong></span>
				<input class="form-control" readonly value="<?php print $pedido->barrio;?>"/>
			</div>
			<div class="col-md-2">
				<strong><span>Ciudad</strong></span>
				<input class="form-control" readonly value="<?php print $pedido->ciudad;?>"/>
			</div>
			<div class="col-md-2">
				<strong><span>Región</strong></span>
				<input class="form-control" readonly value="<?php print $pedido->region;?>"/>
			</div>
			<div class="col-md-2">
				<strong><span>País</strong></span>
				<input class="form-control" readonly value="<?php print $pedido->pais;?>"/>
			</div>
		</div>	
	</form>
</div>


<div class="row registro">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-info">
			<div class="panel-heading"><h3>Cambio del estado del pedido</h3></div>
			<form class="form-horizontal form-contenedor">
				<div class="row">

					<div class="col-md-3">
						<label>Estado</label>
						<select class="form-control estado" disabled="disabled">
<?php 						foreach ($estadospedidos as $estado) {
								if ($estado->nombre == $pedido->nom_estado) {
									print '<option value="'.$estado->nombre.'" selected>'.$estado->nombre.'</option>'; }
								else {
									print '<option value="'.$estado->nombre.'">'.$estado->nombre.'</option>'; }
							}
?>
						</select>    		
			    	</div>
					<div class="col-md-6">
						<label>Observación por cambio de estado</label>
						<textarea type="text" class="form-control observacion" readonly ></textarea>
					</div>
					<div class="col-md-3">
				    	<div class="editable escondido">
							<label>Cambiar Estado pedido</label>
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="nombre">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
							<label>Cambiar Estado pedido</label>
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
			    	</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="row registro">
	<div class="col-md-6 col-md-offset-3">
        <div class="panel panel-info">
			<div class="panel-heading"><h3>Productos del Pedido</h3></div>
			<table class="table table-condensed table-striped" id="tabla-car">
				<thead>
				<tr role="row">
				  <th width="50%">Producto</th>
				  <th width="20%" class="text-center">Unidades</th>
				  <th width="30%" class="text-right">Precio Unitario</th>
				</tr role="row">
				</thead>
				<tbody>
<?php 	
if (isset($pedido->lineas)) {
	foreach ($pedido->lineas as $linea) {
		print '<tr role="row">';
		print '<td>'.$linea->nombre.'</td>';
		print '<td class="text-center">'.$linea->unidades.'</td>';
		print '<td class="text-right">'.number_format($linea->precio , 0, ",", ".").'</td>';
		print '</tr>';
	};
}
?>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>

<!---------------------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
$(document).ready(function() { 

	$('.container').on('click','.btn-editar',function(event){
		svalor = $(event.target).parent().parent().parent().find('.estado').val();
		$(event.target).parent().parent().parent().find('.editable').show();
		$(event.target).parent().parent().parent().find('.mostrable').hide();
		$('.estado').each(function() {$(this).attr('disabled', false);});
		$('.observacion').each(function() {$(this).attr('readonly', false);});
	});
	$('.container').on('click','.btn-cancelar',function(event){
		$(event.target).parent().parent().parent().find('.estado').val(svalor);
		$(event.target).parent().parent().parent().find('.observacion').val("");
		$(event.target).parent().parent().parent().find('.mostrable').show();
		$(event.target).parent().parent().parent().find('.editable').hide();
		$('.estado').each(function() {$(this).attr('disabled', true);});
		$('.observacion').each(function() {$(this).attr('readonly', true);});
	});
	$('.container').on('click','.btn-guardar',function(event){
		evalor = $(event.target).parent().parent().parent().find('.estado').val();
		eobservacion = $(event.target).parent().parent().parent().find('.observacion').val();
		$(event.target).parent().parent().parent().find('.observacion').val("");
		$(event.target).parent().parent().parent().find('.mostrable').show();
		$(event.target).parent().parent().parent().find('.editable').hide();
		$('.estado').each(function() {$(this).attr('disabled', true);});
		$('.observacion').each(function() {$(this).attr('readonly', true);});
		if (svalor === evalor) {return false;}
		rta = guardar( evalor , eobservacion ,function(rta){
			if(rta) {
				alert ("El estado del pedido ha sido cambiado");
		   };
		});

	});
});

//---------------------------------------------------------funcion guardar
function guardar (estado, observacion, callback) {
  $.ajax({                                               // envio de los datos
	    url: "<?php print base_url();?>pedido/cambiarestado",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {id : <?php print $pedido->id;?>, idestadopedido : estado, observacion : observacion } })
   .done(function(data) {                               // respuesta del servidor
    if(data.res=="ok") {callback(true)}
    else {alert(data.msj);callback(false)}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}

</script>