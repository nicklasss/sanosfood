<body>    
    <div class="container" style="margin-top:40px">
		<div class="row">
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
							<button id="btn-enviar-nuevo" type="button" class="btn btn btn-primary">Crear una Cuenta</button>
						</div>

					</div>
                </div>
			</div>

			<div class="col-md-4 col-md-offset-1">
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
												</span> 
												<input class="form-control" placeholder="Usuario" id="usuario" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Clave" id="clave" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<button id="btn-enviar-login" type="button" class="btn btn-lg btn-primary btn-block">Iniciar Sesión</button>
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
 


    <!-- Scripts y Funciones de Javascript  -->
    <script type="text/javascript">

    //-- garantiza que el siguiente Javascript se ejecuta despues de haberse cargado completamente la pagina
$(document).ready(function() {
	$('#btn-enviar-login').click(enviar_login); });
            
    //-- Funcion enviar datos del misionero al servidor al misioneros/crear.php quien los recibe
    function enviar_login() {
		if ($("#usuario").val()=="") { 
			alert('Usuario no puede ser vacio');
			$("#usuario").focus(); return false; 
		}
		if ($("#clave").val()=="") { 
			alert('Clave no puede ser vacia');
			$("#clave").focus(); return false;
		}

        $.ajax({                                               // envio de los datos
          url: "<?php print base_url();?>usuario/logear",
          context: document.body,
          dataType: "json",
          type: "POST",
          data: {usuario  : $("#usuario").val(), clave : $("#clave").val()} })
         .done(function(data) {                                // respuesta del servidor
            if(data.res=="ok") {
              window.location= "<?php print base_url();?>web/index";}
            else{alert(data.msj) } })          
         .error(function(){alert('error en el servidor'); });  // error generado
    }
    
	</script>

</body>