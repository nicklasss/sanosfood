<body>    
    <div class="container" style="margin-top:40px">
		<div class="row">

			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<strong>Clientes Registrados</strong>
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
												</span><span> Nombre del Usuario (email)</span>
												<strong><input class="form-control" placeholder="Usuario" id="usuario" type="email" autofocus/></strong>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span><span> Contraseña</span>
												<strong><input class="form-control" placeholder="Clave" id="clave" type="password" value=""/></strong>
											</div>
										</div>

										<!-- - - - - - - Campos para mensaje de Error -->
										<div class="form-group text-center" id="msg-error"><div class="input-group"><span> </span></div></div>
										<!-- - - - - - - - - - - - - - - - - - - - - -->

										<div class="form-group">
											<button id="btn-enviar-login" type="button" class="btn btn-lg btn-primary btn-block">Iniciar Sesión</button>
										</div>
										<div class="form-group text-right">
											<button id="btn-olvidoclave" type="button" class="btn btn-sm btn-info">Olvido la Contraseña ?</button>
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
						<strong>Crear una cuenta</strong>
					</div>
					<div class="panel-body">
						<span>
							Al crear una cuenta en nuestra tienda, podrá realizar el proceso de compra más rápidamente, 
							indicar una dirección de envío, ver y hacer un seguimiento de sus Pedidos y mucho más.
						</span> 
						<div class="form-group text-right">
							<button id="btn-enviar-nuevo" type="button" class="btn btn-xs btn-info">Registrarse (Crear una cuenta)</button>
						</div>

					</div>
                </div>


				<div class="panel panel-default escondido">
					<div class="panel-body">
						<span>
							Usted recibirá un email en el buzon de correo que lo identifica como usuario de Sanosfood's, 
							debe dar click en el enlace que allí aparece que lo lleva a poder cambiar su clave por una nueva.
						</span> 
						<div class="form-group text-right">
							<button id="btn-confirma" type="button" class="btn btn-xs btn-primary">Ok ?</button>
							<button id="btn-cancela" type="button" class="btn btn-xs btn-warning">Cancelar</button>
						</div>

					</div>
                </div>


			</div>
		</div>
	</div>
 


<!--------------------------------------------------------------------------------------------------------------------------> 
<script type="text/javascript">

//-- garantiza que el siguiente Javascript se ejecuta despues de haberse cargado completamente la pagina
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

	$('.container').on('click','#btn-olvidoclave',function(event){
		$('#btn-olvidoclave').attr('disabled', true);
		$('.escondido').show(1000);
	});

	$('.container').on('click','#btn-confirma',function(event){
		alert("aqui se envia email con el enlace");
		window.location= "<?php print base_url();?>web/index";
	});

	$('.container').on('click','#btn-cancela',function(event){
		$('#btn-olvidoclave').attr('disabled', false);
		$('.escondido').hide(1000);
	});

});
            
//-- Funcion enviar datos del misionero al servidor al misioneros/crear.php quien los recibe
    function enviar_login(callback) {
        $.ajax({                                             
          url: "<?php print base_url();?>usuario/web_logear",
          context: document.body,
          dataType: "json",
          type: "POST",
          data: {usuario  : $("#usuario").val(), clave : $("#clave").val()} })
		.done(function(data) {                                
			if(data.res=="ok") {
				window.location= "<?php print base_url();?>web/index";
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