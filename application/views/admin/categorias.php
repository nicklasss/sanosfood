<h2>CATEGORIAS</h2>
<form class="form-horizontal form-contenedor" role="form">

<div class="row" style="border-bottom: 3px solid #999">
	<div class="col-md-3"><h4><strong>Nombre</strong></h4></div>
	<div class="col-md-6"><h4><strong>Descripción</strong></h4></div>
</div>
<div class="todosregistros">

<?php foreach ($categorias as $categoria) {
print '
<div class="row registro">
	<div class="editable escondido">
		<div class="col-md-3 contenedor">
	    	<input type="text" class="form-control entnombre" value="'.$categoria->nombre.'"/>
		</div>
	 	<div class="col-md-7 contenedor">
	    	<textarea type="text" class="form-control entdescripcion">'.$categoria->descripcion.'</textarea>
		</div>
	 	<div class="col-md-2 contenedor">
	  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-id="'.$categoria->id.'">Guardar</button>
	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>
	  	</div>	
	</div>
  	<div class="mostrable">
		<div class="col-md-3">
    		<h4 class="salnombre" value="'.$categoria->nombre.'">'.$categoria->nombre.'</h4>
    	</div>
 		<div class="col-md-7">
    		<h4 class="saldescripcion">'.$categoria->descripcion.'</h4>
		</div>
   	<div class="col-md-2">
   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>
   		<button type="button" class="btn btn-xs btn-danger btn-eliminar" data-id="'.$categoria->id.'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>
   	</div>	
  	</div>
</div>';
}?>
</div>


<div class="row ultimo" style="border-top: 3px solid #999">
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



</form>

<script type="text/javascript">
$(document).ready(function() { 

	$(".registro").each(function(i){
	   if(i%2==0){
	      $(this).css("background-color", "#eee");
	   }else{
	      $(this).css("background-color", "#ddd");
	   }
	});

	$('.form-contenedor').on('click','.btn-editar',function(event){
		$(event.target).parent().parent().parent().find('.editable').show();
		$(event.target).parent().parent().parent().find('.mostrable').hide();
	});

	$('.form-contenedor').on('click','.btn-cancelar',function(event){
		$(event.target).parent().parent().parent().find('.mostrable').show();
		$(event.target).parent().parent().parent().find('.editable').hide();
	});

	$('.form-contenedor').on('click','.btn-eliminar',function(event){
		rta = confirm("presione ACEPTAR para confirmar borrado, o CANCEL para no borrar");
		if (rta) {
		   rta = eliminar( $(event.target).attr("data-id") ,function(rta){
			   if(rta) {
				  $(event.target).parent().parent().parent().find('.mostrable').hide(); 
			   };
		   });
		}
	});

	$('.btn-nuevo').click( function(event){
		$(event.target).parent().parent().parent().find('.entnombre').val("");
		$(event.target).parent().parent().parent().find('.entdescripcion').val("");
		$(event.target).parent().parent().parent().find('.editable').show();
		$(event.target).parent().parent().parent().find('.mostrable').hide();
	});

	$('.btn-agregar').click( function(event){
		enombre = $(event.target).parent().parent().parent().find('.entnombre').val();
		edescripcion = $(event.target).parent().parent().parent().find('.entdescripcion').val();
		if(enombre !== "" && edescripcion !== "") {
		   rta = crear( enombre , edescripcion , function(rta){
			   if(rta) {
 					$(event.target).parent().parent().parent().find('.mostrable').show();
					$(event.target).parent().parent().parent().find('.editable').hide();
			   };
			});
		};
	});
	$('.form-contenedor').on('click','.btn-guardar',function(event){
		enombre = $(event.target).parent().parent().parent().find('.entnombre').val();
		snombre = $(event.target).parent().parent().parent().find('.salnombre').html();
		if(enombre !== snombre) {
		   rta = guardar( $(event.target).attr("data-id") , "nombre" , enombre ,function(rta){
			   if(rta) {
				  $(event.target).parent().parent().parent().find('.salnombre').html(enombre); 
			   };
		   });
		};
		edescripcion = $(event.target).parent().parent().parent().find('.entdescripcion').val();
		sdescripcion = $(event.target).parent().parent().parent().find('.saldescripcion').html();
		if(edescripcion !== sdescripcion) {
		   rta = guardar( $(event.target).attr("data-id") , "descripcion" , edescripcion ,function(rta){
			   if(rta) {
				  $(event.target).parent().parent().parent().find('.saldescripcion').html(edescripcion); 
			   };
		   });
		};
		$(event.target).parent().parent().parent().find('.editable').hide();
		$(event.target).parent().parent().parent().find('.mostrable').show();
	});

});

function guardar (id, atributo, valor, callback) {
	$.ajax({                                               // envio de los datos
	  url: "<?php print base_url();?>categoria/editar",
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

function eliminar (id, callback) {
	$.ajax({                                               // envio de los datos
	  url: "<?php print base_url();?>categoria/eliminar",
	  context: document.body,
	  dataType: "json",
	  type: "POST",
	  data: {id : id } })
	 .done(function(data) {                               // respuesta del servidor
	  if(data.res=="ok") {callback(true)}
	  else {alert(data.msj);callback(false)}
	  })
	 .error(function(){alert('No hay conexion');callback(false);})
}

function crear (nombre, descripcion, callback) {
	$.ajax({                                               // envio de los datos
	  url: "<?php print base_url();?>categoria/crear",
	  context: document.body,
	  dataType: "json",
	  type: "POST",
	  data: {nombre : nombre, descripcion : descripcion } })
	 .done(function(data) {                               // respuesta del servidor
	  if(data.res=="ok") {callback(true);
			$(".todosregistros").last().append(
				'<div class="row registro">'+
				'	<div class="editable escondido">'+
				'		<div class="col-md-3 contenedor">'+
				'	    	<input type="text" class="form-control entnombre" value="'+ enombre +'"/>'+
				'		</div>'+
				'	 	<div class="col-md-7 contenedor">'+
				'	    	<textarea type="text" class="form-control entdescripcion">'+ edescripcion +'</textarea>'+
				'		</div>'+
				'	 	<div class="col-md-2 contenedor">'+
				'	  		<button type="button" class="btn btn-xs btn-success btn-guardar" data-id="'+ data.id +'">Guardar</button>'+
				'	  		<button type="button" class="btn btn-xs btn-warning btn-cancelar">Cancelar</button>'+
				'	  	</div>'+
				'	</div>'+
				'  	<div class="mostrable">'+
				'		<div class="col-md-3">'+
				'    		<h4 class="salnombre" value="'+ enombre +'">'+ enombre +'</h4>'+
				'    	</div>'+
				' 		<div class="col-md-7">'+
				'    		<h4 class="saldescripcion">'+ edescripcion +'</h4>'+
				'		</div>'+
				'   	<div class="col-md-2">'+
				'   		<button type="button" class="btn btn-xs btn-primary btn-editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>'+
				'   		<button type="button" class="btn btn-xs btn-danger btn-eliminar" data-id="'+ data.id +'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</button>'+
				'   	</div>'+
				'  </div>'+
				'</div>');
	  }
	  else {alert(data.msj);callback(false)}
	  })
	 .error(function(){alert('No hay conexion');callback(false);})
}

</script>