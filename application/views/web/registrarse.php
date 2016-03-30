<div class="container" style="margin-top:40px;">

	<div class="row">
		<div class="col-md-5 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					<strong><h3>Registro (Crear una cuenta)</h3></strong>
				</div>
				<div class="panel-body">
					<form role="form">
						<fieldset>
							<div class="row">
								<div class="col-sm-12 col-md-10  col-md-offset-1 ">
<!--									<div class="form-group">
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
-->


										<div class="form-group">
											<label>Nombre del Usuario (email)</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Usuario" id="usuario" type="text" autofocus>
											</div>
										</div>

										<div class="form-group">
											<label>Contraseña</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Contraseña" id="clave1" type="password" value="">
											</div>
										</div>

										<div class="form-group">
											<label>Redigite la contraseña</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Contraseña" id="clave2" type="password" value="">
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
</div>
 
<!----------------------------------------------------------------- Scripts y Funciones de Javascript  -->
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
		eemail = $("#email").val();
		eclave = $("#clave1").val();

        $.ajax({                                               
          url: "<?php print base_url();?>usuario/crear",
          context: document.body,
          dataType: "json",
          type: "POST",
          data: {email : eemail, clave : eclave }})
		.done(function(data) {
			if(data.res == "ok") {
				window.location= "<?php print base_url();?>web/index";
			} else {$('#mensaje').html(data.msj) } 
		})          
		.error(function() { $('#mensaje').html('error en el servidor'); })
         
    }

//----------------------------------------------------------------------------------funcion crear usuario
    function enviar_login() {
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

