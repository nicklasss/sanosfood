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
							Recibirás un email en el buzón de correo que te identifica como usuario de Sanosfood's, 
							debes dar click en el enlace que allí aparece, este te lleva a una página donde puedes 
							cambiar tu clave por una nueva.
							<strong>Da click en enviar esta solicitud</strong>.
						</h4> 
						<div class="form-group text-right">
							<button id="btn-enviar" type="button" class="btn btn-warning">Enviar</button>
						</div>

					</div>
                </div>
			</div>
		</div>
	</div>
 </body>


<!--------------------------------------------------------------------------------------------------------------------------> 
<script type="text/javascript">

//-- garantiza que el siguiente Javascript se ejecuta despues de haberse cargado completamente la pagina
$(document).ready(function() {


	$('.container').on('click','#btn-enviar',function(event){
		window.location= "index";
	})
})
    
</script>

