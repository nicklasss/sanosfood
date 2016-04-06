<div class="row">
	<div class="col-md-12">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h2>Estados de un Pedido</h2></div>
			<table class="table table-condensed table-striped" id="tabla-car">
				<thead>
				<tr role="row">
				  <th>Id</th>
				  <th>Nombre</th>
				  <th>Descripción</th>
				</tr role="row">
				</thead>
				<tbody>

<?php
foreach ($estadospedidos as $estado) {
	print '
				<tr>
					<td width="5%">
				    	<div>
							<h5>'.$estado->id.'</h5>
				    	</div>
					</td>
					<td width="18%">
				    	<div class="editable escondido">
							<input type="text" class="form-control entnombre" value="'.$estado->nombre.'"/>
				    	</div>
				    	<div class="mostrable">
							<h5 class="salnombre mostrable" value="'.$estado->nombre.'"><strong>'.$estado->nombre.'</strong></h5>
				    	</div>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<textarea type="text" class="form-control entdescripcion">'.$estado->descripcion.'</textarea>
				    	</div>
				    	<div class="mostrable">
							<h5 class="saldescripcion">'.$estado->descripcion.'</h5>
				    	</div>
					</td>

				</tr>';
}
/*					<td width="15%">
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar btn-editable" data-id="'.$estado->id.'">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar btn-editable">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar btn-mostrable"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
					   		<button type="button" class="btn btn-xs btn-danger btn-eliminar btn-mostrable" data-id="'.$estado->id.'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>
				    	</div>
					</td>	
*/
?>

				<tr id="ultima">
					<td>
				    	<div>
							<h5></h5>
				    	</div>
					</td>
					<td>
				    	<div class="editable escondido">
							<input type="text" class="form-control entnombre" value="'.$estado->nombre.'"/>
				    	</div>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<textarea type="text" class="form-control entdescripcion">'.$estado->descripcion.'</textarea>
				    	</div>
					</td>
<!--					<td>
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-agregar btn-editable" data-id="'.$estado->id.'">Agregar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar btn-editable">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-success text-center btn-nuevo btn-mostrable"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</button>
				    	</div>
					</td>	
-->
				</tr>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>

<!-------------------------------------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
$(document).ready(function() { 

//----------------------------------------------------------------------------------EDITAR
	$('.container').on('click','.btn-editar',function(event){														
		snombre = $(event.target).parent().parent().parent().find('.salnombre').text();
		sdescripcion = $(event.target).parent().parent().parent().find('.saldescripcion').text();
		$(event.target).parent().parent().parent().find('.editable').show();
		$(event.target).parent().parent().parent().find('.mostrable').hide();
		$('.btn-mostrable').each(function() {$(this).attr('disabled', true);});
	});


//----------------------------------------------------------------------------------CANCELAR
	$('.container').on('click','.btn-cancelar',function(event){
		snombre = $(event.target).parent().parent().parent().find('.salnombre').text();
		$(event.target).parent().parent().parent().find('.entnombre').val(snombre);
		sdescripcion = $(event.target).parent().parent().parent().find('.saldescripcion').text();
		$(event.target).parent().parent().parent().find('.entdescripcion').val(sdescripcion);
		$(event.target).parent().parent().parent().find('.mostrable').show();
		$(event.target).parent().parent().parent().find('.editable').hide();
		$('.btn-mostrable').each(function() {$(this).attr('disabled', false);});
	});


//----------------------------------------------------------------------------------ELIMINAR
	$('.container').on('click','.btn-eliminar',function(event){
		rta = confirm("presione ACEPTAR para confirmar borrado, o CANCEL para no borrar");
		if (rta) {
		   rta = eliminar( $(event.target).attr("data-id") ,function(rta){
			   if(rta) {
					$(event.target).parent().parent().parent().remove();
				} else {
					$(event.target).parent().parent().parent().find('.btn-eliminar').attr('disabled', true); 
				};
		   });
		}
	});


//----------------------------------------------------------------------------------NUEVO
	$('.container').on('click','.btn-nuevo',function(event){
		$(event.target).parent().parent().parent().find('.entnombre').val("");
		$(event.target).parent().parent().parent().find('.entdescripcion').val("");
		$(event.target).parent().parent().parent().find('.editable').show();
		$(event.target).parent().parent().parent().find('.mostrable').hide();
		$(event.target).parent().parent().parent().find('.entnombre').focus();
		$('.btn-mostrable').each(function() {$(this).attr('disabled', true);});
	});


//----------------------------------------------------------------------------------nuevo AGREGAR
	$('.container').on('click','.btn-agregar',function(event){
		enombre = $(event.target).parent().parent().parent().find('.entnombre').val().trim();
		if (enombre == "") {
			alert ("el Nombre no puede estar vacio");
			$(event.target).parent().parent().parent().find('.entnombre').focus();
			return false;
		};
		edescripcion = $(event.target).parent().parent().parent().find('.entdescripcion').val();
		if (edescripcion == "") {
			alert ("la Descripción no puede estar vacia");
			$(event.target).parent().parent().parent().find('.entdescripcion').focus();
			return false;
		};
		$('.btn-mostrable').each(function() {$(this).attr('disabled', false);});
		rta = crear( enombre , edescripcion , function(rta){
			if(rta) {
				$(event.target).parent().parent().parent().find('.mostrable').show();
				$(event.target).parent().parent().parent().find('.editable').hide();
			} else {
				$(event.target).parent().parent().parent().find('.entnombre').focus();
			};
		});
	});


//----------------------------------------------------------------------------------editar GUARDAR
	$('.container').on('click','.btn-guardar',function(event){
		enombre = $(event.target).parent().parent().parent().find('.entnombre').val().trim();
		edescripcion = $(event.target).parent().parent().parent().find('.entdescripcion').val().trim();
		if (edescripcion == "") {
			alert ("la Descripción no puede estar vacia");
			$(event.target).parent().parent().parent().find('.entdescripcion').focus();
			return false;
		};
		if(edescripcion !== sdescripcion) {
			rta = guardar( $(event.target).attr("data-id") , "descripcion" , edescripcion ,function(rta){
				if(rta) {
				  $(event.target).parent().parent().parent().find('.saldescripcion').text(edescripcion); 
				};
			});
		};
		if (enombre == "") {
			alert ("el Nombre no puede estar vacio");
			$(event.target).parent().parent().parent().find('.entnombre').focus();
			return false;
		};
		if(enombre !== snombre) {
		   rta = guardar( $(event.target).attr("data-id") , "nombre" , enombre ,function(rta){
			   if(rta) {
					$(event.target).parent().parent().parent().find('.salnombre').text(enombre); 
				} else {
					$(event.target).parent().parent().parent().find('.entnombre').focus();
				};
		   });
		};
		$(event.target).parent().parent().parent().find('.editable').hide();
		$(event.target).parent().parent().parent().find('.mostrable').show();
		$('.btn-mostrable').each(function() {$(this).attr('disabled', false);});
	});

});


//----------------------------------------------------------------------------------funcion guardar
function guardar (id, atributo, valor, callback) {
	$.ajax({                                               // envio de los datos
	  url: "<?php print base_url();?>estadopedido/editar",
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

//----------------------------------------------------------------------------------funcion eliminar
function eliminar (id, callback) {
	$.ajax({                                               // envio de los datos
	  url: "<?php print base_url();?>estadopedido/eliminar",
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

//----------------------------------------------------------------------------------funcion crear
function crear (nombre, descripcion, callback) {
	$.ajax({                                               // envio de los datos
	  url: "<?php print base_url();?>estadopedido/crear",
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
		'  		<div>'+
		'			<h5>'+data.id+'</h5>'+
		'	  	</div>'+
		'	</td>'+
		'	<td>'+
		'    	<div class="editable escondido">'+
		'			<input type="text" class="form-control entnombre" value="'+ enombre +'"/>'+
		'    	</div>'+
		'    	<div class="mostrable">'+
		'			<h5 class="salnombre mostrable" value="'+ enombre +'"><strong>'+ enombre +'</strong></h5>'+
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
		'	  		<button type="button" class="btn btn-xs btn-success btn-guardar btn-editable" data-id="'+ data.id +'">Guardar</button>'+
		'	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar btn-editable">Cancelar</button>'+
		'    	</div>'+
		'    	<div class="mostrable">'+
		'	   		<button type="button" class="btn btn-xs btn-primary btn-editar btn-mostrable"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>'+
		'	   		<button type="button" class="btn btn-xs btn-danger btn-eliminar btn-mostrable" data-id="'+ data.id +'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>'+
		'    	</div>'+
		'	</td>'+	
		'</tr>');
	  }
	  else {alert(data.msj);callback(false)}
	  })
	 .error(function(){alert('No hay conexion');callback(false);})
}

</script>
