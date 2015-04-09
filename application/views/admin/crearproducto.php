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
	<div class="col-md-1">Largo</div>
	<div class="col-md-1">Ancho</div>
	<div class="col-md-1">Alto</div>
</div>

<div class="row registro">
	<label class="col-md-2 control-label">Dimensiones:</label>
	<div class="col-md-1"><input type="text" class="form-control entpeso"></div>
	<div class="col-md-1"><input type="text" class="form-control entlargo"></div>
	<div class="col-md-1"><input type="text" class="form-control entancho"></div>
	<div class="col-md-1"><input type="text" class="form-control entalto"></div>
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
		enombre = $('.form-contenedor').find('.entnombre').val();
		edescripcion = $('.form-contenedor').find('.entdescripcion').val();
		emarca = $('.form-contenedor').find('.entmarca').val();
		eprecio = $('.form-contenedor').find('.entprecio').val();
		epeso = $('.form-contenedor').find('.entpeso').val();
		elargo = $('.form-contenedor').find('.entlargo').val();
		eancho = $('.form-contenedor').find('.entancho').val();
		ealto = $('.form-contenedor').find('.entalto').val();
		eexistencias = $('.form-contenedor').find('.entexistencias').val();
		eestado = $('.form-contenedor').find('.entestado').val();

		if(enombre == "" || edescripcion == "" || emarca == "" || eprecio == "" || eexistencias == "" || eestado == "") {
			alert("Los campos obligatorios deben estar diligenciados");
			return false; }

		if(validarnumerodecimal(eprecio, "PRECIO")  == false) {return false;}
		if(epeso != "")  {if(validarnumeroentero(epeso, "PESO")  == false) {return false;}}
		if(elargo != "") {if(validarnumeroentero(elargo, "LARGO") == false) {return false;}}
		if(eancho != "") {if(validarnumeroentero(eancho, "ANCHO") == false) {return false;}}
		if(ealto != "")  {if(validarnumeroentero(ealto, "ALTO")  == false) {return false;}}
		if(validarnumeroentero(eexistencias, "EXISTENCIAS")  == false) {return false;}
		
		alert("SE CREA EL PRODUCTO");

//	   rta = guardar( enombre, edescripcion, eprecio, epeso, elargo, ealto, eancho, eexistencias, eestado,function(rta){
//			if(rta) {
				$('.form-contenedor').find('.entnombre').val("");
				$('.form-contenedor').find('.entdescripcion').val("");
				$('.form-contenedor').find('.entprecio').val("");
				$('.form-contenedor').find('.entpeso').val("");
				$('.form-contenedor').find('.entlargo').val("");
				$('.form-contenedor').find('.entancho').val("");
				$('.form-contenedor').find('.entalto').val("");
				$('.form-contenedor').find('.entexistencias').val("");
				$('.form-contenedor').find('.entestado').val("");
//		   };
//	   });
	});
});

function validarnumeroentero (valor, campo) {
   for(var i = 0; i<valor.length;i++){
    	if(valor.charCodeAt(i)<48 || valor.charCodeAt(i)>57) {
    		alert(campo + " debe ser un número entero positivo");
   		return false;
   	}
   }
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

function guardar (nombre, descripcion, marca, precio, peso, largo, alto, ancho, existencias, estado, callback) {
  $.ajax({                                               // envio de los datos
	    url: "<?php print base_url();?>producto/editar",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {"nombre" : nombre, "descripcion" : descripcion, "precio" : precio, "marca" : marca, "peso" : peso, 
	           "largo" : largo, "alto"   : alto, "ancho" : ancho, "existencias" : existencias, "estado" : estado } })
   .done(function(data) {                               // respuesta del servidor
    if(data.res=="ok") {callback(true)}
    else {alert(data.msj);callback(false)}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}

</script>