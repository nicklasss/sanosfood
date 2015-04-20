<div class="row">
	<div class="col-md-1"></div>
   <div class="col-lg-8">
      <h1 class="page-header">Buscar Usuarios</h1>
   </div>
</div>

<div class="row registro">
	<div class="col-md-1"></div>
   <div class="col-lg-8">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon" id="sizing-addon1">Criterio de Busqueda</span>
		  <input type="text" class="form-control" id="ecriterio" aria-describedby="sizing-addon1">
		</div>
	</div>
	<div class="col-md-2">
	  		<button type="button" class="btn btn-sm btn-primary btn-buscar">Buscar</button>
	</div>
</div>

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-9 panel panel-default panel-usuarios">
		<table class="table table-condensed table-striped">
			<thead>
			<tr role="row">
			  <th>Nombre</th>
			  <th>Usuario</th>
			  <th>correo</th>
			  <th>Ciudad</th>
			</tr role="row">
			</thead>
			<tbody id="listausuarios">
			</tbody>
		</table> 
	</div>
</div>


<script type="text/javascript">
$(document).ready(function() { 

	$('.container').on('click','.btn-buscar',function(event){
		criterio = $('.container').find('#ecriterio').val();
		if (criterio == null) {alert("es nulo"); return false;}
		rta = buscar( criterio, function(rta){
			if(!rta) { alert("ha habido un error en la busqueda"); }
	   })
	})
})

function buscar (valor, callback) {
  $.ajax({                                               
	    url: "<?php print base_url();?>usuario/buscar",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {query : valor} })
   .done(function(data) {                               // respuesta del servidor
    if(data.res=="ok") {
    	callback(true);
    	if(data.usuarios.length == 0) {alert("No se encuentra ninguna coincidencia");}
      for (var i = 0; i < data.usuarios.length; i++) {
   		if(i == 0) { $("#listausuarios").html("<tr>"); }
         else { $("#listausuarios").append("<tr>"); }
         $("#listausuarios").append("<td>"+data.usuarios[i].nombres+" "+data.usuarios[i].apellidos+"</td>");  
         $("#listausuarios").append("<td><a href='usuarios/"+data.usuarios[i].id+"'>"+data.usuarios[i].usuario+"</a></td>");  
         $("#listausuarios").append("<td>"+data.usuarios[i].correo+"</td>");  
         $("#listausuarios").append("<td>"+data.usuarios[i].ciudad+"</td>");  
         $("#listausuarios").append("</tr>");  
      } 
	 }
	 else {alert(data.msj);callback(false)}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}

</script>