<div class="container">
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="row panel panel-success">
			<div class="panel-heading col-md-12"><h2 class="text-center">Formulario de contacto</h2></div>
			<div class="panel-body">
				<form role="form">
					<div class="row">
						<div class="col-md-10  col-md-offset-1 ">

							<div class="form-group">
								<span><strong><br>Correo electrónico:</strong></span>
									<input class="form-control" id="correo" type="email" value="<?php print $this->session->userdata("usuario");?>"autofocus>
							</div>

							<div class="form-group">
								<span><strong>Asunto:</strong></span>
									<input class="form-control" id="asunto" type="text">
							</div>

							<div class="form-group">
								<span><strong>Mensaje:</strong></span>
								<textarea class="form-control" id="mensaje" type="text" rows="5"></textarea>
							</div>

							<!-- - - - - - - Campos para mensaje de Error - - - - - - - - - - - - - - - - - - - - - - - - - - -->
							<div class="form-group text-center" id="msg-error"><div class="input-group"><span> </span></div></div>
							<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  -->

							<div class="form-group">
								<button id="btn-enviar" type="button" class="btn btn-primary btn-block"><strong>Enviar</strong></button>
							</div>

						</div>
					</div>
				</form>
			</div>
		</div> <!-- panel -->
	</div>
</div>
</div><!-- Container-->


<!---------------------------------------------------------------------------------------------------------------------->
<script type="text/javascript">

$(document).ready(function() { 
	//---------------------------------------------------------Boton EDITAR
	$('.container').on('click','#btn-enviar',function(event){
		correo =  $("#correo").val();
		asunto =  $("#asunto").val();
		mensaje = $("#mensaje").val();
		resvalidaemail = validarEmail(correo);
		if (resvalidaemail != "ok") {
			sarta = '<strong style="color:red;">'+resvalidaemail+'</strong>'; $('#msg-error').html(sarta); // Mensaje de error
			$("#correo").focus();
			return false;
		}
		if (mensaje == "") { 
			sarta = '<strong style="color:red;">** El Mensaje no puede estar vacio **</strong>'; $('#msg-error').html(sarta); // Mensaje de error
			$("#mensaje").focus();
			return false;
		}
		rta = enviar_email(function(rta){ })
	})

})

//---------------------------------------------------------enviar_login
function enviar_email(callback) {
    $.ajax({                                             
      url: "<?php print base_url();?>interfases/contactenos",
      context: document.body,
      dataType: "json",
      type: "POST",
      data: {correo : correo, asunto : asunto, mensaje : mensaje} })
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

//----------------------------------------------------------------------------------funcion validarEmail
function validarEmail(correo) {
	if ( correo == "") { return ("** La dirección de correo vacia **"); }
	expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!expr.test(correo)) { return ("** La dirección de correo " + correo + " es incorrecta **");	}
	return ("ok");
}

</script>
