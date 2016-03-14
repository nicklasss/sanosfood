<div class="container" style="margin-top:40px;">

    <div class="panel panel-default">

		<div class="panel-heading text-center">
			<strong><h3>Datos del nuevo Usuario</h3></strong>
		</div>

		<form class="form-horizontal form-contenedor">
			<div class="row registro"><br></div>
			<div class="row registro">
				<div class="col-md-3 col-md-offset-1">
					<span>Nombres Completos </span><span class="asterisco">*</span>
					<strong><input type="text" id="nombres" class="form-control"/></strong>
				</div>
				<div class="col-md-3">
					<span>Apellidos Completos </span><span class="asterisco">*</span>
					<strong><input type="text" id="apellidos" class="form-control"/></strong>
				</div>
			</div>

			<div class="row registro"><br>
				<div class="col-md-3 col-md-offset-1">
					<span>email (nombre de usuario) </span><span class="asterisco">*</span>
					<strong><input type="email" id="email" class="form-control placeholder-sm" placeholder="Nombre"/></strong>
				</div>
				<div class="col-md-2">
					<span>Contraseña </span><span class="asterisco">*</span>
					<strong><input type="password" id="clave1" class="form-control"/></strong>
				</div>
				<div class="col-md-2">
					<span>Redigite la Contraseña </span><span class="asterisco">*</span>
					<strong><input type="password" id="clave2" class="form-control"/></strong>
				</div>
			</div>

			<div class="row registro"><br>
				<div class="col-md-2 col-md-offset-1">
					<span>Número de Cédula</span>
					<strong><input type="number" id="cedula" class="form-control"/></strong>
				</div>
				<div class="col-md-2">
					<span>Teléfono</span>
					<strong><input type="number" id="telefono" class="form-control"/></strong>
				</div>
				<div class="col-md-2">
					<span>Celular</span>
					<strong><input type="number" id="celular" class="form-control"/></strong>
				</div>
				<div class="col-md-4">
					<span>Dirección</span>
					<strong><input type="text" id="direccion" class="form-control"/></strong>
				</div>
			</div>

			<div class="row registro"><br>
				<div class="col-md-2 col-md-offset-1">
					<span>Barrio</span>
					<strong><input type="text" id="barrio" class="form-control"/></strong>
				</div>
				<div class="col-md-2">
					<span>Ciudad</span>
					<strong><input type="text" id="cuidad" class="form-control"/></strong>
				</div>
				<div class="col-md-3">
					<span>Región o Departamento</span>
					<strong><input type="text" id="departamento" class="form-control"/></strong>
				</div>
				<div class="col-md-3">
					<span>País</span>
					<strong><input type="text" id="país" value="Colombia" class="form-control"/></strong>
				</div>
			</div>

			<div class="row registro">
				<div class="col-md-2 col-md-offset-1">
					<br><span class="asterisco">*</span><span> información obligatoria</span>
				</div>
			</div>
			<div class="row registro">
				<div class="col-md-2 col-md-offset-9">
					<button id="btn-enviar-registro" type="button" class="btn btn-primary btn-block">Registrarme</button>
				</div>

			</div>

		</form>
	</div>

</div>
 
<!-- Scripts y Funciones de Javascript  -->
<script type="text/javascript">

	$(document).ready(function() {
		$('#btn-enviar-registro').click(crear); 
	});
            
//----------------------------------------------------------------------------------funcion crear usuario
    function crear() {
		if ($("#nombres").val()   == "") { alert('Nombres no puede ser vacio'); $("#nombres").focus(); return false; }
		if ($("#apellidos").val() == "") { alert('Apellidos no puede ser vacio'); $("#apellidos").focus(); return false; }
		if ($("#email").val()     == "") { alert('Email no puede ser vacio'); $("#email").focus(); return false; }
		if ($("#clave1").val()    == "") { alert('Clave no puede ser vacia'); $("#clave1").focus(); return false; }
		if ($("#clave2").val()    == "") { alert('Clave no puede ser vacio'); $("#clave2").focus(); return false; }
		if ($("#clave1").val() !== $("#clave2").val())  { alert('Las Claves no coincides'); $("#clave1").focus(); return false; } 

        $.ajax({                                               
          url: "<?php print base_url();?>Usuario/crear",
          context: document.body,
          dataType: "json",
          type: "POST",
          data: {nombres  : $("#nombres").val(), apellidos : $("#apellidos").val(), email : $("#email").val(),
          		 clave : $("#clave1").val(), cedula : $("#cedula").val(), telefono : $("#telefono").val(), 
          		 celular : $("#celular").val(), direccion : $("#direccion").val(), barrio : $("#barrio").val(),
          		 ciudad : $("#ciudad").val(), departamento : $("#departamento").val(), pais : $("#pais").val() }})
         .done(function(data) {
            if(data.res=="ok") {
				window.location= "<?php print base_url();?>web/index";}
            else {alert(data.msj) } })          
         .error(function() { alert('error en el servidor1'); })
         
    }
    
</script>

