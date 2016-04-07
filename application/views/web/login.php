<body>    
    <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-md-5">
				<div class="panel panel-warning">
					<div class="panel-heading text-center">
						<strong><h3>Usuarios registrados</h3></strong>
					</div>
					<div class="panel-body">
						<form role="form">
							<fieldset>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<label>Correo electrónico (<small>Nombre del Usuario</small>)</label>
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
												<input class="form-control" placeholder="Contraseña" id="clave" type="password" value="">
											</div>
										</div>

										<!-- - - - - - - Campos para mensaje de Error -->
										<div class="form-group text-center" id="msg-error"><div class="input-group"><span> </span></div></div>
										<!-- - - - - - - - - - - - - - - - - - - - - -->

										<div class="form-group">
											<button id="btn-enviar-login" type="button" class="btn btn-lg btn-primary btn-block">Iniciar Sesión</button>
										</div>
										<div class="form-group text-center">
											<a href="olvidoclave"><strong>¿Olvidaste la Contraseña?</strong></a>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
                </div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<strong><h4>Crear una cuenta</h4></strong>
					</div>
					<div class="panel-body">
						<span>
							Al crear una cuenta en nuestra tienda, podrás realizar el proceso de compra más rápidamente, 
							indicar una dirección de envío, ver y hacer un seguimiento de tus pedidos y mucho más.
						</span> 
						<div class="form-group text-right">
							<button id="btn-enviar-nuevo" type="button" class="btn btn-info">Registrate</button>
						</div>

					</div>
                </div>
			</div>
		</div>
	</div>
 


<!--------------------------------------------------------------------------------------------------------------------------> 
<script type="text/javascript">

$(document).ready(function() {

	$('.container').on('click','#btn-enviar-login',function(event){
		if ($("#usuario").val() == "") { 
			sarta = '<strong style="color:red;">** Usuario no puede ser vacio **</strong>'; $('#msg-error').html(sarta);  // Mensaje de error
			$("#usuario").focus();
			return false; 
		}
		if ($("#clave").val() == "") { 
			sarta = '<strong style="color:red;">** Contraseña no puede ser vacia **</strong>'; $('#msg-error').html(sarta); // Mensaje de error
			$("#clave").focus();
			return false;
		}
		sarta = ' '; $('#msg-error').html(sarta);    // Limpia mensaje de error		
		rta = enviar_login(function(rta){ 
		})
	});

	$('.container').on('click','#btn-enviar-nuevo',function(event){
		window.location= "<?php print base_url();?>web/registrarse";
	});

});
            
//---------------------------------------------------------enviar_login
    function enviar_login(callback) {
        $.ajax({                                             
          url: "<?php print base_url();?>usuario/web_logear",
          context: document.body,
          dataType: "json",
          type: "POST",
          data: {usuario  : $("#usuario").val(), clave : $("#clave").val()} })
		.done(function(data) {                                
			if(data.res=="ok") {
				window.location = "<?php print base_url();?>web/index";
				callback(true);
			} else {
				sarta = '<strong style="color:red;">'+data.msj+'</strong>'; $('#msg-error').html(sarta); // Mensaje de error
				callback(false);
			}
		})          
		.error(function(){
			sarta = '<strong style="color:red;">** ERROR EN EL SERVIDOR **</strong>'; $('#msg-error').html(sarta); // Mensaje de error
			callback(false);
		})  
    }
    
</script>

</body>