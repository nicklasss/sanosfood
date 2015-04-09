<h2>NUEVOS PRODUCTOS</h2>
<form class="form-horizontal form-contenedor" role="form">

<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Nombre:</label>
	<div class="col-md-8">
    	<input type="text" class="form-control entnombre">
	</div>
</div>

<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Descripción:</label>
	<div class="col-md-8">
    	<textarea type="text" class="form-control entvalor"></textarea>
  	</div>
</div>

<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Precio:</label>
	<div class="col-md-2">
    	<input type="text" class="form-control entprecio">
  	</div>
</div>

<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Peso:</label>
	<div class="col-md-2">
    	<input type="text" class="form-control entpeso">
 	</div>
</div>

<div class="row registro">
	<label class="col-md-2 control-label">Largo:</label>
	<div class="col-md-2">
    	<input type="text" class="form-control entlargo">
  	</div>
</div>

<div class="row registro">
	<label class="col-md-2 control-label">Ancho:</label>
	<div class="col-md-2">
    	<input type="text" class="form-control entancho">
  	</div>
</div>

<div class="row registro">
	<label class="col-md-2 control-label">Alto:</label>
	<div class="col-md-2">
    	<input type="text" class="form-control entalto">
  	</div>
</div>

<div class="row registro">
	<label class="col-md-2 control-label">Existencias:</label>
	<div class="col-md-2">
    	<input type="text" class="form-control entexistencias">
  	</div>
</div>

<div class="row registro">
	<label class="col-md-2 control-label">Estado:</label>
	<div class="col-md-2">
		<select class="form-control entvalor">
			<?php foreach ($estados as $estado) {
					alert($estado);
					print '<option value="'.$estado->id.'" selected>'.$estado->nombre.'</option>'; }
			?>
		</select>    		
 	</div>
</div>

<div class="row registro" style="border-bottom: 1px solid lightgrey">
  	</div>
	<div class="col-md-2">
  		<button type="button" class="btn btn-xs btn-success btn-guardar escondido" data-atributo="estado">Guardar</button>
  		<button type="button" class="btn btn-xs btn-warning btn-terminar">Terminar</button>
</div>


<script type="text/javascript">
$(document).ready(function() { 

	$('.form-contenedor').on('click','.btn-guardar',function(event){
		evalor = $(event.target).parent().parent().parent().find('.entvalor').val();
		svalor = $(event.target).parent().parent().parent().find('.salvalor').html();
		if(evalor !== svalor) {
		   rta = guardar( $(event.target).attr("data-atributo") , evalor ,function(rta){
				if(rta) {
					$(event.target).parent().parent().parent().find('.salvalor').html(evalor); 
					$(event.target).parent().parent().parent().find('.mostrable').show();
					$(event.target).parent().parent().parent().find('.editable').hide();
			   };
		   });
		};
	});
});


function guardar (atributo, valor, callback) {
  $.ajax({                                               // envio de los datos
	    url: "<?php print base_url();?>producto/editar",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {"nombre" : entnombre, "descripcion" : entdescripcion, "precio" : entprecio, "peso" : entpeso, "largo" : entlargo,
	           "alto"   : entalto, "ancho" : entancho, "existencias" : entexistencias, "estado" : entestado } })
   .done(function(data) {                               // respuesta del servidor
    if(data.res=="ok") {callback(true)}
    else {alert(data.msj);callback(false)}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}

</script>