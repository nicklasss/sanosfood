<div class="row registro">
	<div class="col-md-12">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h2>Nuevo Producto</h2></div>
			<table class="table table-condensed table-striped">
				<tbody>
				<tr>
					<td width="10%"><h5 class="text-right"><strong>Nombre:</strong></h5></td>
				 	<td><div><input type="text" class="form-control" id="nombre" placeholder="obligatorio"></div></td>
				</tr>
				<tr>
					<td><h5 class="text-right"><strong>Descripción:</strong></h5></td>
				 	<td><div><textarea type="text" class="form-control" id="descripcion"></textarea></div></td>
				</tr>
				<tr>
					<td><h5 class="text-right"><strong>Ingredientes:</strong></h5></td>
				 	<td><div><textarea type="text" class="form-control" id="ingredientes"></textarea></div></td>
				</tr>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>


<!----------------------------------- edicion del campo CATEGORIAS --> 
<div class="row registro">
	<div class="col-md-4 col-md-offset-5">
  		<button type="button" class="btn btn-lg btn-success btn-guardar">Guardar</button>
  		<button type="button" class="btn btn-lg btn-warning btn-limpiar">Limpiar</button>
	</div>  		
</div>

<!------------------------------------------------------------------------------------------------------------------------------------> 
<script type="text/javascript">
$(document).ready(function() { 
	window.onload = function() {
	    $('#nombre').focus();
	};

//----------------------------------------------------------------------------------btn-LIMPIAR
	$('.container').on('click','.btn-limpiar',function(event){
		$('#nombre').val("");
		$('#descripcion').val("");
		$('#ingredientes').val("");
	    $('#nombre').focus();
	});

//----------------------------------------------------------------------------------btn-GUARDAR
	$('.container').on('click','.btn-guardar',function(event){
		enombre = $('#nombre').val().trim();
		edescripcion = $('#descripcion').val().trim();
		eingredientes = $('#ingredientes').val().trim();
		if(enombre == "") {
			alert("Los campos obligatorios deben estar diligenciados");
			return false; }
		rta = crear( enombre, edescripcion, eingredientes, function(rta) {
			if(rta) {	
				limpiarpantalla();
			} else {
				$('#nombre').focus();
			};
		});
	});
});

//----------------------------------------------------------------------------------funcion CREAR
function crear (nombre, descripcion, ingredientes, callback) {
  $.ajax({                                               
	    url: "<?php print base_url();?>producto/crear",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {nombre : nombre, descripcion : descripcion, ingredientes : ingredientes } })
   .done(function(data) {                           
    if(data.res == "ok") {
    	window.location="<?php print base_url();?>admin/producto/"+data.id;
    	callback(true)}
    else {alert(data.msj);callback(false)}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}

//----------------------------------------------------------------------------------funcion limpiarpantalla
function limpiarpantalla () {
	$('#nombre').val("");
	$('#descripcion').val("");
	$('#ingredientes').val("");
}

</script>