
<div class="container">
<div class="row">
	<div class="col-md-6">
		<h2>Información del Usuario</h2>
	</div>
	<div class="col-md-6 text-right" id="msg-error"></div>



</div>
<div class="row">
	<form>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<span class="control-label text-right">Nombre del Usuario</span>
						<strong><input type="text" id="nombreusuario" class="form-control editable" readonly value="<?php print $usuario->nombre;?>"/></strong>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<span class="control-label text-right">Celular</span>
						<input class="form-control editable" id="celular" readonly value="<?php print $usuario->celular;?>"/>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<span class="control-label text-right">Teléfono</span>
						<input class="form-control editable" id="telefono" readonly value="<?php print $usuario->telefono;?>"/>
					</div>
				</div>
			</div>
		</div>	
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<span class="control-label text-right">Email (usuario)</span>
						<strong><input type="email" id="email" class="form-control editable" readonly value="<?php print $usuario->correo;?>"/></strong>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<span class="control-label text-right">Tipo de Documento</span>
						<input class="form-control editable" id="tipodcto" readonly value="<?php print $usuario->tipo_identidad;?>"/>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<span class="control-label text-right">Número de Documento</span>
						<input class="form-control editable" id="nrodcto" readonly value="<?php print $usuario->nro_identidad;?>"/>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<span class="control-label text-right">Última dirección de envio</span>
					<strong><select class="form-control editable" id="ultimadireccion"disabled="enabled">
				<?php	if ($usuario->ultima_direccion == null) {
							print '<option> </option>';}
						foreach ($direcciones as $direccion) {
							if ($direccion->nombre == $usuario->ultima_direccion) {
								print '<option selected>'.$direccion->nombre.'</option>'; }
							else {
								print '<option>'.$direccion->nombre.'</option>'; }
				}?>
					</select></strong>
				</div>
			</div>









			<div class="row">

				<div class="col-md-12 text-right" id="botones">
					<br><button type="button" id="btn-editar-usuario" class="btn btn-xs btn-info">Editar Información</button>
					<button type="button" id="btn-borrar-usuario" class="btn btn-xs btn-danger">Borrar Cuenta</button>
				</div>
			</div>
		</div>



	</form>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<div><h2>Direcciones de envio</h2></div>
        <div class="panel panel-default">
			<table class="table table-condensed table-striped table-responsive">
				<thead>
				<tr role="row">
					<th width="0%"></th>
					<th width="10%">Nombre</th>
					<th width="25%">Dirección</th>
					<th width="14%">Barrio</th>
					<th width="14%">Ciudad</th>
					<th width="14%">Departamento</th>
					<th width="10%">Pais</th>
				</tr role="row">
				</thead>
				<tbody>

<?php
				foreach ($direcciones as $direccion) {
					print '
					<tr>
						<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entid hidden" value="'.$direccion->id.'"/></input>
					    	</div>
					    	<div class="mostrable">
								<h5 class="salid hidden">'.$direccion->id.'</h5>
					    	</div>
						</td>
						<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entnombre" value="'.$direccion->nombre.'"/></input>
					    	</div>
					    	<div class="mostrable">
								<h5 class="salnombre mostrable"><strong>'.$direccion->nombre.'</strong></h5>
					    	</div>
						</td>
					 	<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entdireccion" value="'.$direccion->direccion.'"></input>
					    	</div>
					    	<div class="mostrable">
								<h5 class="saldireccion mostrable" value="'.$direccion->direccion.'">'.$direccion->direccion.'</h5>
					    	</div>
						</td>
					 	<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entbarrio" value="'.$direccion->barrio.'"></input>
					    	</div>
					    	<div class="mostrable">
								<h5 class="salbarrio mostrable" value="'.$direccion->barrio.'">'.$direccion->barrio.'</h5>
					    	</div>
						</td>
					 	<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entciudad" value="'.$direccion->ciudad.'"></input>
					    	</div>
					    	<div class="mostrable">
								<h5 class="salciudad mostrable" value="'.$direccion->ciudad.'">'.$direccion->ciudad.'</h5>
					    	</div>
						</td>
					 	<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entregion" value="'.$direccion->region.'"></input>
					    	</div>
					    	<div class="mostrable">
								<h5 class="salregion mostrable" value="'.$direccion->region.'">'.$direccion->region.'</h5>
					    	</div>
						</td>
					 	<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entpais" value="'.$direccion->pais.'"></input>
					    	</div>
					    	<div class="mostrable">
								<h5 class="salpais mostrable" value="'.$direccion->pais.'">'.$direccion->pais.'</h5>
					    	</div>
						</td>
						<td width="15%">
					    	<div class="editable escondido">
						  		<button type="button" class="btn btn-xs btn-success btn-guardar btn-editable" data-id="'.$direccion->id.'">Guardar</button>
						  		<button type="button" class="btn btn-xs btn-warning btn-cancelar btn-editable">Cancelar</button>
					    	</div>
					    	<div class="mostrable">
						   		<button type="button" class="btn btn-xs btn-info btn-editar btn-mostrable">Editar</button>
						   		<button type="button" class="btn btn-xs btn-danger btn-eliminar btn-mostrable" data-id="'.$direccion->id.'">Eliminar</button>
					    	</div>
						</td>	
					</tr>';
				}
?>

					<tr id="ultima">
						<td>
					    	<div>
								<h5></h5>
					    	</div>
						</td>
						<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entnombre"></input>
					    	</div>
						</td>
					 	<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entdireccion"></input>
					    	</div>
						</td>
					 	<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entbarrio"></input>
					    	</div>
						</td>
					 	<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entciudad"></input>
					    	</div>
						</td>
					 	<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entregion"></input>
					    	</div>
						</td>
					 	<td>
					    	<div class="editable escondido">
								<input type="text" class="form-control entpais"></input>
					    	</div>
						</td>
						<td>
					    	<div class="editable escondido">
						  		<button type="button" class="btn btn-xs btn-success btn-agregar btn-editable" data-id="'.$direccion->id.'">Agregar</button>
						  		<button type="button" class="btn btn-xs btn-warning btn-cancelar btn-editable">Cancelar</button>
					    	</div>
					    	<div class="mostrable">
						   		<button type="button" class="btn btn-xs btn-success text-center btn-nuevo btn-mostrable"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</button>
					    	</div>
						</td>	
					</tr>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>

</div><!-- Container-->


<!--=================================================================================================================-->
<script type="text/javascript">

$(document).ready(function() { 

//-------------------------------------------------------------Manejo de botones para USUARIOS
	//---------------------------------------------------------Boton EDITAR
	$('.container').on('click','#btn-editar-usuario',function(event){
		sarta = '<span></span>'; $('#msg-error').html(sarta);    // Limpia mensaje de error		

		sarta = '	<br><button type="button" id="btn-guardar-usuario" class="btn btn-xs btn-success">Guardar Cambios</button>'+
				'	<button type="button" id="btn-descartar-usuario" class="btn btn-xs btn-warning">Descartar Cambios</button>';
		$('#botones').html(sarta);	

		onombreusuario =	$('#nombreusuario').val();
		oemail = 	$('#email').val();
		ocelular = 	$('#celular').val();
		otelefono = $('#telefono').val();
		otipodcto = $('#tipodcto').val();
		onrodcto = 	$('#nrodcto').val();
		oultimadireccion = 	$('#ultimadireccion').val();

		$('.editable').each(function() {$(this).attr('readonly', false);});
		$('.editable').each(function() {$(this).attr('disabled', false);});
	});

	//---------------------------------------------------------Boton DESCARTAR
	$('.container').on('click','#btn-descartar-usuario',function(event){
		sarta = '<br><button type="button" id="btn-editar-usuario" class="btn btn-xs btn-info">Editar Información</button>'+
				' <button type="button" id="btn-borrar-usuario" class="btn btn-xs btn-danger">Borrar Cuenta</button>';
		$('#botones').html(sarta);				 

		sarta = '<span><strong style="color:orange;">** Cambios descartados **</strong></span>';  // Mensaje de error
		$('#msg-error').html(sarta);		

		$('.editable').each(function() {$(this).attr('readonly', true);});
		$('.editable').each(function() {$(this).attr('disabled', true);});
		$('#nombreusuario').val(onombreusuario);
		$('#email').val(oemail);
		$('#celular').val(ocelular);
		$('#telefono').val(otelefono);
		$('#tipodcto').val(otipodcto);
		$('#nrodcto').val(onrodcto);
		$('#ultimadireccion').val(oultimadireccion);
	});

	//---------------------------------------------------------Boton GUARDAR
	$('.container').on('click','#btn-guardar-usuario',function(event){
		sarta = '<span></span>'; $('#msg-error').html(sarta);    // Limpia mensaje de error		

		sarta = '<br><button type="button" id="btn-editar-usuario" class="btn btn-xs btn-info">Editar Información</button>'+
				' <button type="button" id="btn-borrar-usuario" class="btn btn-xs btn-danger">Borrar Cuenta</button>';
		$('#botones').html(sarta);				 

		$('.editable').each(function() {$(this).attr('readonly', true);});
		rta = guardar_usuario(function(rta){ 
			if(!rta) {
				sarta = '<button type="button" id="btn-editar" class="btn btn-xs btn-info">Editar Información</button>';
				$('#botones').html(sarta);				 

				$('.editable').each(function() {$(this).attr('readonly', true);});
				$('#nombreusuario').val(onombreusuario);
				$('#email').val(oemail);
				$('#celular').val(ocelular);
				$('#telefono').val(otelefono);
				$('#tipodcto').val(otipodcto);
				$('#nrodcto').val(onrodcto);
			}
		})
	});

	//---------------------------------------------------------Boton BORRAR
	$('.container').on('click','#btn-borrar-usuario',function(event){
		sarta = '<span></span>'; $('#msg-error').html(sarta);    // Limpia mensaje de error		
		rta = confirm("presione ACEPTAR para confirmar ELIMINAR el usuario, o CANCEL para no borrar");
		if (rta) {
			rta1 = eliminar_usuario(function(rta){
				if(rta) {
				};
			});
		}
	});


// ----------------------------------------------------Manejo de botones para DIRECCIONES
	//-------------------------------------------------EDITAR
	$('.container').on('click','.btn-editar',function(event){
		sid  		= $(event.target).parent().parent().parent().find('.salid').text();
		snombre 	= $(event.target).parent().parent().parent().find('.salnombre').text();
		sdireccion 	= $(event.target).parent().parent().parent().find('.saldireccion').text();
		sbarrio 	= $(event.target).parent().parent().parent().find('.salbarrio').text();
		sciudad 	= $(event.target).parent().parent().parent().find('.salciudad').text();
		sregion 	= $(event.target).parent().parent().parent().find('.salregion').text();
		spais 		= $(event.target).parent().parent().parent().find('.salpais').text();
		$(event.target).parent().parent().parent().find('.editable').show();
		$(event.target).parent().parent().parent().find('.mostrable').hide();
		$('.btn-mostrable').each(function() {$(this).attr('disabled', true);});
	});

	//-------------------------------------------------CANCELAR
	$('.container').on('click','.btn-cancelar',function(event){
		sid = $(event.target).parent().parent().parent().find('.salid').text();
		$(event.target).parent().parent().parent().find('.entid').val(sid);
		snombre = $(event.target).parent().parent().parent().find('.salnombre').text();
		$(event.target).parent().parent().parent().find('.entnombre').val(snombre);
		sdireccion = $(event.target).parent().parent().parent().find('.saldireccion').text();
		$(event.target).parent().parent().parent().find('.entdireccion').val(sdireccion);
		sbarrio = $(event.target).parent().parent().parent().find('.salbarrio').text();
		$(event.target).parent().parent().parent().find('.entbarrio').val(sbarrio);
		sciudad = $(event.target).parent().parent().parent().find('.salciudad').text();
		$(event.target).parent().parent().parent().find('.entciudad').val(sciudad);
		sregion = $(event.target).parent().parent().parent().find('.salregion').text();
		$(event.target).parent().parent().parent().find('.entregion').val(sregion);
		spais = $(event.target).parent().parent().parent().find('.salpais').text();
		$(event.target).parent().parent().parent().find('.entpais').val(spais);
		$(event.target).parent().parent().parent().find('.mostrable').show();
		$(event.target).parent().parent().parent().find('.editable').hide();
		$('.btn-mostrable').each(function() {$(this).attr('disabled', false);});
	});

	//-------------------------------------------------ELIMINAR
	$('.container').on('click','.btn-eliminar',function(event){
		sid  		= $(event.target).parent().parent().parent().find('.salid').text();
		rta = confirm("presione ACEPTAR para confirmar borrado, o CANCEL para no borrar");
		if (rta) {
			rta1 = eliminar(function(rta){
			   if(rta) {
					$(event.target).parent().parent().parent().remove();
					location.reload();
					sarta = '<span><strong style="color:orange;">** Dirección Borrada OK **</strong></span>';  // Mensaje de error
					$('#msg-error').html(sarta);		
				} else {
					$(event.target).parent().parent().parent().find('.btn-eliminar').attr('disabled', true); 
				};
		   });
		}
	});

	//-------------------------------------------------NUEVO
	$('.container').on('click','.btn-nuevo',function(event){
		$(event.target).parent().parent().parent().find('.entid').val("");
		$(event.target).parent().parent().parent().find('.entnombre').val("");
		$(event.target).parent().parent().parent().find('.entdireccion').val("");
		$(event.target).parent().parent().parent().find('.entbarrio').val("");
		$(event.target).parent().parent().parent().find('.entciudad').val("");
		$(event.target).parent().parent().parent().find('.entregion').val("");
		$(event.target).parent().parent().parent().find('.entpais').val("");
		$(event.target).parent().parent().parent().find('.editable').show();
		$(event.target).parent().parent().parent().find('.mostrable').hide();
		$(event.target).parent().parent().parent().find('.entnombre').focus();
		$('.btn-mostrable').each(function() {$(this).attr('disabled', true);});
	});

	//-------------------------------------------------nuevo AGREGAR
	$('.container').on('click','.btn-agregar',function(event){
		enombre = $(event.target).parent().parent().parent().find('.entnombre').val().trim();
		edireccion = $(event.target).parent().parent().parent().find('.entdireccion').val().trim();
		ebarrio = $(event.target).parent().parent().parent().find('.entbarrio').val().trim();
		eciudad = $(event.target).parent().parent().parent().find('.entciudad').val().trim();
		eregion = $(event.target).parent().parent().parent().find('.entregion').val().trim();
		epais = $(event.target).parent().parent().parent().find('.entpais').val().trim();
		if (edireccion == "") {
			alert ("el Dirección no puede estar vacia");
			$(event.target).parent().parent().parent().find('.entdireccion').focus();
			return false;
		};
		if (eciudad == "") {
			alert ("la Ciudad no puede estar vacia");
			$(event.target).parent().parent().parent().find('.entciudad').focus();
			return false;
		};
		$('.btn-mostrable').each(function() {$(this).attr('disabled', false);});
		rta = crear( function(rta){
			if(rta) {
				location.reload();
				$(event.target).parent().parent().parent().find('.mostrable').show();
				$(event.target).parent().parent().parent().find('.editable').hide();
			} else {
				$(event.target).parent().parent().parent().find('.entnombre').focus();
			};
		});
	});

	//-------------------------------------------------editar GUARDAR
	$('.container').on('click','.btn-guardar',function(event){
		eid 		= $(event.target).parent().parent().parent().find('.entid').val().trim();
		enombre 	= $(event.target).parent().parent().parent().find('.entnombre').val().trim();
		edireccion 	= $(event.target).parent().parent().parent().find('.entdireccion').val().trim();
		ebarrio = $(event.target).parent().parent().parent().find('.entbarrio').val().trim();
		eciudad = $(event.target).parent().parent().parent().find('.entciudad').val().trim();
		eregion = $(event.target).parent().parent().parent().find('.entregion').val().trim();
		epais = $(event.target).parent().parent().parent().find('.entpais').val().trim();
		if (edireccion == "") {
			alert ("el Dirección no puede estar vacia");
			$(event.target).parent().parent().parent().find('.entdireccion').focus();
			return false;
		};
		if (eciudad == "") {
			alert ("la Ciudad no puede estar vacia");
			$(event.target).parent().parent().parent().find('.entciudad').focus();
			return false;
		};

		if(enombre !== snombre || edireccion !== sdireccion || ebarrio !== sbarrio ||
		   eciudad !== sciudad || eregion !== sregion || epais !== spais) {
			rta = guardar(function(rta){
				if (rta) {
					$(event.target).parent().parent().parent().find('.salnombre').text(enombre);		
					$(event.target).parent().parent().parent().find('.saldireccion').text(edireccion);		
					$(event.target).parent().parent().parent().find('.salbarrio').text(ebarrio);		
					$(event.target).parent().parent().parent().find('.salciudad').text(eciudad);		
					$(event.target).parent().parent().parent().find('.salregion').text(eregion);		
					$(event.target).parent().parent().parent().find('.salpais').text(epais);		
				}
			});
		};
		$(event.target).parent().parent().parent().find('.editable').hide();
		$(event.target).parent().parent().parent().find('.mostrable').show();
		$('.btn-mostrable').each(function() {$(this).attr('disabled', false);});
	});

});

//----------------------------------------------------------------------------------funcion guardar
function guardar (callback) {
	$.ajax({                                               // envio de los datos
	  url: "<?php print base_url();?>direccion/actualizar",
	  context: document.body,
	  dataType: "json",
	  type: "POST",
	  data: {id : sid, nombre : enombre, direccion : edireccion, barrio : ebarrio, ciudad : eciudad, region : eregion, pais : epais } })
	 .done(function(data) {                               // respuesta del servidor
	  if(data.res == "ok") {callback(true)}
	  else {alert(data.msj);callback(false)}
	  })
	 .error(function(){alert('No hay conexion');callback(false);})
}

//----------------------------------------------------------------------------------funcion eliminar
function eliminar (callback) {
	$.ajax({                                               // envio de los datos
	  url: "<?php print base_url();?>direccion/eliminar",
	  context: document.body,
	  dataType: "json",
	  type: "POST",
	  data: {id : sid } })
	 .done(function(data) {                               // respuesta del servidor
	  if(data.res == "ok") {callback(true)}
	  else {alert(data.msj);callback(false)}
	  })
	 .error(function(){alert('No hay conexion');callback(false);})
}

//----------------------------------------------------------------------------------funcion crear
function crear (callback) {
	$.ajax({                                              
	  url: "<?php print base_url();?>direccion/crear",
	  context: document.body,
	  dataType: "json",
	  type: "POST",
	  data: {idusuario : <?php print $usuario->id;?>, nombre : enombre, direccion : edireccion, barrio : ebarrio, ciudad : eciudad, region : eregion, pais : epais } })
	 .done(function(data) {                               
		if(data.res=="ok") {
			callback(true);
			sarta = 
				'<tr class="success">'+
				'	<td>'+
				'  		<div>'+
				'			<h5 class="salid" value=">'+data.id+'"></h5>'+
				'	  	</div>'+
				'	</td>'+
				'	<td>'+
				'    	<div class="editable escondido">'+
				'			<input type="text" class="form-control entnombre" value="'+ enombre +'"/></input>'+
				'    	</div>'+
				'    	<div class="mostrable">'+
				'			<h5 class="salnombre mostrable" value="'+ enombre +'"><strong>'+ enombre +'</strong></h5>'+
				'    	</div>'+
				'	</td>'+
				' 	<td>'+
				'    	<div class="editable escondido">'+
				'			<input type="text" class="form-control entdireccion" value="'+ edireccion +'"></input>'+
				'    	</div>'+
				'    	<div class="mostrable">'+
				'			<h5 class="saldireccion mostrable" value="'+ edireccion +'">'+ edireccion +'</h5>'+
				'    	</div>'+
				'	</td>'+
				' 	<td>'+
				'    	<div class="editable escondido">'+
				'			<input type="text" class="form-control entbarrio" value="'+ ebarrio +'"></input>'+
				'    	</div>'+
				'    	<div class="mostrable">'+
				'			<h5 class="salbarrio mostrable" value="'+ ebarrio +'">'+ ebarrio +'</h5>'+
				'    	</div>'+
				'	</td>'+
				' 	<td>'+
				'    	<div class="editable escondido">'+
				'			<input type="text" class="form-control entciudad" value="'+ eciudad +'"></input>'+
				'    	</div>'+
				'    	<div class="mostrable">'+
				'			<h5 class="salciudad mostrable" value="'+ eciudad +'">'+ eciudad +'</h5>'+
				'    	</div>'+
				'	</td>'+
				' 	<td>'+
				'    	<div class="editable escondido">'+
				'			<input type="text" class="form-control entregion" value="'+ eregion +'"></input>'+
				'    	</div>'+
				'    	<div class="mostrable">'+
				'			<h5 class="salregion mostrable" value="'+ eregion +'">'+ eregion +'</h5>'+
				'    	</div>'+
				'	</td>'+
				' 	<td>'+
				'    	<div class="editable escondido">'+
				'			<input type="text" class="form-control entpais" value="'+ epais +'"></input>'+
				'    	</div>'+
				'    	<div class="mostrable">'+
				'			<h5 class="salpais mostrable" value="'+ epais +'">'+ epais +'</h5>'+
				'    	</div>'+
				'	</td>'+
				'	<td>'+
				'    	<div class="editable escondido">'+
				'	  		<button type="button" class="btn btn-xs btn-success btn-guardar btn-editable" data-id="'+ data.id +'">Guardar</button>'+
				'	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar btn-editable">Cancelar</button>'+
				'    	</div>'+
				'    	<div class="mostrable">'+
				'	   		<button type="button" class="btn btn-xs btn-primary btn-editar btn-mostrable">Editar</button>'+
				'	   		<button type="button" class="btn btn-xs btn-danger btn-eliminar btn-mostrable" data-id="'+ data.id +'">Eliminar</button>'+
				'    	</div>'+
				'	</td>'+	
				'</tr>';
			$("#ultima").before(sarta);

	  }
	  else {alert(data.msj);callback(false)}
	  })
	 .error(function(){alert('No hay conexion');callback(false);})
}

//----------------------------------------------------------------------------------funcion eliminar
function eliminar_usuario (callback) {
	$.ajax({                                               // envio de los datos
	  url: "<?php print base_url();?>usuario/eliminar",
	  context: document.body,
	  dataType: "json",
	  type: "POST",
	  data: {idusuario : <?php print $usuario->id;?> } })
	 .done(function(data) {                               // respuesta del servidor
	  if(data.res == "ok") {
		window.location="<?php print base_url();?>web/logout";
	  	callback(true)}
	  else {alert(data.msj);callback(false)}
	  })
	 .error(function(){alert('No hay conexion');callback(false);})
}

//----------------------------------------------------------------------------------funcion guardar
function guardar_usuario (callback) {
  $.ajax({                                              
	    url: "<?php print base_url();?>usuario/actualizar",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {	idusuario : <?php print $usuario->id;?>,
	    		nombre : $('#nombreusuario').val(), email : $('#email').val(), celular : $('#celular').val(), telefono : $('#telefono').val(),
	    		tipodcto : $('#tipodcto').val(), nrodcto : $('#nrodcto').val(), ultimadireccion : $('#ultimadireccion').val()} })

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

</script>
