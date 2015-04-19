<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Buscar Usuarios</h1>
    </div>
</div>

<div class="row busqueda registro">
   <div class="form-horizontal">
		<label class="col-md-2 control-label">Criterio de busqueda:</label>
		<div class="col-md-8">
	    	<input type="text" id="ecriterio" class="form-control">
		</div>
		<div class="col-md-2">
	  		<button type="button" class="btn btn-xs btn-primary btn-buscar">Buscar</button>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default panel-usuarios">
			<table class="table table-condensed table-striped">
				<thead>
				<tr role="row">
				  <th>Nombre</th>
				  <th>Usuario</th>
				  <th>correo</th>
				  <th>Ciudad</th>
				</tr>
				</thead>
				<tbody id="listausuarios">
				</tbody>
			</table> <!--table-->
		</div> <!--panel-->
	</div> <!--col-md-8-->
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
      for (var i = 0; i < data.usuarios.length; i++) {
   		if(i == 0) { $("#listausuarios").html("<tr>"); }
         else { $("#listausuarios").append("<tr>"); }
         $("#listausuarios").append("<td>"+data.usuarios[i].nombres+" "+data.usuarios[i].apellidos+"</td>");  
         $("#listausuarios").append("<td><a href='admin/usuarios/"+data.usuarios[i].id+"'>"+data.usuarios[i].usuario+"</td>");  
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