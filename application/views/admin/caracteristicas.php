<div class="row">
	<div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h2>Características de los Productos</h2></div>
			<table class="table table-condensed table-striped" id="tabla-car">
				<thead>
				<tr role="row">
				  <th>Nombre</th>
				  <th>Descripción</th>
				</tr role="row">
				</thead>
				<tbody>

<?php
foreach ($caracteristicas as $caracteristica) {
	print '
				<tr>
					<td>
				    	<div class="editable escondido">
							<input type="text" class="form-control entnombre" value="'.$caracteristica->nombre.'"/>
				    	</div>
				    	<div class="mostrable">
							<h4 class="salnombre mostrable" value="'.$caracteristica->nombre.'">'.$caracteristica->nombre.'</h4>
				    	</div>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<textarea type="text" class="form-control entdescripcion">'.$caracteristica->descripcion.'</textarea>
				    	</div>
				    	<div class="mostrable">
							<h5 class="saldescripcion">'.$caracteristica->descripcion.'</h5>
				    	</div>
					</td>
					<td>
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-id="'.$caracteristica->id.'">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
					   		<button type="button" class="btn btn-xs btn-danger btn-eliminar" data-id="'.$caracteristica->id.'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>
				    	</div>
					</td>	
				</tr>';
}
?>

				<tr id="ultima">
					<td>
				    	<div class="editable escondido">
							<input type="text" class="form-control entnombre" value="'.$caracteristica->nombre.'"/>
				    	</div>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<textarea type="text" class="form-control entdescripcion">'.$caracteristica->descripcion.'</textarea>
				    	</div>
					</td>
					<td>
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-agregar" data-id="'.$caracteristica->id.'">Agregar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-success text-center btn-nuevo"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</button>
				    	</div>
					</td>	
				</tr>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() { 

	$('.container').on('click','.btn-editar',function(event){
		$(event.target).parent().parent().parent().find('.editable').show();
		$(event.target).parent().parent().parent().find('.mostrable').hide();
	});

	$('.container').on('click','.btn-cancelar',function(event){
		$(event.target).parent().parent().parent().find('.mostrable').show();
		$(event.target).parent().parent().parent().find('.editable').hide();
	});

	$('.container').on('click','.btn-eliminar',function(event){
		rta = confirm("presione ACEPTAR para confirmar borrado, o CANCEL para no borrar");
		if (rta) {
		   rta = eliminar( $(event.target).attr("data-id") ,function(rta){
			   if(rta) {
				  $(event.target).parent().parent().parent().find('.mostrable').hide(); 
			   };
		   });
		}
	});

	$('.container').on('click','.btn-nuevo',function(event){
		$(event.target).parent().parent().parent().find('.entnombre').val("");
		$(event.target).parent().parent().parent().find('.entdescripcion').val("");
		$(event.target).parent().parent().parent().find('.editable').show();
		$(event.target).parent().parent().parent().find('.mostrable').hide();
	});

	$('.container').on('click','.btn-agregar',function(event){
		enombre = $(event.target).parent().parent().parent().find('.entnombre').val();
		edescripcion = $(event.target).parent().parent().parent().find('.entdescripcion').val();
		if(enombre !== "" && edescripcion !== "") {
		   rta = crear( enombre , edescripcion , function(rta){
			   if(rta) {
 					$(event.target).parent().parent().parent().find('.mostrable').show();
					$(event.target).parent().parent().parent().find('.editable').hide();
			   };
			});
		};
	});
	$('.container').on('click','.btn-guardar',function(event){
		enombre = $(event.target).parent().parent().parent().find('.entnombre').val();
		snombre = $(event.target).parent().parent().parent().find('.salnombre').html();
		if(enombre !== snombre) {
		   rta = guardar( $(event.target).attr("data-id") , "nombre" , enombre ,function(rta){
			   if(rta) {
				  $(event.target).parent().parent().parent().find('.salnombre').html(enombre); 
			   };
		   });
		};
		edescripcion = $(event.target).parent().parent().parent().find('.entdescripcion').val();
		sdescripcion = $(event.target).parent().parent().parent().find('.saldescripcion').html();
		if(edescripcion !== sdescripcion) {
		   rta = guardar( $(event.target).attr("data-id") , "descripcion" , edescripcion ,function(rta){
			   if(rta) {
				  $(event.target).parent().parent().parent().find('.saldescripcion').html(edescripcion); 
			   };
		   });
		};
		$(event.target).parent().parent().parent().find('.editable').hide();
		$(event.target).parent().parent().parent().find('.mostrable').show();
	});

});

function guardar (id, atributo, valor, callback) {
	$.ajax({                                               // envio de los datos
	  url: "<?php print base_url();?>caracteristica/editar",
	  context: document.body,
	  dataType: "json",
	  type: "POST",
	  data: {id : id, atributo  : atributo, valor : valor } })
	 .done(function(data) {                               // respuesta del servidor
	  if(data.res=="ok") {callback(true)}
	  else {alert(data.msj);callback(false)}
	  })
	 .error(function(){alert('No hay conexion');callback(false);})
}

function eliminar (id, callback) {
	$.ajax({                                               // envio de los datos
	  url: "<?php print base_url();?>caracteristica/eliminar",
	  context: document.body,
	  dataType: "json",
	  type: "POST",
	  data: {id : id } })
	 .done(function(data) {                               // respuesta del servidor
	  if(data.res=="ok") {callback(true)}
	  else {alert(data.msj);callback(false)}
	  })
	 .error(function(){alert('No hay conexion');callback(false);})
}

function crear (nombre, descripcion, callback) {
	$.ajax({                                               // envio de los datos
	  url: "<?php print base_url();?>caracteristica/crear",
	  context: document.body,
	  dataType: "json",
	  type: "POST",
	  data: {nombre : nombre, descripcion : descripcion } })
	 .done(function(data) {                               // respuesta del servidor
	  if(data.res=="ok") {
	  	callback(true);
		$("#ultima").before(
		'<tr class="success">'+
		'	<td>'+
		'    	<div class="editable escondido">'+
		'			<input type="text" class="form-control entnombre" value="'+ enombre +'"/>'+
		'    	</div>'+
		'    	<div class="mostrable">'+
		'			<h4 class="salnombre mostrable" value="'+ enombre +'">'+ enombre +'</h4>'+
		'    	</div>'+
		'	</td>'+
		' 	<td>'+
		'    	<div class="editable escondido">'+
		'			<textarea type="text" class="form-control entdescripcion">'+ edescripcion +'</textarea>'+
		'    	</div>'+
		'    	<div class="mostrable">'+
		'			<h5 class="saldescripcion">'+ edescripcion +'</h5>'+
		'    	</div>'+
		'	</td>'+
		'	<td>'+
		'    	<div class="editable escondido">'+
		'	  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-id="'+ data.id +'">Guardar</button>'+
		'	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>'+
		'    	</div>'+
		'    	<div class="mostrable">'+
		'	   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>'+
		'	   		<button type="button" class="btn btn-xs btn-danger btn-eliminar" data-id="'+ data.id +'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>'+
		'    	</div>'+
		'	</td>'+	
		'</tr>');
	  }
	  else {alert(data.msj);callback(false)}
	  })
	 .error(function(){alert('No hay conexion');callback(false);})
}

</script>
