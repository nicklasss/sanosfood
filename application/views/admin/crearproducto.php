<div class="row registro">
	<div class="col-md-12">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h2>Nuevo Producto</h2></div>
			<table class="table table-condensed table-striped">
				<tbody>

<!------------------------------------- edicion del campo NOMBRE--> 
				<tr>
					<td width="10%"><h5 class="text-right"><strong>Nombre:</strong></h5></td>
				 	<td><div><input type="text" class="form-control entnombre" placeholder="obligatorio"></div></td>
				</tr>

<!------------------------------------- edicion del campo DESCRIPCION--> 
				<tr>
					<td><h5 class="text-right"><strong>Descripción:</strong></h5></td>
				 	<td><div><textarea type="text" class="form-control entdescripcion" placeholder="obligatorio"></textarea></div></td>
				</tr>

<!------------------------------------- edicion del campo INGREDIENTES--> 
				<tr>
					<td><h5 class="text-right"><strong>Ingredientes:</strong></h5></td>
				 	<td><div><textarea type="text" class="form-control entingredientes"></textarea></div></td>
				</tr>

				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>


<div class="row registro">
	<div class="col-md-4">
        <div class="panel panel-default">
			<table class="table table-condensed table-striped">
				<tbody>

<!------------------------------------- edicion del campo PESO--> 
				<tr>
					<td width="30%"><h5 class="text-right"><strong>Peso:</strong></h5></td>
				 	<td><div><input type="text" class="form-control entpeso" placeholder="obligatorio"></div></td>
				</tr>

<!------------------------------------- edicion del campo PESO NETO--> 
				<tr>
					<td><h5 class="text-right"><strong>Peso Neto:</strong></h5></td>
				 	<td><div><input type="text" class="form-control entpesoneto" placeholder="obligatorio"></div></td>
				</tr>

<!------------------------------------- edicion del campo MARCA--> 
				<tr>
					<td><h5 class="text-right"><strong>Marca:</strong></h5></td>
				 	<td>
				 		<div>
						<select class="form-control entmarca"  placeholder="obligatorio">
							<?php foreach ($marcas as $marca) {
									print '<option value="'.$marca->id.'">'.$marca->nombre.'</option>'; }
							?>
						</select>   				 		
						</div>
				 	</td>
				</tr>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>


	<div class="col-md-4">
        <div class="panel panel-default">
			<table class="table table-condensed table-striped">
				<tbody>

<!------------------------------------- edicion del campo LARGO--> 
				<tr>
					<td width="30%"><h5 class="text-right"><strong>Largo:</strong></h5></td>
				 	<td><div><input type="text" class="form-control entlargo"></div></td>
				</tr>
<!------------------------------------- edicion del campo ANCHO--> 
				<tr>
					<td><h5 class="text-right"><strong>Ancho:</strong></h5></td>
				 	<td><div><input type="text" class="form-control entancho"></div></td>
				</tr>

<!------------------------------------- edicion del campo ALTO--> 
				<tr>
					<td><h5 class="text-right"><strong>Alto:</strong></h5></td>
				 	<td><div><input type="text" class="form-control entalto"></div></td>
				</tr>

				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>


	<div class="col-md-4">
        <div class="panel panel-default">
			<table class="table table-condensed table-striped">
				<tbody>

<!------------------------------------- edicion del campo PRECIO--> 
				<tr>
					<td width="30%"><h5 class="text-right"><strong>Precio:</strong></h5></td>
				 	<td><div><input type="text" class="form-control entprecio" placeholder="obligatorio"></div></td>
				</tr>

<!------------------------------------- edicion del campo EXISTENCIAS--> 
				<tr>
					<td><h5 class="text-right"><strong>Existencias:</strong></h5></td>
				 	<td><div><input type="text" class="form-control entexistencias"></div></td>
				</tr>

<!------------------------------------- edicion del campo ESTADO--> 
				<tr>
					<td><h5 class="text-right"><strong>Estado:</strong></h5></td>
				 	<td>
				 		<div>
						<select class="form-control entestado"  placeholder="obligatorio">
							<?php foreach ($estados as $estado) {
									print '<option value="'.$estado->id.'">'.$estado->nombre.'</option>'; }
							?>
						</select> 
						</div>
				 	</td>
				</tr>

				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>


<!----------------------------------- edicion del campo CARACTERISTICAS--> 
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
	print '<td>
	     		<label  class= "radio-inline" > 
					<input  type= "radio" data-id="'.$caracteristica->id.'"  name="car'.$caracteristica->id.'" value="chulo" checked> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				</label> 
			</td>
			<td>
				<label  class= "radio-inline" > 
					<input  type= "radio" data-id="'.$caracteristica->id.'" name="car'.$caracteristica->id.'" value="remove"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</label> 
			</td>
			<td>
			  	<label  class= "radio-inline" > 
					<input  type= "radio" data-id="'.$caracteristica->id.'" name="car'.$caracteristica->id.'" value="asterisk"> <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
				</label> 
			</td>
			</tr>';
}
?>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
<!--</div> -->



<!----------------------------------- edicion del campo CATEGORIAS --> 
	<div class="col-md-4 col-md-offset-1">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h3>Categorias</h3></div>
			<table class="table table-condensed table-striped">
				<tbody>
<?php 
foreach ($categorias as $categoria) {
	print '<tr>';
	print '<th scope="row">'.$categoria->nombre.'</th>';
	print '<td>
	     		<label  class= "checkbox" > 
					<input  type= "checkbox" data-id="'.$categoria->id.'"  name= "cat'.$categoria->id.'" value= "">
				</label> 
			</td>
			</tr>';
}
?>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
	<div class="col-md-2">
  		<button type="button" class="btn btn-md btn-success btn-guardar">Guardar</button>
  		<button type="button" class="btn btn-md btn-warning btn-limpiar">Limpiar</button>
	</div>  		
</div>

<!------------------------------------------------------------------------------------------------------------------------------------> 
<script type="text/javascript">
$(document).ready(function() { 

	window.onload = function() {
	    $('.container').find('.entnombre').focus();
	};

	$('.container').on('click','.btn-limpiar',function(event){
		limpiarpantalla();
	});

	$('.container').on('click','.btn-guardar',function(event){
		enombre = $('.container').find('.entnombre').val();
		edescripcion = $('.container').find('.entdescripcion').val();
		eingredientes = $('.container').find('.entingredientes').val();
		emarca = $('.container').find('.entmarca').val();
		eprecio = $('.container').find('.entprecio').val();
		epeso = $('.container').find('.entpeso').val();
		epesoneto = $('.container').find('.entpesoneto').val();
		elargo = $('.container').find('.entlargo').val();
		eancho = $('.container').find('.entancho').val();
		ealto = $('.container').find('.entalto').val();
		eexistencias = $('.container').find('.entexistencias').val();
		eestado = $('.container').find('.entestado').val();
		if(enombre == "" || edescripcion == "" || emarca == "" || eprecio == "" || epeso == "" || epesoneto == "" || eestado == "") {
			alert("Los campos obligatorios deben estar diligenciados");
			return false; }

		if(validarnumeroentero(eprecio, "PRECIO")  == false) {return false;}
		if(validarnumeroentero(epeso, "PESO")  == false) {return false;}
		if(validarnumeroentero(epesoneto, "PESO NETO")  == false) {return false;}
		if(elargo != "") {if(validarnumeroentero(elargo, "LARGO") == false) {return false;}}
		if(eancho != "") {if(validarnumeroentero(eancho, "ANCHO") == false) {return false;}}
		if(ealto != "")  {if(validarnumeroentero(ealto, "ALTO")  == false) {return false;}}
		if(eexistencias != "")  {if(validarnumeroentero(eexistencias, "EXISTENCIAS")  == false) {return false;}}
		
		rta = crear( enombre, edescripcion, eingredientes, emarca, eprecio, epeso, epesoneto, elargo, eancho, ealto, eexistencias, eestado, function(rta) {
			if(rta) {
				limpiarpantalla();
			} else {
				$(event.target).parent().parent().parent().find('.entnombre').focus();
			};
		});
	});
});

function crear (nombre, descripcion, ingredientes, marca, precio, peso, pesoneto, largo, ancho, alto, existencias, estado, callback) {
	var datacaracteristicas = [];
	$('input[name*="car"]:checked').each(function(){
		if($(this).val()!=='chulo'){
			var caracteristica = { "idcaracteristica" : $(this).attr('data-id') , "valor" : $(this).val() };
			datacaracteristicas.push(caracteristica);
		}
	});
	var datacategorias = [];
	$('input[name*="cat"]:checked').each(function(){
		var categoria = { "idcategoria" : $(this).attr('data-id') };
		datacategorias.push(categoria);
	});
  $.ajax({                                               
	    url: "<?php print base_url();?>producto/crear",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {nombre : nombre, descripcion : descripcion, ingredientes : ingredientes, precio : precio, marca : marca, pesoneto : pesoneto, 
	    		  peso : peso, largo : largo, ancho : ancho, alto : alto, existencias : existencias, estado : estado,
	           datacaracteristicas : JSON.stringify(datacaracteristicas), datacategorias : JSON.stringify(datacategorias) } })
   .done(function(data) {                               // respuesta del servidor
    if(data.res=="ok") {callback(true)}
    else {alert(data.msj);callback(false)}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}

function validarnumeroentero (valor, campo) {
	for(var i = 0; i<valor.length;i++){
		if(valor.charCodeAt(i)<48 || valor.charCodeAt(i)>57) {
			alert(campo + " debe ser un número entero positivo");
			return false;
		}
	}
}

function limpiarpantalla () {
	$('.container').find('.entnombre').val("");
	$('.container').find('.entdescripcion').val("");
	$('.container').find('.entingredientes').val("");
	$('.container').find('.entprecio').val("");
	$('.container').find('.entpeso').val("");
	$('.container').find('.entpesoneto').val("");
	$('.container').find('.entlargo').val("");
	$('.container').find('.entancho').val("");
	$('.container').find('.entalto').val("");
	$('.container').find('.entexistencias').val("");
	$('.container').find('.entestado').val("");
	$('.container').find('.entnombre').focus();
	$('input[value*="chulo"]').each(function(){
		$(this).prop("checked", true);
	});
	$('input[name*="cat"]').each(function(){
		$(this).prop("checked", false);
	});

}

</script>