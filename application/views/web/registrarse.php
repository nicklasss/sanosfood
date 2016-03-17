<div class="container" style="margin-top:40px;">

	<div class="row">
		<div class="col-md-5 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					<strong>Registro (Crear una cuenta)</strong>
				</div>
				<div class="panel-body">
					<form role="form">
						<fieldset>
							<div class="row">
								<div class="col-sm-12 col-md-10  col-md-offset-1 ">
									<div class="form-group">
										<div class="input-group">

											<span class="input-group-addon">
												<i class="glyphicon glyphicon-user"></i>
											</span><span>Nombre del Usuario (email)</span>
											<strong><input class="form-control" placeholder="email" id="email" type="email" autofocus/></strong>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="glyphicon glyphicon-lock"></i>
											</span><span>Contraseña</span>
											<strong><input class="form-control" placeholder="Contraseña" id="clave1" type="password" value=""/></strong>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="glyphicon glyphicon-lock"></i>
											</span><span>Redigite la Contraseña</span>
											<strong><input class="form-control" placeholder="Redigite la Contraseña" id="clave2" type="password" value=""/></strong>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<strong><span id="mensaje" class="mensajeerror"></span></strong>
										</div>
									</div>

									<div class="form-group">
										<button id="btn-enviar-registro" type="button" class="btn btn-lg btn-primary btn-block">Registrarme</button>
									</div>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
            </div>
		</div>
	</div>






<!--

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
					<strong><input type="email" id="email" class="form-control placeholder-sm"/></strong>
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
-->
</div>
 
<!-- Scripts y Funciones de Javascript  -->
<script type="text/javascript">

	$(document).ready(function() {
		$('#btn-enviar-registro').click(crear); 
	});
            
//----------------------------------------------------------------------------------funcion crear usuario
    function crear() {
		if ($("#email").val()     == "") { $('#mensaje').html('email no puede ser vacio'); $("#email").focus(); return false; }
		if ($("#clave1").val()    == "") { $('#mensaje').html('Contraseña no puede ser vacia'); $("#clave1").focus(); return false; }
		if ($("#clave2").val()    == "") { $('#mensaje').html('Contraseña no puede ser vacio'); $("#clave2").focus(); return false; }
		if ($("#clave1").val() !== $("#clave2").val())  { $('#mensaje').html('Las Contraseñas no coinciden'); $("#clave1").focus(); return false; } 
		email = $("#email").val();
		clave = $("#clave1").val();

        $.ajax({                                               
          url: "<?php print base_url();?>Usuario/crear",
          context: document.body,
          dataType: "json",
          type: "POST",
          data: {email : $("#email").val(), clave : $("#clave1").val() }})
		.done(function(data) {
			if(data.res == "ok") {
				enviar_login(email, clave);
				window.location= "<?php print base_url();?>web/index";
			} else {$('#mensaje').html(data.msj) } 
		})          
		.error(function() { $('#mensaje').html('error en el servidor'); })
         
    }

    function enviar_login(usuario, clave) {
        $.ajax({                                               // envio de los datos
          url: "<?php print base_url();?>usuario/logear",
          context: document.body,
          dataType: "json",
          type: "POST",
          data: {usuario  : $("#usuario").val(), clave : $("#clave").val()} })
         .done(function(data) {                                // respuesta del servidor
            if(data.res=="ok") {
            }else{alert(data.msj) } })          
         .error(function(){alert('error en el servidor'); });  // error generado
    }
    
</script>

