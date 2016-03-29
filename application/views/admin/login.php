<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="description" content="">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	<meta name="author" content="sanosfood">

	<title>Sanosfood</title>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>    
    <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Iniciar sesión</strong>
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
											<button id="btn-enviar" type="button" class="btn btn-lg btn-primary btn-block">Entrar</button>
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
 


<!---------------------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
$(document).ready(function() {
	$('#btn-enviar').click(enviar); 
});
        
//-- Funcion enviar datos del misionero al servidor al misioneros/crear.php quien los recibe
function enviar() {
    if($("#usuario").val()=="") { alert('Usuario no puede ser vacio');
      $("#usuario").focus(); return false; }
    if($("#clave").val()=="") { alert('Clave no puede ser vacia');
      $("#clave").focus(); return false; }

    $.ajax({                                               // envio de los datos
      url: "<?php print base_url();?>admin/validarusuario",
      context: document.body,
      dataType: "json",
      type: "POST",
      data: {usuario  : $("#usuario").val(), clave : $("#clave").val()} })
     .done(function(data) {                                // respuesta del servidor
        if(data.res=="ok") {
          window.location= "<?php print base_url();?>admin/productos/Todos";}
        else{alert(data.msj) } })          
     .error(function(){alert('error en el servidor'); });  // error generado
}

</script>

</body>