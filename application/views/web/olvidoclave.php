<body>    
    <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-md-6 col-sm-offset-3">
				<div class="panel panel-default panel-warning">
					<div class="panel-heading text-center">
						<strong><h4>¿Olvidaste la contraseña?</h4></strong>
					</div>
					<div class="panel-body text-center">
						<h4>
							<strong><?php print str_replace("---","@",$this->uri->segment(3));?></strong> Recibirás un email en el buzón de correo que te identifica como usuario de Sanosfood's, 
							debes dar click en el enlace que allí aparece, este te lleva a una página donde puedes 
							cambiar tu clave por una nueva.
							<strong><br>Da click en enviar esta solicitud</strong>.
						</h4> 
						<div class="form-group text-right">
							<button id="btn-cancelar" type="button" class="btn btn-warning">Cancelar</button>
							<button id="btn-enviar" type="button" class="btn btn-success">Enviar</button>
						</div>

					</div>
                </div>
			</div>
		</div>
	</div>
 </body>


<!--========================================================================================================--> 
<script type="text/javascript">
	correo = '<?php print str_replace("---","@",$this->uri->segment(3));?>';

$(document).ready(function() {

	$('.container').on('click','#btn-cancelar',function(event){
		window.location = "<?php print base_url();?>web/index";
	})

	$('.container').on('click','#btn-enviar',function(event){
		rta = enviarEmail(function(rta) { });
		window.location = "<?php print base_url();?>web/index";
	})

})


//----------------------------------------------------------------------------------funcion enviarEmail
function enviarEmail (callback) {
alert(correo);
	$.ajax({                                               
	  url: "<?php print base_url();?>email/correoOlvidoClave",
	  context: document.body,
	  dataType: "json",
	  type: "POST",
	  data: { correo : correo,} })
	.done(function(data) {                              
		if(data.res == "ok") {alert("mando OK"); callback(true);}
		else {alert(data.msj); callback(false);}
	})
	.error(function(){
		alert('Error en el servidor'); 
		callback(false);
	})
} 

</script>

