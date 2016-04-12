<div class="container" style="margin-top:40px;">
	<div class="row">
		<div class="col-md-5 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					<strong>Cambiar Contraseña por olvido</strong>
				</div>
				<div class="panel-body">
					<form role="form">
						<fieldset>
							<div class="row">
								<div class="col-sm-12 col-md-10  col-md-offset-1 ">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="glyphicon glyphicon-lock"></i>
											</span><span>Nueva Contraseña</span>
											<strong><input class="form-control" placeholder="Contraseña" id="clave1" type="password" value=""/></strong>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="glyphicon glyphicon-lock"></i>
											</span><span>Redigite la Nueva Contraseña</span>
											<strong><input class="form-control" placeholder="Redigite la Contraseña" id="clave2" type="password" value=""/></strong>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<strong><span id="mensaje" class="mensajeerror"></span></strong>
										</div>
									</div>

									<div class="form-group">
										<button id="btn-enviar-registro" type="button" class="btn btn-lg btn-primary btn-block">Cambiar Contaseña</button>
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
	llave = <?php print($this->uri->segment(3));?>;

	$(document).ready(function() {
		$('#btn-enviar-registro').click(cambiarclave); 
	});
            
//----------------------------------------------------------------------------------funcion crear usuario
function cambiarclave() {
	if ($("#clave1").val() == "") { $('#mensaje').html('Contraseña no puede ser vacia'); $("#clave1").focus(); return false; }
	if ($("#clave2").val() == "") { $('#mensaje').html('Contraseña no puede ser vacia'); $("#clave2").focus(); return false; }
	if ($("#clave1").val() !== $("#clave2").val())  { $('#mensaje').html('Las Contraseñas Nuevas no coinciden'); $("#clave1").focus(); return false; } 
	eclavenueva = $("#clave1").val();
    $.ajax({                                               
      url: "<?php print base_url();?>usuario/cambiarclaveolvido",
      context: document.body,
      dataType: "json",
      type: "POST",
      data: { llave : llave, nuevaclave : eclavenueva }})
	.done(function(data) {
		if(data.res == "ok") {
			window.location= "<?php print base_url();?>web/index";
		} else { $('#mensaje').html(data.msj);
				 $("#claveactual").focus();
		} 
	})          
	.error(function() { 
		$('#mensaje').html('error en el servidor');
	})
}
    
</script>

