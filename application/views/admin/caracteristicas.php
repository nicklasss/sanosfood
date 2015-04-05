<h2>CARACTERISTICAS</h2>
<form class="form-horizontal" role="form">

<?php foreach ($caracteristicas as $caracteristica) {
print '
  <div class="form-group">
	<label class="col-md-2 control-label">Nombre:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
		    	<input type="text" class="form-control entrada" value="'.$caracteristica->nombre.'"/>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="nombre" data-id="'.$caracteristica->id.'">Guardar</button>
        		<button type="button" class="btn btn-xs btn-danger btn-cancelar">Cancelar</button>
	    	</div>	
    	</div>
		<div class="mostrable row">
	    	<div class="col-md-8">
		    	<h4 class="mostrado">'.$caracteristica->nombre.'</h4>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
	    	</div>	
    	</div>
    </div>
  </div>';

print '
  <div class="form-group" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Descripcion:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
		    	<textarea type="text" class="form-control entrada">'.$caracteristica->descripcion.'</textarea>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="descripcion" data-id="'.$caracteristica->id.'">Guardar</button>
        		<button type="button" class="btn btn-xs btn-danger btn-cancelar">Cancelar</button>
	    	</div>	
    	</div>
		<div class="mostrable row">
	    	<div class="col-md-8">
		    	<h4 class="mostrado">'.$caracteristica->descripcion.'</h4>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
	    	</div>	
    	</div>
    </div>
  </div>';
}?>

</form>

<script type="text/javascript">
$(document).ready(function() { 
	$('.btn-editar').click( function(event){
		$(event.target).parent().parent().parent().find('.editable').show();
		$(event.target).parent().parent().hide();
	});
	$('.btn-cancelar').click( function(event){
		$(event.target).parent().parent().parent().find('.mostrable').show();
		$(event.target).parent().parent().hide();
	});
	$('.btn-guardar').click( function(event){
		valor = $(event.target).parent().parent().find('.entrada').val();
		rta = guardar( $(event.target).attr("data-id") , $(event.target).attr("data-atributo") , valor ,function(rta){
			if(rta) {
				$(event.target).parent().parent().parent().find('.mostrado').html(valor); 
				$(event.target).parent().parent().parent().find('.mostrable').show();
				$(event.target).parent().parent().hide();
			}
		});
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
</script>