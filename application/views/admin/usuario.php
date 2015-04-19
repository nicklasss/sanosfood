<div class="row registro">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<h2>USUARIO</h2>
	</div>
</div>

<form class="form-horizontal form-contenedor">

<div class="row registro">
	<div class="col-md-4">Nombre</div>
	<div class="col-md-1">dcto</div>
	<div class="col-md-2">Número</div>
	<div class="col-md-5">email</div>
</div>
<div class="row registro">
	<div class="col-md-4"><h4><?php print $usuario->nombres." ".$usuario->apellidos;?></h4></div>
	<div class="col-md-1"><h4><?php print $usuario->tipo_identidad;?></h4></div>
	<div class="col-md-2"><h4><?php print $usuario->nro_identidad;?></h4></div>
	<div class="col-md-5"><h4><?php print $usuario->correo;?></h4></div>
</div>

<div class="row registro">
	<div class="col-md-2">Usuario</div>
	<div class="col-md-2">Fijo</div>
	<div class="col-md-3">Celular</div>
	<div class="col-md-5">Dirección</div>
</div>
<div class="row registro">
	<div class="col-md-2"><h4><?php print $usuario->usuario;?></h4></div>
	<div class="col-md-2"><h4><?php print $usuario->telefono;?></h4></div>
	<div class="col-md-3"><h4><?php print $usuario->celular;?></h4></div>
	<div class="col-md-5"><h4><?php print $usuario->direccion;?></h4></div>
</div>

<div class="row registro">
	<div class="col-md-3">Barrio</div>
	<div class="col-md-3">Ciudad</div>
	<div class="col-md-3">Departamento</div>
	<div class="col-md-3">Pais</div>
</div>
<div class="row registro">
	<div class="col-md-3"><h4><?php print $usuario->barrio;?></h4></div>
	<div class="col-md-3"><h4><?php print $usuario->ciudad;?></h4></div>
	<div class="col-md-3"><h4><?php print $usuario->region;?></h4></div>
	<div class="col-md-3"><h4><?php print $usuario->pais;?></h4></div>
</div>

</form>

<div class="row registro">
	<div class="col-md-5"><h2>PEDIDOS</h2></div>
	<div class="col-md-1"></div>
	<div class="col-md-5"><h2>LINEAS DE PEDIDOS</h2></div>
</div>
<div class="row">
	<div class="col-md-5">
		<div class="panel panel-default panel-usuarios">
			<table class="table table-condensed table-striped">
				<thead>
				<tr role="row">
				  <th>Fecha</th>
				  <th>Estado</th>
				</tr>
				</thead>
				<tbody id="lista">
<?php if (isset($pedidos)) {
			foreach ($pedidos as $pedido) {
			print	'<tr role="row">
						<td>'.$pedidos->fecha.'</td>
						<td>'.$pedidos->estado.'</td>
					</tr>';
			};
		}
?>
				</tbody>
			</table> <!--table-->
		</div> <!--panel-->
	</div> <!--col-md-8-->
	<div class="col-md-2"></div>
	<div class="col-md-5">
		<div class="panel panel-default panel-usuarios">
			<table class="table table-condensed table-striped">
				<thead>
				<tr role="row">
				  <th>Producto</th>
				  <th>Cantidad</th>
				</tr>
				</thead>
				<tbody id="lista">
<?php if (isset($lineaspedidos)) {
			foreach ($lineaspedidos as $linea) {
			print	'<tr role="row">
						<td>'.$linea->producto.'</td>
						<td>'.$linea->cantidad.'</td>
					</tr>';
			};
		}
?>
				</tbody>
			</table> <!--table-->
		</div> <!--panel-->
	</div> <!--col-md-8-->

</div>






<script type="text/javascript">
$(document).ready(function() { 

	$('.form-contenedor').on('click','.btn-limpiar',function(event){
		limpiarpantalla();
	});

	$('.form-contenedor').on('click','.btn-guardar',function(event){
		enombre = $('.form-contenedor').find('.entnombre').val();
		edescripcion = $('.form-contenedor').find('.entdescripcion').val();
		eingredientes = $('.form-contenedor').find('.entingredientes').val();
		emarca = $('.form-contenedor').find('.entmarca').val();
		eprecio = $('.form-contenedor').find('.entprecio').val();
		epeso = $('.form-contenedor').find('.entpeso').val();
		epesoneto = $('.form-contenedor').find('.entpesoneto').val();
		elargo = $('.form-contenedor').find('.entlargo').val();
		eancho = $('.form-contenedor').find('.entancho').val();
		ealto = $('.form-contenedor').find('.entalto').val();
		eexistencias = $('.form-contenedor').find('.entexistencias').val();
		eestado = $('.form-contenedor').find('.entestado').val();

		if(enombre == "" || edescripcion == "" || emarca == "" || eprecio == "" || epeso == "" || epesoneto == "" || eestado == "") {
			alert("Los campos obligatorios deben estar diligenciados");
			return false; }

		if(validarnumeroentero(eprecio, "PRECIO")  == false) {return false;}
		if(validarnumeroentero(epeso, "PESO")  == false) {return false;}
		if(validarnumeroentero(epesoneto, "PESO NETO")  == false) {return false;}
		if(elargo != "") {if(validarnumeroentero(elargo, "LARGO") == false) {return false;}}
		if(eancho != "") {if(validarnumeroentero(eancho, "ANCHO") == false) {return false;}}
		if(ealto != "")  {if(validarnumeroentero(ealto, "ALTO")  == false) {return false;}}
		if(eexistencias != "")  {if(validarnumeroentero(eexistencias, "EXISTENCIAS")  == false) {return false;}}
		
		rta = crear( enombre, edescripcion, eingredientes, emarca, eprecio, epeso, epesoneto, elargo, eancho, ealto, eexistencias, eestado, function(rta){
			if(rta) {
				limpiarpantalla();
		   };
	   });
	});
});

function crear (nombre, descripcion, ingredientes, marca, precio, peso, pesoneto, largo, ancho, alto, existencias, estado, callback) {
	var datacaracteristicas = [];
	$('input[name*="car"]:checked').each(function(){
		if($(this).val()!=='chulo'){
			var caracteristica = { "idcaracteristica" : $(this).attr('data-id') , "valor" : $(this).val() };
			datacaracteristicas.push(caracteristica);
		}
	});
	var datacategorias = [];
	$('input[name*="cat"]:checked').each(function(){
		var categoria = { "idcategoria" : $(this).attr('data-id') };
		datacategorias.push(categoria);
	});
  $.ajax({                                               
	    url: "<?php print base_url();?>producto/crear",
	    context: document.body,
	    dataType: "json",
	    type: "POST",
	    data: {nombre : nombre, descripcion : descripcion, ingredientes : ingredientes, precio : precio, marca : marca, pesoneto : pesoneto, 
	    		  peso : peso, largo : largo, ancho : ancho, alto : alto, existencias : existencias, estado : estado,
	           datacaracteristicas : JSON.stringify(datacaracteristicas), datacategorias : JSON.stringify(datacategorias) } })
   .done(function(data) {                               // respuesta del servidor
    if(data.res=="ok") {callback(true)}
    else {alert(data.msj);callback(false)}
    })
   .error(function(){alert('No hay conexion');callback(false);})
}

function validarnumeroentero (valor, campo) {
	for(var i = 0; i<valor.length;i++){
		if(valor.charCodeAt(i)<48 || valor.charCodeAt(i)>57) {
			alert(campo + " debe ser un número entero positivo");
			return false;
		}
	}
}

function limpiarpantalla () {
	$('.form-contenedor').find('.entnombre').val("");
	$('.form-contenedor').find('.entdescripcion').val("");
	$('.form-contenedor').find('.entingredientes').val("");
	$('.form-contenedor').find('.entprecio').val("");
	$('.form-contenedor').find('.entpeso').val("");
	$('.form-contenedor').find('.entpesoneto').val("");
	$('.form-contenedor').find('.entlargo').val("");
	$('.form-contenedor').find('.entancho').val("");
	$('.form-contenedor').find('.entalto').val("");
	$('.form-contenedor').find('.entexistencias').val("");
	$('.form-contenedor').find('.entestado').val("");
	$('input[value*="chulo"]').each(function(){
		$(this).prop("checked", true);
	});
	$('input[name*="cat"]').each(function(){
		$(this).prop("checked", false);
	});
}

</script>