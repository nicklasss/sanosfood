<link rel="stylesheet" href="https://s3.amazonaws.com/sanosfood/js/jasny/jasny-bootstrap.min.css">
<script type="text/javascript" src="https://s3.amazonaws.com/sanosfood/js/jasny/jasny-bootstrap.min.js"></script>

<div class="panel panel-default">
	<div class="panel-heading text-center"><h2>Información del Producto</h2></div>
	<form class="form-horizontal form-contenedor">
		<div class="row registro">
			<div class="col-md-6">
				<label>Nombre del Producto</label>
				<strong><input type="text" class="form-control editable" id="nombre" readonly value="<?php print $producto->nombre;?>"/></strong>
			</div>
			<div class="col-md-6">
				<label>Ingredientes</label>
				<textarea type="text" class="form-control editable" id="ingredientes" readonly><?php print $producto->ingredientes;?></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label>Descripción</label>
				<textarea type="text" class="form-control editable" id="descripcion" readonly><?php print $producto->descripcion;?></textarea>
			</div>
			<div class="col-md-6">
				<label>Descripción Corta</label>
				<textarea type="text" class="form-control editable" id="descripcioncorta" readonly><?php print $producto->descripcioncorta;?></textarea>
			</div>
		</div>
	</form>
</div>

<div class="panel panel-default">
	<form class="form-horizontal form-contenedor">
		<div class="row registro">
			<div class="col-md-1 col-md-offset-1">
				<label>Peso</label>
				<input type="text" class="form-control editable" id="peso" readonly value="<?php print $producto->peso;?>"/>
			</div>
			<div class="col-md-1">
				<label>PesoNeto</label>
				<input type="text" class="form-control editable" id="pesoneto" name="pesoneto" readonly value="<?php print $producto->pesoneto;?>"/>
			</div>
			<div class="col-md-1">
				<label>Largo</label>
				<input type="text" class="form-control editable" id="largo" readonly value="<?php print $producto->largo;?>"/>
			</div>
			<div class="col-md-1">
				<label>Ancho</label>
				<input type="text" class="form-control editable" id="ancho" readonly value="<?php print $producto->ancho;?>"/>
			</div>
			<div class="col-md-1">
				<label>Alto</label>
				<input type="text" class="form-control editable" id="alto" readonly value="<?php print $producto->alto;?>"/>
			</div>
			<div class="col-md-2">
				<label>Marca</label>
				<select class="form-control editable" id="marca" disabled="disabled">
					<?php foreach ($marcas as $marca) {
						if ($marca->id == $producto->idmarca) {
							print '<option value="'.$marca->id.'" selected>'.$marca->nombre.'</option>'; }
						else {
							print '<option value="'.$marca->id.'">'.$marca->nombre.'</option>'; }
					}?>
				</select>
			</div>
			<div class="col-md-1">
				<label>Existencias</label>
				<input type="text" class="form-control editable input-lg text-center" id="existencias" readonly value="<?php print $producto->existencias;?>"/>
			</div>
			<div class="col-md-2">
				<label>Precio</label>
				<input type="text" class="form-control editable input-lg text-center" id="precio" readonly value="<?php print $producto->precio;?>"/>
			</div>
		</div>
	</form>
</div>


<!------------------------------------- edicion del campo CARACTERISTICAS --> 
<div class="row registro">
	<div class="col-md-4">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h3>Características</h3></div>
			<table class="table table-condensed table-striped">
				<tbody>
<?php
foreach ($caracteristicas as $caracteristica) {
	print '<tr>';
	print '<th scope="row">'.$caracteristica->nombre.'</th>';
	$entra = 0;
	foreach ($producto->caracteristicas as $procar) {
		if ($caracteristica->id == $procar->idcaracteristica) {
			$entra = 1;
			switch ($procar->tipo) {
				case "remove":
					print '<td>
			   	        	<label  class= "radio-inline" > 
								<input  type= "radio" data-valor="0" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "chulo"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							</label>
			        	</td>
			            <td>
			            	<label  class= "radio-inline" > 
								<input  type= "radio" data-valor="1" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "remove" checked> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</label> 
						</td>
			            <td>
			            	<label  class= "radio-inline" > 
								<input  type= "radio" data-valor="0" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "asterisk"> <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
							</label> 
						</td>
						</tr>';
					break;
				case "asterisk":
					print '<td>
			            	<label  class= "radio-inline" > 
								<input  type= "radio" data-valor="0" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "chulo"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							</label> 
			            </td>
			            <td>
			            	<label  class= "radio-inline" > 
								<input  type= "radio" data-valor="0" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "remove"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</label> 
						</td>
			            <td>
			            	<label  class= "radio-inline" > 
								<input  type= "radio" data-valor="1" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "asterisk" checked> <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
							</label> 
						</td>
						</tr>';
					break;
			}
		}
	}
	if ($entra == 0) {
					print '<td>
			            	<label  class= "radio-inline" > 
								<input  type= "radio" data-valor="1" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "chulo" checked> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							</label> 
			            </td>
			            <td>
			            	<label  class= "radio-inline" > 
								<input  type= "radio" data-valor="0" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "remove"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</label> 
						</td>
			            <td>
			            	<label  class= "radio-inline" > 
								<input  type= "radio" data-valor="0" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "asterisk"> <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
							</label> 
						</td>
						</tr>';
	}
}			            
?>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>


<!----------------------------------- edicion del campo CATEGORIAS --> 
	<div class="col-md-4">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h3>Categorias</h3></div>
			<table class="table table-condensed table-striped">
				<tbody>
<?php 
foreach ($categorias as $categoria) {
	print '<tr>';
	print '<th scope="row">'.$categoria->nombre.'</th>';
	$entra = 0;
	foreach ($producto->categorias as $procat) {
		if ($categoria->id == $procat->idcategoria) {
			$entra = 1;
			print '<td>
			     		<label  class= "checkbox" > 
							<input  type= "checkbox" data-valor="1" data-id="'.$categoria->id.'" name="cat'.$categoria->id.'" disabled="disabled" checked value="">
						</label> 
					</td>
					</tr>';
		}
	}
	if ($entra == 0) {
		print '<td>
     		<label  class= "checkbox" > 
				<input  type= "checkbox" data-valor="0" data-id="'.$categoria->id.'" name="cat'.$categoria->id.'" disabled="disabled" value="">
			</label> 
		</td>
		</tr>';
	}
}
?>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>

<!----------------------------------- Botones--> 
	<div class="col-md-4">
 
       <div class="panel panel-default panel-danger">
			<div class="panel-heading text-center"><h4>Modificación de la Información</h4></div>
			<table class="table table-condensed table-striped">
				<tbody>
				<tr role="row">
					<td>
						<button type="button" class="btn btn-lg btn-primary" id="btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
					</td>  
					<td>
			  			<button type="button" class="btn btn-lg btn-success" id="btn-guardar">Guardar</button>
					</td>  
					<td>
				  		<button type="button" class="btn btn-lg btn-warning" id="btn-cancelar">Cancelar</button>
					</td>  
				</tr>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->

		<div class="panel panel-default panel-info">
			<div class="panel-heading text-center"><h4>Cambio del Estado del Producto</h4></div>
			<table class="table table-condensed table-striped">
				<tbody>
				<tr role="row">
					<td width="50%">
			    		<strong><select class="form-control input-lg" id="estado" disabled="disabled">
							<?php foreach ($estados as $estado) {
								if ($estado->id == $producto->idestadoproducto) {
									print '<option value="'.$estado->id.'" selected>'.$estado->nombre.'</option>'; }
								else {
									print '<option value="'.$estado->id.'">'.$estado->nombre.'</option>'; }
							}?>
						</select></strong>
					</td>  
					<td>
						<button type="button" class="btn btn-xs btn-primary" id="btn-editar-est"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
					</td>  
					<td>
			  			<button type="button" class="btn btn-xs btn-success" id="btn-guardar-est">Guardar</button>
					</td>  
					<td>
				  		<button type="button" class="btn btn-xs btn-warning" id="btn-cancelar-est">Cancelar</button>
					</td>  
				</tr>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>

</div>


<!----------------------------------- Explicaciones--> 
<div class="row registro">
	<div class="col-md-12">
        <div class="panel panel-default">
			<div><h6><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Indica que el producto no contiene el alérgeno o trazas del mismo.</h6></div>
			<div><h6><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Indica que el alérgeno se añade directamente o indirectamente a través de otros ingredientes. Según lo declarado en la etiqueta del producto.</h6></div>
			<div><h6><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Indica que puede contener trazas del alérgeno por contaminación cruzada, según lo declarado en la etiqueta del producto. Esta información
					es correcta en el momento de la impresión, mayo de 2013. Para más información ponerse en contacto con Orgran.</h6></div>			

	   	</div>	
  	</div>
</div>


<div class="row registro">
	<div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-heading text-center"><h4>Imágenes</h4></div>
			<?php
			$i = 0;
			foreach ($producto->imagenes as $imagen) {
				$i = $i + 1;
				if ($i > 4) {break;}
				print ' <div class="col-lg-3">
							<a href="javascript:void(0)"><img class="img-responsive img03" data-id="'.$i.'" id="imgsmall'.$i.'" src="'.$imagen->imagen.'"/></a>
						</div>';
			};
			?>
		</div> <!-- Panel-->
	</div>
</div>

<div class="row">
	<div class="col-md-4">


       <h3 class="text-center"> Subida y precarga de imagenes </h3>
       <div id="respuesta" class="alert"></div>
       <form action="subirImagen" method="POST" enctype="multipart/form-data">
          <div class="row">
             <div class="col-lg-4">
                <input type="file" name="userfile" value="fichero"/>
             </div> 
          </div>
          <div class="row">
             <div class="col-lg-2">
                <input type="submit" value="Subir">
             </div>
          </div>
       </form>
<?php
if(isset($error)){
    echo "<strong style='color:red;'>".$error."</strong>";
}
if(isset($img)){
    echo "<strong style='color:green;'>".$img["orig_name"]." subido satisfactoriamente </strong>";
}
?>




	</div>
</div>



<!--------------------------------------------------------------------------------------------------------------------- -->
<script src="<?php print base_url();?>js/upload.js"></script>

<script type="text/javascript">

$(document).ready(function() { 
	$('#btn-guardar').hide();
	$('#btn-cancelar').hide();
	$('#btn-guardar-est').hide();
	$('#btn-cancelar-est').hide();

//   SUBIR ARCHIVOS
      mostrarArchivos();
      $("#boton_subir").on('click', function() {
         subirArchivos();
      });
      $("#archivos_subidos").on('click', '.eliminar_archivo', function() {
         var archivo = $(this).parents('.row').eq(0).find('span').text();
         archivo = $.trim(archivo);
         eliminarArchivos(archivo);
      });



//	 var hola = JSON.parse('<?php print json_encode($producto->caracteristicas);?>');
//   console.log(hola);

//----------------------------------------------------------------------------------EDITAR-EST
	$('.container').on('click','#btn-editar-est',function(event){
		sestado = $('#estado').val();
		$('#estado').attr('disabled', false);
		$('#btn-editar-est').hide();
		$('#btn-guardar-est').show();
		$('#btn-cancelar-est').show();
		$('#btn-editar').attr('disabled', true);
	});

//----------------------------------------------------------------------------------CANCELAR-EST
	$('.container').on('click','#btn-cancelar-est',function(event){
		$('#btn-editar-est').show();
		$('#btn-guardar-est').hide();
		$('#btn-cancelar-est').hide();
		$('#btn-editar').attr('disabled', false);

		$('#estado').val(sestado);
		$('#estado').attr('disabled', true);
	});

//----------------------------------------------------------------------------------GUARDAR-EST
	$('.container').on('click','#btn-guardar-est',function(event){
		eestado = $('#estado').val();
		$('#btn-editar-est').show();
		$('#btn-guardar-est').hide();
		$('#btn-cancelar-est').hide();
		$('#btn-editar').attr('disabled', false);

		$('#estado').attr('disabled', true);
		if (eestado == sestado) {return;}
		rta = guardarest(function(rta){
			if(rta) {
				$('#btn-editar-est').show();
				$('#btn-guardar-est').hide();
				$('#btn-cancelar-est').hide();
				$('#btn-editar').attr('disabled', false);
			} else {
				$('#estado').val(sestado);
				
			}
		});
	});

//----------------------------------------------------------------------------------EDITAR
	$('.container').on('click','#btn-editar',function(event){
		$('#btn-editar').hide();
		$('#btn-guardar').show();
		$('#btn-cancelar').show();
		$('#btn-editar-est').attr('disabled', true);

		snombre = 		$('#nombre').val();
		sdescripcion = 	$('#descripcion').val();
		sdescripcioncorta = 	$('#descripcioncorta').val();
		singredientes = $('#ingredientes').val();
		speso = 		$('#peso').val();
		spesoneto = 	$('#pesoneto').val();
		smarca = 		$('#marca').val();
		slargo = 		$('#largo').val();
		sancho = 		$('#ancho').val();
		salto = 		$('#alto').val();
		sprecio = 		$('#precio').val();
		sexistencias = 	$('#existencias').val();
		sestado = 		$('#estado').val();

		$('.editable').each(function() {$(this).attr('readonly', false);});
		$('.editable').each(function() {$(this).attr('disabled', false);});
		$('input[name*="car"]').each(function(){
			$(this).attr('disabled', false);
		});
		$('input[name*="cat"]').each(function(){
			$(this).attr('disabled', false);
		});

	});

//----------------------------------------------------------------------------------CANCELAR
	$('.container').on('click','#btn-cancelar',function(event){
		$('input[name*="car"]').each(function(){
			if ($(this).attr('data-valor') == "1") {
				$(this).prop('checked', true);
			} else {
				$(this).prop('checked', false);
			}
		});

		$('input[name*="cat"]').each(function(){
			if ($(this).attr('data-valor') == "1") {
				$(this).prop('checked', true);
			} else {
				$(this).prop('checked', false);
			}
		});

		$('#btn-editar').show();
		$('#btn-guardar').hide();
		$('#btn-cancelar').hide();
		$('#btn-editar-est').attr('disabled', false);

		$('#nombre').val(snombre);
		$('#descripcion').val(sdescripcion);
		$('#descripcioncorta').val(sdescripcioncorta);
		$('#ingredientes').val(singredientes);
		$('#peso').val(speso);
		$('#pesoneto').val(spesoneto);
		$('#marca').val(smarca);
		$('#largo').val(slargo);
		$('#ancho').val(sancho);
		$('#alto').val(salto);
		$('#precio').val(sprecio);
		$('#existencias').val(sexistencias);
		$('#estado').val(sestado);

		$('.editable').each(function() {$(this).attr('disabled', true);});
		$('.editable').each(function() {$(this).attr('readonly', true);});
		$('input[name*="car"]').each(function(){
			$(this).attr('disabled', true);
		});
		$('input[name*="cat"]').each(function(){
			$(this).attr('disabled', true);
		});

	});

//----------------------------------------------------------------------------------GUARDAR
	$('.container').on('click','#btn-guardar',function(event){
		enombre = 		$('#nombre').val();
		edescripcion = $('#descripcion').val();
		edescripcioncorta = $('#descripcioncorta').val();
		eingredientes = $('#ingredientes').val();
		epeso = 			$('#peso').val();
		epesoneto = 	$('#pesoneto').val();
		emarca = 		$('#marca').val();
		elargo = 		$('#largo').val();
		eancho = 		$('#ancho').val();
		ealto = 			$('#alto').val();
		eprecio = 		$('#precio').val();
		eexistencias = $('#existencias').val();
		eestado = 		$('#estado').val();

		rta = guardar(function(rta){
			if(rta) {
				$('#btn-editar').show();
				$('#btn-guardar').hide();
				$('#btn-cancelar').hide();
				$('#btn-editar-est').attr('disabled', false);

				$('.editable').each(function() {$(this).attr('disabled', true);});
				$('.editable').each(function() {$(this).attr('readonly', true);});
				
				$('input[name*="car"]').each(function(){
					if ($(this).prop('checked') == true) {
						$(this).attr('data-valor', "1");
					} else {
						$(this).attr('data-valor', "0");
					}
				});
				$('input[name*="car"]').each(function(){
					$(this).attr('disabled', true);
				});
				
				$('input[name*="cat"]').each(function(){
					if ($(this).prop('checked') == true) {
						$(this).attr('data-valor', "1");
					} else {
						$(this).attr('data-valor', "0");
					}
				});
				$('input[name*="cat"]').each(function(){
					$(this).attr('disabled', true);
				});
			};
		});
	});
});

//----------------------------------------------------------------------------------funcion guardar
function guardar (callback) {
	var dataproducto = {};
	dataproducto.id = <?php print $this->uri->segment(3);?>;
	if(snombre !== enombre) {dataproducto.nombre = enombre;}
	if(sdescripcion !== edescripcion) {dataproducto.descripcion = edescripcion;}
	if(sdescripcioncorta !== edescripcioncorta) {dataproducto.descripcioncorta = edescripcioncorta;}
	if(singredientes !== eingredientes)	{dataproducto.ingredientes = eingredientes;}
	if(speso !== epeso) {dataproducto.peso = epeso;}
	if(spesoneto !== epesoneto) {dataproducto.pesoneto = epesoneto;}
	if(smarca !== emarca) {dataproducto.idmarca = emarca;}
	if(slargo !== elargo) {dataproducto.largo = elargo;}
	if(sancho !== eancho) {dataproducto.ancho = eancho;}
	if(salto !== ealto) {dataproducto.alto = ealto;}
	if(sprecio !== eprecio) {dataproducto.precio = eprecio;}
	if(sexistencias !== eexistencias) {dataproducto.existencias = eexistencias;}
	if(sestado !== eestado) {dataproducto.estado = eestado;}

	var datacaracteristicas = [];
	$('input[name*="car"]:checked').each(function(){
		if($(this).val()!=='chulo'){
			var caracteristica = { "idcaracteristica" : $(this).attr('data-id') , "valor" : $(this).val() };
			datacaracteristicas.push(caracteristica);
		}
	});
	dataproducto.caracteristicas = datacaracteristicas;

	var datacategorias = [];
	$('input[name*="cat"]:checked').each(function(){
		var categoria = { "idcategoria" : $(this).attr('data-id') };
		datacategorias.push(categoria);
	});
	dataproducto.categorias = datacategorias;

  $.ajax({                                               // envio de los datos
	    url: "<?php print base_url();?>producto/editar",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {dataproducto : JSON.stringify(dataproducto) } })
   .done(function(data) {                               // respuesta del servidor
		if (data.res == "ok") {
			if (data.est !== "") {
				$('#estado').val(data.est);
			}
  			callback(true);
  		}else {
			alert(data.msj);
			$('#'+data.cmp+'').focus();
   			callback(false);
		}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}

//----------------------------------------------------------------------------------funcion guardar-est
function guardarest (callback) {
  $.ajax({                                               // envio de los datos
	    url: "<?php print base_url();?>producto/editarestado",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {id : <?php print $this->uri->segment(3);?>} })
   .done(function(data) {                               // respuesta del servidor
		if(data.res == "ok") {callback(true);}
		else {alert(data.msj);callback(false)}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}






//   SUBIR ARCHIVOS
 function subirArchivos() {
      $("#archivo").upload('producto/subirImagen',
      {
         nombre_archivo: $("#nombre_archivo").val()
      },
      function(respuesta) {
         //Subida finalizada.
         $("#barra_de_progreso").val(0);
         
         if (respuesta === 1) {
            mostrarRespuesta('El archivo ha sido subido correctamente.', true);
            $("#nombre_archivo, #archivo").val('');
         } else {
            mostrarRespuesta('El archivo NO se ha podido subir.', false);
         }
         mostrarArchivos();
         }, function(progreso, valor) {
            //Barra de progreso.
            $("#barra_de_progreso").val(valor);
         });
   }
   function eliminarArchivos(archivo) {
      $.ajax({
         url: 'eliminar_archivo.php',
         type: 'POST',
         timeout: 10000,
         data: {archivo: archivo},
         error: function() {
            mostrarRespuesta('Error al intentar eliminar el archivo.', false);
         },
         success: function(respuesta) {
            if (respuesta == 1) {
               mostrarRespuesta('El archivo ha sido eliminado.', true);
            } else {
               mostrarRespuesta('Error al intentar eliminar el archivo.', false); 
            }
            mostrarArchivos();
         }
      });
   }
   function mostrarArchivos() {
      $.ajax({
         url: 'mostrar_archivos.php',
         dataType: 'JSON',
         success: function(respuesta) {
            if (respuesta) {
               var html = '';
               for (var i = 0; i < respuesta.length; i++) {
                  if (respuesta[i] != undefined) {
                     html += '<div class="row"> <span class="col-lg-2"> ' + respuesta[i] + ' </span> <div class="col-lg-2"> <a class="eliminar_archivo btn btn-danger" href="javascript:void(0);"> Eliminar </a> </div> </div> <hr />';
                  }
               }
               $("#archivos_subidos").html(html);
            }
         }
      });
   }
   function mostrarRespuesta(mensaje, ok){
      $("#respuesta").removeClass('alert-success').removeClass('alert-danger').html(mensaje);
      if(ok){
         $("#respuesta").addClass('alert-success');
      }else{
         $("#respuesta").addClass('alert-danger');
      }
   }
   </script>