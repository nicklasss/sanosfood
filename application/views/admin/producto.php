
<h2>PRODUCTOS</h2>
<form class="form-horizontal form-contenedor" role="form">

<!------------------------------------- edicion del campo NOMBRE
  <div class="row form-group" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Nombre:</label>
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
  </div> --> 


<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Nombre:</label>
	<div class="editable escondido">
		<div class="col-md-8 contenedor">
	    	<input type="text" class="form-control entvalor" value="<?php print $producto->nombre;?>"/>
		</div>
	 	<div class="col-md-2 contenedor">
	  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="nombre">Guardar</button>
	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
	  	</div>	
	</div>
  	<div class="mostrable">
		<div class="col-md-8">
    		<h4 class="salvalor"><?php print $producto->nombre;?></h4>
    	</div>
   	<div class="col-md-2">
   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
   	</div>	
  	</div>
</div>



<!------------------------------------- edicion del campo DESCRIPCION 
  <div class="row form-group" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Descripción:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
		    	<textarea type="text" class="form-control entrada"><?php print $producto->descripcion;?></textarea>
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
  </div>--> 



<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Descripción:</label>
	<div class="editable escondido">
		<div class="col-md-8 contenedor">
	    	<textarea type="text" class="form-control entvalor"><?php print $producto->descripcion;?></textarea>
		</div>
	 	<div class="col-md-2 contenedor">
	  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="descripcion">Guardar</button>
	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
	  	</div>	
	</div>
  	<div class="mostrable">
		<div class="col-md-8">
    		<h4 class="salvalor"><?php print $producto->descripcion;?></h4>
    	</div>
   	<div class="col-md-2">
   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
   	</div>	
  	</div>
</div>



<!------------------------------------- edicion del campo PRECIO 
  <div class="row form-group" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Precio:</label>
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
  </div>--> 

<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Precio:</label>
	<div class="editable escondido">
		<div class="col-md-8 contenedor">
	    	<input type="text" class="form-control entvalor" value="<?php print $producto->precio;?>"/>
		</div>
	 	<div class="col-md-2 contenedor">
	  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="precio">Guardar</button>
	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
	  	</div>	
	</div>
  	<div class="mostrable">
		<div class="col-md-8">
    		<h4 class="salvalor"><?php print $producto->precio;?></h4>
    	</div>
   	<div class="col-md-2">
   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
   	</div>	
  	</div>
</div>

<!------------------------------------- edicion del campo PESO 
  <div class="row form-group" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Peso:</label>
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
  </div>--> 


<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Peso:</label>
	<div class="editable escondido">
		<div class="col-md-8 contenedor">
	    	<input type="text" class="form-control entvalor" value="<?php print $producto->peso;?>"/>
		</div>
	 	<div class="col-md-2 contenedor">
	  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="peso">Guardar</button>
	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
	  	</div>	
	</div>
  	<div class="mostrable">
		<div class="col-md-8">
    		<h4 class="salvalor"><?php print $producto->peso;?></h4>
    	</div>
   	<div class="col-md-2">
   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
   	</div>	
  	</div>
</div>



<!------------------------------------- edicion del campo LARGO 
  <div class="row form-group" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Largo:</label>
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
  </div>-->

<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Largo:</label>
	<div class="editable escondido">
		<div class="col-md-8 contenedor">
	    	<input type="text" class="form-control entvalor" value="<?php print $producto->largo;?>"/>
		</div>
	 	<div class="col-md-2 contenedor">
	  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="largo">Guardar</button>
	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
	  	</div>	
	</div>
  	<div class="mostrable">
		<div class="col-md-8">
    		<h4 class="salvalor"><?php print $producto->largo;?></h4>
    	</div>
   	<div class="col-md-2">
   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
   	</div>	
  	</div>
</div>




<!------------------------------------- edicion del campo ANCHO 
  <div class="row form-group" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Ancho:</label>
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
  </div>--> 


<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Ancho:</label>
	<div class="editable escondido">
		<div class="col-md-8 contenedor">
	    	<input type="text" class="form-control entvalor" value="<?php print $producto->ancho;?>"/>
		</div>
	 	<div class="col-md-2 contenedor">
	  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="ancho">Guardar</button>
	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
	  	</div>	
	</div>
  	<div class="mostrable">
		<div class="col-md-8">
    		<h4 class="salvalor"><?php print $producto->ancho;?></h4>
    	</div>
   	<div class="col-md-2">
   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
   	</div>	
  	</div>
</div>




<!------------------------------------- edicion del campo ALTO  
  <div class="row form-group" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Alto:</label>
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
  </div>-->



<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Alto:</label>
	<div class="editable escondido">
		<div class="col-md-8 contenedor">
	    	<input type="text" class="form-control entvalor" value="<?php print $producto->alto;?>"/>
		</div>
	 	<div class="col-md-2 contenedor">
	  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="alto">Guardar</button>
	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
	  	</div>	
	</div>
  	<div class="mostrable">
		<div class="col-md-8">
    		<h4 class="salvalor"><?php print $producto->alto;?></h4>
    	</div>
   	<div class="col-md-2">
   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
   	</div>	
  	</div>
</div>




<!----------------------------------- edicion del campo EXISTENCIAS 
  <div class="row form-group" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Existencias:</label>
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
  </div>--> 




<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Existencias:</label>
	<div class="editable escondido">
		<div class="col-md-8 contenedor">
	    	<input type="text" class="form-control entvalor" value="<?php print $producto->existencias;?>"/>
		</div>
	 	<div class="col-md-2 contenedor">
	  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="existencias">Guardar</button>
	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
	  	</div>	
	</div>
  	<div class="mostrable">
		<div class="col-md-8">
    		<h4 class="salvalor"><?php print $producto->existencias;?></h4>
    	</div>
   	<div class="col-md-2">
   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
   	</div>	
  	</div>
</div>







  <!------------------------------------- edicion del campo ESTADO 
  <div class="row form-group" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Ancho:</label>
    <div class="col-md-10 contenedor">
	    <div class="editable row escondido">
	    	<div class="col-md-8">
			   <select class="form-control entrada">
					<?php foreach ($estados as $estado) {
						if ($estado->nombre == $producto->estado) {
							print '<option value="'.$estado->id.'" selected>'.$estado->nombre.'</option>'; }
						else {
							print '<option value="'.$estado->nombre.'">'.$estado->nombre.'</option>'; }
						}?>
				</select>    		
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
  </div>--> 





<div class="row registro" style="border-bottom: 1px solid lightgrey">
	<label class="col-md-2 control-label">Estado:</label>
	<div class="editable escondido">
		<div class="col-md-8 contenedor">
			<select class="form-control entvalor">
				<?php foreach ($estados as $estado) {
					if ($estado->nombre == $producto->estado) {
						print '<option value="'.$estado->id.'" selected>'.$estado->nombre.'</option>'; }
					else {
						print '<option value="'.$estado->nombre.'">'.$estado->nombre.'</option>'; }
					}?>
			</select>    		
		</div>
	 	<div class="col-md-2 contenedor">
	  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-atributo="estado">Guardar</button>
	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
	  	</div>	
	</div>
  	<div class="mostrable">
		<div class="col-md-8">
    		<h4 class="salvalor"><?php print $producto->estado;?></h4>
    	</div>
   	<div class="col-md-2">
   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
   	</div>	
  	</div>
</div>





<div class="row">
	<div class="col-md-10 contenedor">
	</div>	
	<div class="col-md-2">
   	<button type="button" class="btn btn-xs btn-success btn-nuevo"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</button>
   	<button type="button" class="btn btn-xs btn-danger btn-eliminar" data-id="'.$categoria->id.'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>
	</div>	
	</div>	
</form>


<div class="row ultimo">
  <div class="editable escondido">
 	<div class="col-md-3 contenedor">
    	<input type="text" class="form-control entnombre" placeholder="Nombre"/>
	</div>
 	<div class="col-md-7 contenedor">
    	<textarea type="text" class="form-control entdescripcion" placeholder="Descripción"></textarea>
	</div>
 	<div class="col-md-2 contenedor">
   		<button type="button" class="btn btn-xs btn-success btn-agregar">Agregar</button>
   		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
   	</div>	
  </div>
  <div class="mostrable">
	<div class="col-md-10">
	</div>
   	<div class="col-md-2">
   		<button type="button" class="btn btn-xs btn-success btn-nuevo"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</button>
   	</div>	
  </div>
</div>






<script type="text/javascript">
$(document).ready(function() { 

	$('.form-contenedor').on('click','.btn-editar',function(event){
		$(event.target).parent().parent().parent().find('.editable').show();
		$(event.target).parent().parent().parent().find('.mostrable').hide();
	});

	$('.form-contenedor').on('click','.btn-cancelar',function(event){
		$(event.target).parent().parent().parent().find('.mostrable').show();
		$(event.target).parent().parent().parent().find('.editable').hide();
	});

//	$('.btn-guardar').click( function(event){
//		valor = $(event.target).parent().parent().find('.entrada').val();
//		rta = guardar( $(event.target).attr("data-atributo") , valor ,function(rta){
//			if(rta) {
//				$(event.target).parent().parent().parent().find('.mostrado').html(valor); 
//				$(event.target).parent().parent().parent().find('.mostrable').show();
//				$(event.target).parent().parent().parent().find('.editable').hide();
//			}
//		});
//	});


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
	    data: {id : <?php print $this->uri->segment(3);?>, atributo  : atributo, valor : valor } })
   .done(function(data) {                               // respuesta del servidor
    if(data.res=="ok") {callback(true)}
    else {alert(data.msj);callback(false)}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}
</script>