
<form class="form-horizontal" role="form" style="border-bottom: 1px solid lightgrey">
  <div class="form-group">
	<label for="ejemplo_email_3" class="col-md-2 control-label">Nombre:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
		    	<input type="text" class="form-control" id="nombre" placeholder="Nombre" value="<?php print $producto->nombre;?>"/>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-primary btn-guardar" data-atributo="nombre">Guardar</button>
        		<button type="button" class="btn btn-default btn-cancelar">Cancelar</button>
	    	</div>	
    	</div>
		<div class="mostrable row">
	    	<div class="col-md-8">
		    	<h4 class="mostrado"><?php print $producto->nombre;?></h4>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
	    	</div>	
    	</div>
    </div>
  </div>
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
		valor = $(event.target).parent().parent().find("input").val();
		rta = guardar($(event.target).attr("data-atributo"), valor);
		if(rta) {
			$(event.target).parent().parent().parent().find('.mostrado').html(valor); 
			$(event.target).parent().parent().parent().find('.mostrable').show();
			$(event.target).parent().parent().hide();
		}
	});
});

function guardar (atributo, valor) {
  var retorno = false;
  $.ajax({                                               // envio de los datos
    url: "<?php print base_url();?>producto/editar",
    context: document.body,
    dataType: "json",
    type: "POST",
    data: {id : <?php print $this->uri->segment(3);?>, atributo  : atributo, valor : valor } })
   .done(function(data) {                               // respuesta del servidor
    if(data.res=="ok") {retorno = true;}
    else {alert(data.msj);}
    })
   .error(function(){alert('No hay conexion');})
   return retorno;
}
</script>