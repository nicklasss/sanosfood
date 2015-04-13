<h2>NUEVOS PRODUCTOS</h2>
<form class="form-horizontal form-contenedor" role="form">

<div class="row registro">
	<label class="col-md-2 control-label">Nombre:</label>
	<div class="col-md-8">
    	<input type="text" class="form-control entnombre" placeholder="obligatorio">
	</div>
</div>

<div class="row registro">
	<label class="col-md-2 control-label">Descripción:</label>
	<div class="col-md-8">
    	<textarea type="text" class="form-control entdescripcion" placeholder="obligatorio"></textarea>
  	</div>
</div>

<div class="row registro">
	<label class="col-md-2 control-label">Ingredientes:</label>
	<div class="col-md-8">
    	<textarea type="text" class="form-control entingredientes"></textarea>
  	</div>
</div>

<div class="row registro">
	<div class="col-md-2"></div>
	<div class="col-md-2">Marca</div>
	<div class="col-md-2">Precio</div>
	<div class="col-md-2">Existencias</div>
	<div class="col-md-2">Estado</div>
</div>

<div class="row registro">
	<div class="col-md-2"></div>
	<div class="col-md-2">
		<select class="form-control entmarca"  placeholder="obligatorio">
			<?php foreach ($marcas as $marca) {
					print '<option value="'.$marca->id.'">'.$marca->nombre.'</option>'; }
			?>
		</select>    		
 	</div>
	<div class="col-md-2"><input type="text" class="form-control entprecio" placeholder="obligatorio"></div>
	<div class="col-md-2"><input type="text" class="form-control entexistencias" placeholder="obligatorio"></div>
	<div class="col-md-2">
		<select class="form-control entestado"  placeholder="obligatorio">
			<?php foreach ($estados as $estado) {
					print '<option value="'.$estado->id.'">'.$estado->nombre.'</option>'; }
			?>
		</select>    		
 	</div>
</div>


<div class="row registro">
	<div class="col-md-2"></div>
	<div class="col-md-1">Peso</div>
	<div class="col-md-1">Peso Neto</div>
	<div class="col-md-1">Largo</div>
	<div class="col-md-1">Ancho</div>
	<div class="col-md-1">Alto</div>
</div>

<div class="row registro">
	<label class="col-md-2 control-label">Dimensiones:</label>
	<div class="col-md-1"><input type="text" class="form-control entpeso" placeholder="obligatorio"></div>
	<div class="col-md-1"><input type="text" class="form-control entpesoneto" placeholder="obligatorio"></div>
	<div class="col-md-1"><input type="text" class="form-control entlargo"></div>
	<div class="col-md-1"><input type="text" class="form-control entancho"></div>
	<div class="col-md-1"><input type="text" class="form-control entalto"></div>
</div>


<div class="row registro">
	<label class="col-md-2 control-label">Caracteristicas:</label>
	<div class="col-md-5">
		<div class="row registro" id="listacaracteristicas">
			<div class="col-md-12">
				<div class="panel panel-default panel-caracteristicas">
					<table class="table table-condensed table-striped">
					<tbody>
<?php 


foreach ($caracteristicas as $caracteristica) {
	print '<tr>';
	print '<th scope="row">'.$caracteristica->nombre.'</th>';
	print '<td>
	     		<label  class= "radio-inline radio-car" > 
					<input  type= "radio" data-id="'.$caracteristica->id.'"  name= "linea'.$caracteristica->id.'" value= "chulo" checked> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				</label> 
			</td>
			<td>
				<label  class= "radio-inline radio-car" > 
					<input  type= "radio" data-id="'.$caracteristica->id.'"  name= "linea'.$caracteristica->id.'" value= "remove"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</label> 
			</td>
			<td>
			  	<label  class= "radio-inline radio-car" > 
					<input  type= "radio" data-id="'.$caracteristica->id.'" name= "linea'.$caracteristica->id.'" value= "asterisk"> <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
				</label> 
			</td>
			</tr>';
}
?>
			        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>





<div class="row registro">
	<div class="col-md-2"></div>
	<div class="col-md-2">
  		<button type="button" class="btn btn-xs btn-success btn-guardar">Guardar</button>
  		<button type="button" class="btn btn-xs btn-warning btn-limpiar">Limpiar</button>
	</div>  		
</div>


<script type="text/javascript">

$(document).ready(function() { 
	$('.form-contenedor').on('click','.btn-guardar',function(event){
		var datacaracteristicas = [];
		$('input[name*="linea"]:checked').each(function(){
			if($(this).val()!=='chulo'){
				var caracteristica = { "idCaracteristica" : $(this).attr('data-id') , "valor" : $(this).val() };
				datacaracteristicas.push(caracteristica);
			}
		});


		alert("SE CREA EL PRODUCTO");
		return false;

		enombre = $('.form-contenedor').find('.entnombre').val();
		edescripcion = $('.form-contenedor').find('.entdescripcion').val();
		eingredientes = $('.form-contenedor').find('.entingredientes').val();
		emarca = $('.form-contenedor').find('.entmarca').val();
		eprecio = $('.form-contenedor').find('.entprecio').val();
		epeso = $('.form-contenedor').find('.entpeso').val();
		epesoneto = $('.form-contenedor').find('.entpesoneto').val();
		elargo = $('.form-contenedor').find('.entlargo').val();
		eancho = $('.form-contenedor').find('.entancho').val();
		ealto = $('.form-contenedor').find('.entalto').val();
		eexistencias = $('.form-contenedor').find('.entexistencias').val();
		eestado = $('.form-contenedor').find('.entestado').val();

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
		
		alert("SE CREA EL PRODUCTO");

		crear( enombre, edescripcion, eprecio, epeso, elargo, ealto, eancho, eexistencias, eestado,function(rta){
			if(rta) {
				$('.form-contenedor').find('.entnombre').val("");
				$('.form-contenedor').find('.entdescripcion').val("");
				$('.form-contenedor').find('.entprecio').val("");
				$('.form-contenedor').find('.entpeso').val("");
				$('.form-contenedor').find('.entlargo').val("");
				$('.form-contenedor').find('.entancho').val("");
				$('.form-contenedor').find('.entalto').val("");
				$('.form-contenedor').find('.entexistencias').val("");
				$('.form-contenedor').find('.entestado').val("");
		   };
	   });
	});
});

function crear (nombre, descripcion, ingredientes, marca, precio, peso, pesoneto, largo, alto, ancho, existencias, estado, callback) {
  $.ajax({                                               
	    url: "<?php print base_url();?>producto/crear",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {nombre : nombre, descripcion : descripcion, ingredientes : ingredientes, precio : precio, marca : marca, peso : peso, 
	           pesoneto : pesoneto, largo : largo, alto : alto, ancho : ancho, existencias : existencias, estado : estado } })
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