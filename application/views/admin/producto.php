<div class="row registro">
	<div class="col-md-12">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h2>Información del Producto</h2></div>
			<table class="table table-condensed table-striped">
				<tbody>

<!------------------------------------- edicion del campo NOMBRE--> 
				<tr>
					<td width="10%">
						<h4 class="text-right">Nombre:</h4>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<input type="text" class="form-control entvalor" value="<?php print $producto->nombre;?>"/>
				    	</div>
				    	<div class="mostrable">
							<h5 class="salvalor"><?php print $producto->nombre;?></h5>
				    	</div>
					</td>
					<td width="14%">
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="nombre">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
					</td>	
				</tr>

<!------------------------------------- edicion del campo DESCRIPCION--> 
				<tr>
					<td>
						<h4 class="text-right">Descripción:</h4>
					</td>
				 	<td>
				    	<div class="editable escondido">
					    	<textarea type="text" class="form-control entvalor"><?php print $producto->descripcion;?></textarea>
				    	</div>
				    	<div class="mostrable">
							<h5 class="salvalor"><?php print $producto->descripcion;?></h5>
				    	</div>
					</td>
					<td>
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="descripcion">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
					</td>	
				</tr>

<!------------------------------------- edicion del campo INGREDIENTES--> 
				<tr>
					<td>
						<h4 class="text-right">Ingredientes:</h4>
					</td>
				 	<td>
				    	<div class="editable escondido">
					    	<textarea type="text" class="form-control entvalor"><?php print $producto->ingredientes;?></textarea>
				    	</div>
				    	<div class="mostrable">
							<h5 class="salvalor"><?php print $producto->ingredientes;?></h5>
				    	</div>
					</td>
					<td>
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="ingredientes">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
					</td>	
				</tr>

				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>

<div class="row registro">
	<div class="col-md-6">
        <div class="panel panel-default">
			<table class="table table-condensed table-striped">
				<tbody>

<!------------------------------------- edicion del campo PESOS--> 
				<tr>
					<td width="21%">
						<h4 class="text-right">Peso:</h4>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<input type="text" class="form-control entvalor" value="<?php print $producto->peso;?>"/>
				    	</div>
				    	<div class="mostrable">
							<h5 class="salvalor"><?php print $producto->peso;?></h5>
				    	</div>
					</td>
					<td width="30%">
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="peso">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
					</td>	
				</tr>

<!------------------------------------- edicion del campo PESO NETO--> 
				<tr>
					<td>
						<h4 class="text-right">Peso Neto:</h4>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<input type="text" class="form-control entvalor" value="<?php print $producto->pesoneto;?>"/>
				    	</div>
				    	<div class="mostrable">
							<h5 class="salvalor"><?php print $producto->pesoneto;?></h5>
				    	</div>
					</td>
					<td>
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="pesoneto">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
					</td>	
				</tr>

<!------------------------------------- edicion del campo LARGO--> 
				<tr>
					<td>
						<h4 class="text-right">Largo:</h4>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<input type="text" class="form-control entvalor" value="<?php print $producto->largo;?>"/>
				    	</div>
				    	<div class="mostrable">
							<h5 class="salvalor"><?php print $producto->largo;?></h5>
				    	</div>
					</td>
					<td>
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="largo">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
					</td>	
				</tr>

<!------------------------------------- edicion del campo ANCHO--> 
				<tr>
					<td>
						<h4 class="text-right">Ancho:</h4>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<input type="text" class="form-control entvalor" value="<?php print $producto->ancho;?>"/>
				    	</div>
				    	<div class="mostrable">
							<h5 class="salvalor"><?php print $producto->ancho;?></h5>
				    	</div>
					</td>
					<td>
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="ancho">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
					</td>	
				</tr>

<!------------------------------------- edicion del campo ALTO--> 
				<tr>
					<td>
						<h4 class="text-right">Alto:</h4>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<input type="text" class="form-control entvalor" value="<?php print $producto->alto;?>"/>
				    	</div>
				    	<div class="mostrable">
							<h5 class="salvalor"><?php print $producto->alto;?></h5>
				    	</div>
					</td>
					<td>
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="alto">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
					</td>	
				</tr>

				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>


	<div class="col-md-6">
        <div class="panel panel-default">
			<table class="table table-condensed table-striped">
				<tbody>

<!------------------------------------- edicion del campo PRECIO--> 
				<tr>
					<td width="21%">
						<h4 class="text-right">Precio:</h4>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<input type="text" class="form-control entvalor" value="<?php print $producto->precio;?>"/>
				    	</div>
				    	<div class="mostrable">
							<h5 class="salvalor"><?php print number_format($producto->precio , 0, ",", ".");?></h5>
				    	</div>
					</td>
					<td width="30%">
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="precio">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
					</td>	
				</tr>

<!------------------------------------- edicion del campo EXISTENCIAS--> 
				<tr>
					<td>
						<h4 class="text-right">Existencias:</h4>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<input type="text" class="form-control entvalor" value="<?php print $producto->existencias;?>"/>
				    	</div>
				    	<div class="mostrable">
							<h5 class="salvalor"><?php print $producto->existencias;?></h5>
				    	</div>
					</td>
					<td>
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="existencias">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
					</td>	
				</tr>

<!------------------------------------- edicion del campo MARCA--> 
				<tr>
					<td>
						<h4 class="text-right">Marca:</h4>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<select class="form-control entvalor">
								<?php foreach ($marcas as $marca) {
									if ($marca->nombre == $producto->marca) {
										print '<option value="'.$marca->id.'" selected>'.$marca->nombre.'</option>'; }
									else {
										print '<option value="'.$marca->nombre.'">'.$marca->nombre.'</option>'; }
									}?>
							</select>   				    	</div>
				    	<div class="mostrable">
							<h5 class="salvalor"><?php print $producto->marca;?></h5>
				    	</div>
					</td>
					<td>
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="marca">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
					</td>	
				</tr>

<!------------------------------------- edicion del campo ESTADO--> 
				<tr>
					<td>
						<h4 class="text-right">Estado:</h4>
					</td>
				 	<td>
				    	<div class="editable escondido">
							<select class="form-control entvalor">
								<?php foreach ($estados as $estado) {
									if ($estado->nombre == $producto->estado) {
										print '<option value="'.$estado->id.'" selected>'.$estado->nombre.'</option>'; }
									else {
										print '<option value="'.$estado->nombre.'">'.$estado->nombre.'</option>'; }
									}?>
							</select>    		
				    	</div>
				    	<div class="mostrable">
							<h5 class="salvalor"><?php print $producto->estado;?></h5>
				    	</div>
					</td>
					<td>
				    	<div class="editable escondido">
					  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="estado">Guardar</button>
					  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
				    	</div>
				    	<div class="mostrable">
					   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
				    	</div>
					</td>	
				</tr>

				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>


<!------------------------------------- edicion del campo CARACTERISTICAS --> 
<div class="row registro">
	<div class="col-md-4 col-md-offset-1">
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
									<input  type= "radio" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "chulo"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
								</label>
			            </td>
			            <td>
			            	<label  class= "radio-inline" > 
									<input  type= "radio" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "remove" checked> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</label> 
							</td>
			            <td>
			            	<label  class= "radio-inline" > 
									<input  type= "radio" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "asterisk"> <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
								</label> 
							</td>
							</tr>';
					break;
				case "asterisk":
					print '<td>
			            	<label  class= "radio-inline" > 
									<input  type= "radio" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "chulo"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
								</label> 
			            </td>
			            <td>
			            	<label  class= "radio-inline" > 
									<input  type= "radio" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "remove"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</label> 
							</td>
			            <td>
			            	<label  class= "radio-inline" > 
									<input  type= "radio" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "asterisk" checked> <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
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
									<input  type= "radio" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "chulo" checked> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
								</label> 
			            </td>
			            <td>
			            	<label  class= "radio-inline" > 
									<input  type= "radio" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "remove"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</label> 
							</td>
			            <td>
			            	<label  class= "radio-inline" > 
									<input  type= "radio" data-id="'.$caracteristica->id.'" name= "car'.$caracteristica->id.'" disabled="disabled" value= "asterisk"> <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
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

 	<div class="col-md-1 editable-car escondido">
  		<button type="button" class="btn btn-xs btn-success btn-guardar-car" data-atributo="estado">Guardar</button>
  		<button type="button" class="btn btn-xs btn-warning btn-cancelar-car">Cancelar</button>
  	</div>	
	<div class="col-md-1 mostrable-car">
		<button type="button" class="btn btn-xs btn-primary btn-editar-car"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
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
							<input  type= "checkbox" data-id="'.$categoria->id.'" name="cat'.$categoria->id.'" disabled="disabled" checked value="">
						</label> 
					</td>
					</tr>';
		}
	}
	if ($entra == 0) {
		print '<td>
     		<label  class= "checkbox" > 
				<input  type= "checkbox" data-id="'.$categoria->id.'" name="cat'.$categoria->id.'" disabled="disabled" value="">
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

	<div class="editable-cat escondido">
	 	<div class="col-md-1 contenedor">
	  		<button type="button" class="btn btn-xs btn-success btn-guardar-cat" data-atributo="estado">Guardar</button>
	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar-cat">Cancelar</button>
	  	</div>	
	</div>
  	<div class="mostrable-cat">
	   	<div class="col-md-1">
	   		<button type="button" class="btn btn-xs btn-primary btn-editar-cat"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
	   	</div>	
  	</div>
</div>

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


<!--------------------------------------------------------------------------------------------------------------------- -->
<script type="text/javascript">

$(document).ready(function() { 

	$('.container').on('click','.btn-editar-car',function(event){
		$(event.target).parent().parent().parent().find('.editable-car').show();
		$(event.target).parent().parent().parent().find('.mostrable-car').hide();
		$('input[name*="car"]').each(function(){
			$(this).attr('disabled', false);
		});
	});
	$('.container').on('click','.btn-cancelar-car',function(event){
		$(event.target).parent().parent().parent().find('.mostrable-car').show();
		$(event.target).parent().parent().parent().find('.editable-car').hide();
		location.reload();
		$('input[name*="car"]').each(function(){
			$(this).attr('disabled', true);
		});
	});
	$('.container').on('click','.btn-guardar-car',function(event){
	   rta = guardar_car(function(rta){
			if(rta) {
				$(event.target).parent().parent().parent().find('.mostrable-car').show();
				$(event.target).parent().parent().parent().find('.editable-car').hide();
				$('input[name*="car"]').each(function(){
					$(this).attr('disabled', true);
				});
		   };
	   });
	});

	$('.container').on('click','.btn-editar-cat',function(event){
		$(event.target).parent().parent().parent().find('.editable-cat').show();
		$(event.target).parent().parent().parent().find('.mostrable-cat').hide();
		$('input[name*="cat"]').each(function(){
			$(this).attr('disabled', false);
		});
	});
	$('.container').on('click','.btn-cancelar-cat',function(event){
		$(event.target).parent().parent().parent().find('.mostrable-cat').show();
		$(event.target).parent().parent().parent().find('.editable-cat').hide();
		location.reload();
		$('input[name*="cat"]').each(function(){
			$(this).attr('disabled', true);
		});
	});
	$('.container').on('click','.btn-guardar-cat',function(event){
	   rta = guardar_cat(function(rta){
			if(rta) {
				$(event.target).parent().parent().parent().find('.mostrable-cat').show();
				$(event.target).parent().parent().parent().find('.editable-cat').hide();
				$('input[name*="cat"]').each(function(){
					$(this).attr('disabled', true);
				});
		   };
	   });
	});
	

	$('.container').on('click','.btn-editar',function(event){
		svalor = $(event.target).parent().parent().parent().find('.salvalor').html();
		$(event.target).parent().parent().parent().find('.entvalor').val(svalor);
		$(event.target).parent().parent().parent().find('.editable').show();
		$(event.target).parent().parent().parent().find('.mostrable').hide();
	});
	$('.container').on('click','.btn-cancelar',function(event){
		$(event.target).parent().parent().parent().find('.mostrable').show();
		$(event.target).parent().parent().parent().find('.editable').hide();
	});


	$('.container').on('click','.btn-guardar',function(event){
		evalor = $(event.target).parent().parent().parent().find('.entvalor').val();
		svalor = $(event.target).parent().parent().parent().find('.salvalor').html();
		campo = $(event.target).attr("data-atributo");

		if (campo == "nombre") {if (evalor == ""){ alert("el NOMBRE del producto no puede estar vacio"); return false;}}
		if (campo == "descripcion") {if (evalor == ""){ alert("la DESCRIPCION del producto no puede estar vacia"); return false;}}
		if (campo == "precio") { 
			if (evalor == "") {alert("el PRECIO del producto no puede estar vacio"); return false;}
			if(validarnumeroentero(evalor, "PRECIO")  == false) {return false;}}
		if (campo == "peso") { 
			if (evalor == "") {alert("el PESO del producto no puede estar vacio"); return false;}
			if(validarnumeroentero(evalor, "PESO")  == false) {return false;}}
		if (campo == "pesoneto") { 
			if (evalor == "") {alert("el PESO NETO del producto no puede estar vacio"); return false;}
			if(validarnumeroentero(evalor, "PESO NETO")  == false) {return false;}}
		if (campo == "largo") {if(evalor != "") {if(validarnumeroentero(evalor, "LARGO")  == false) {return false;}}}
		if (campo == "ancho") {if(evalor != "") {if(validarnumeroentero(evalor, "ANCHO")  == false) {return false;}}}
		if (campo == "alto") {if(evalor != "") {if(validarnumeroentero(evalor, "ALTO")  == false) {return false;}}}
		if (campo == "existencias") {if(validarnumeroentero(evalor, "EXISTENCIAS")  == false) {return false;}}

		if(evalor !== svalor) {
		   rta = guardar( $(event.target).attr("data-atributo") , evalor ,function(rta){
				if(rta) {
					$(event.target).parent().parent().parent().find('.salvalor').html(evalor); 
					$(event.target).parent().parent().parent().find('.mostrable').show();
					$(event.target).parent().parent().parent().find('.editable').hide();
			   };
		   });
		}else {
			$(event.target).parent().parent().parent().find('.salvalor').html(evalor); 
			$(event.target).parent().parent().parent().find('.mostrable').show();
			$(event.target).parent().parent().parent().find('.editable').hide(); 
		};
	});
});


function guardar (atributo, valor, callback) {
  $.ajax({                                               // envio de los datos
	    url: "<?php print base_url();?>producto/editar",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {id : <?php print $this->uri->segment(3);?>, atributo  : atributo, valor : valor } })
   .done(function(data) {                               // respuesta del servidor
    if(data.res=="ok") {callback(true)}
    else {alert(data.msj);callback(false)}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}

function guardar_car (callback) {
	var datacaracteristicas = [];
	$('input[name*="car"]:checked').each(function(){
		if($(this).val()!=='chulo'){
			var caracteristica = { "idcaracteristica" : $(this).attr('data-id') , "valor" : $(this).val() };
			datacaracteristicas.push(caracteristica);
		}
	});
  $.ajax({                                               // envio de los datos
	    url: "<?php print base_url();?>producto/guardarcar",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {id : <?php print $this->uri->segment(3);?>, datacaracteristicas : JSON.stringify(datacaracteristicas) } })
   .done(function(data) {                               // respuesta del servidor
    if(data.res=="ok") {callback(true)}
    else {alert(data.msj);callback(false)}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}

function guardar_cat (callback) {
	var datacategorias = [];
	$('input[name*="cat"]:checked').each(function(){
		var categoria = { "idcategoria" : $(this).attr('data-id') , "valor" : $(this).val() };
		datacategorias.push(categoria);
	});
  $.ajax({                                               // envio de los datos
	    url: "<?php print base_url();?>producto/editarcat",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {id : <?php print $this->uri->segment(3);?>, datacategorias : JSON.stringify(datacategorias) } })
   .done(function(data) {                               // respuesta del servidor
    if(data.res=="ok") {callback(true)}
    else {alert(data.msj);callback(false)}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}

function validarnumerodecimal (valor, campo) {
	var yavapunto = 0;
	for(var i = 0; i<valor.length;i++){
		if(valor.charCodeAt(i) == 46 && yavapunto == 1) {
			alert(campo + " debe tener solamente un punto decimal");
			return false;
		}
		if(valor.charCodeAt(i) == 46) {yavapunto = 1;}
		if((valor.charCodeAt(i) < 48 || valor.charCodeAt(i) > 57) && valor.charCodeAt(i) != 46) {
			alert(campo + " debe ser un número positivo, puede tener decimales");
			return false;
		}
	}
}

function validarnumeroentero (valor, campo) {
	for(var i = 0; i<valor.length;i++){
		if(valor.charCodeAt(i)<48 || valor.charCodeAt(i)>57) {
			alert(campo + " debe ser un número entero positivo");
			return false;
		}
	}
}

</script>