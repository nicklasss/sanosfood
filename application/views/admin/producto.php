
<h2>PRODUCTOS</h2>
<form class="form-horizontal" role="form">

<!------------------------------------- edicion del campo NOMBRE --> 
  <div class="form-group" style="border-bottom: 1px solid lightgrey">
	<label for="ejemplo_email_3" class="col-md-2 control-label">Nombre:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
		    	<input type="text" class="form-control entrada" value="<?php print $producto->nombre;?>"/>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="nombre">Guardar</button>
        		<button type="button" class="btn btn-xs btn-danger btn-cancelar">Cancelar</button>
	    	</div>	
    	</div>
		<div class="mostrable row">
	    	<div class="col-md-8">
		    	<h4 class="mostrado"><?php print $producto->nombre;?></h4>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
	    	</div>	
    	</div>
    </div>
  </div>

<!------------------------------------- edicion del campo DESCRIPCION --> 
  <div class="form-group" style="border-bottom: 1px solid lightgrey">
	<label for="ejemplo_email_3" class="col-md-2 control-label">Descripción:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
		    	<input type="text" class="form-control entrada" value="<?php print $producto->descripcion;?>"/>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="descripcion">Guardar</button>
        		<button type="button" class="btn btn-xs btn-danger btn-cancelar">Cancelar</button>
	    	</div>	
    	</div>
		<div class="mostrable row">
	    	<div class="col-md-8">
		    	<h4 class="mostrado"><?php print $producto->descripcion;?></h4>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
	    	</div>	
    	</div>
    </div>
  </div>


<!------------------------------------- edicion del campo PRECIO --> 
  <div class="form-group" style="border-bottom: 1px solid lightgrey">
	<label for="ejemplo_email_3" class="col-md-2 control-label">Precio:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
		    	<input type="text" class="form-control entrada" value="<?php print $producto->precio;?>"/>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="precio">Guardar</button>
        		<button type="button" class="btn btn-xs btn-danger btn-cancelar">Cancelar</button>
	    	</div>	
    	</div>
		<div class="mostrable row">
	    	<div class="col-md-8">
		    	<h4 class="mostrado"><?php print $producto->precio;?></h4>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
	    	</div>	
    	</div>
    </div>
  </div>

<!------------------------------------- edicion del campo PESO --> 
  <div class="form-group" style="border-bottom: 1px solid lightgrey">
	<label for="ejemplo_email_3" class="col-md-2 control-label">Peso:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
		    	<input type="text" class="form-control entrada" value="<?php print $producto->peso;?>"/>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="peso">Guardar</button>
        		<button type="button" class="btn btn-xs btn-danger btn-cancelar">Cancelar</button>
	    	</div>	
    	</div>
		<div class="mostrable row">
	    	<div class="col-md-8">
		    	<h4 class="mostrado"><?php print $producto->peso;?></h4>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
	    	</div>	
    	</div>
    </div>
  </div>

<!------------------------------------- edicion del campo LARGO --> 
  <div class="form-group" style="border-bottom: 1px solid lightgrey">
	<label for="ejemplo_email_3" class="col-md-2 control-label">Largo:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
		    	<input type="text" class="form-control entrada" value="<?php print $producto->largo;?>"/>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="largo">Guardar</button>
        		<button type="button" class="btn btn-xs btn-danger btn-cancelar">Cancelar</button>
	    	</div>	
    	</div>
		<div class="mostrable row">
	    	<div class="col-md-8">
		    	<h4 class="mostrado"><?php print $producto->largo;?></h4>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
	    	</div>	
    	</div>
    </div>
  </div>

<!------------------------------------- edicion del campo ANCHO --> 
  <div class="form-group" style="border-bottom: 1px solid lightgrey">
	<label for="ejemplo_email_3" class="col-md-2 control-label">Ancho:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
		    	<input type="text" class="form-control entrada" value="<?php print $producto->ancho;?>"/>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="ancho">Guardar</button>
        		<button type="button" class="btn btn-xs btn-danger btn-cancelar">Cancelar</button>
	    	</div>	
    	</div>
		<div class="mostrable row">
	    	<div class="col-md-8">
		    	<h4 class="mostrado"><?php print $producto->ancho;?></h4>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
	    	</div>	
    	</div>
    </div>
  </div>

<!------------------------------------- edicion del campo ALTO --> 
  <div class="form-group" style="border-bottom: 1px solid lightgrey">
	<label for="ejemplo_email_3" class="col-md-2 control-label">Alto:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
		    	<input type="text" class="form-control entrada" value="<?php print $producto->alto;?>"/>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="alto">Guardar</button>
        		<button type="button" class="btn btn-xs btn-danger btn-cancelar">Cancelar</button>
	    	</div>	
    	</div>
		<div class="mostrable row">
	    	<div class="col-md-8">
		    	<h4 class="mostrado"><?php print $producto->alto;?></h4>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
	    	</div>	
    	</div>
    </div>
  </div>

<!------------------------------------- edicion del campo EXISTENCIAS --> 
  <div class="form-group" style="border-bottom: 1px solid lightgrey">
	<label for="ejemplo_email_3" class="col-md-2 control-label">Existencias:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
		    	<input type="text" class="form-control entrada" value="<?php print $producto->existencias;?>"/>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="existencias">Guardar</button>
        		<button type="button" class="btn btn-xs btn-danger btn-cancelar">Cancelar</button>
	    	</div>	
    	</div>
		<div class="mostrable row">
	    	<div class="col-md-8">
		    	<h4 class="mostrado"><?php print $producto->existencias;?></h4>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
	    	</div>	
    	</div>
    </div>
  </div>

  <!------------------------------------- edicion del campo ESTADO --> 
  <div class="form-group" style="border-bottom: 1px solid lightgrey">
	<label for="ejemplo_email_3" class="col-md-2 control-label">Estado:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
				<select class="form-control entrada">
					<?php foreach ($estados as $estado) {
						print '<option value="'.$estado->id.'">'.$estado->nombre.'</option>';
					}?>
				</select>    		
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="estado">Guardar</button>
        		<button type="button" class="btn btn-xs btn-danger btn-cancelar">Cancelar</button>
	    	</div>	
    	</div>
		<div class="mostrable row">
	    	<div class="col-md-8">
		    	<h4 class="mostrado"><?php print $producto->estado;?></h4>
    		</div>
	    	<div class="col-md-4">
        		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
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
		valor = $(event.target).parent().parent().find('.entrada').val();
		rta = guardar( $(event.target).attr("data-atributo") , valor ,function(rta){
			if(rta) {
				$(event.target).parent().parent().parent().find('.mostrado').html(valor); 
				$(event.target).parent().parent().parent().find('.mostrable').show();
				$(event.target).parent().parent().hide();
			}
		});
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
</script>