<div class="container">

<?php
    print "(".$cant.") Productos"; 
?>          



<!---------------------------------------------------------------PRODUCTOS -->
<!--<div class="row" style="background: #cccccc;">   -->
<div class="row">
   <div class="col-lg-2">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading text-center"><h5><strong>CATEGORIAS</strong></h5></div>
				<table class="table table-condensed table-striped">
					<tbody>
					<?php 
					foreach ($categorias as $categoria) {
						print '
						<tr>
							<td><a href="javascript:void(0)" class="categ" data-id="'.$categoria->id.'" id="cat'.$categoria->id.'">'.$categoria->nombre.' ('.$categoria->cuentas.')</a></td>
						</tr>';
					}
					?>
					</tbody>
				</table> <!-- tabla--> 
			</div> <!-- Panel-->
		</div>
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading text-center"><h5><strong>MARCAS</strong></h5></div>
				<table class="table table-condensed table-striped">
					<tbody>
					<?php 
					foreach ($marcas as $marca) {
						print '
						<tr>
							<td><a href="javascript:void(0)" class="marca" data-id="'.$marca->idmarca.'" id="mar'.$marca->idmarca.'">'.$marca->nombre.' ('.$marca->cuentas.')</a></td>
						</tr>';
					}
					?>
					</tbody>
				</table> <!-- tabla--> 
			</div> <!-- Panel-->
		</div>

<!--		<div class="row">
			<div class="col-sm-12 text-center">
				<h6><strong>Ver Productos por Página</strong></h6>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
			<select id="select-cant" aria-controls="dataTables-example" class="form-control input-sm">
				<option value="6">6</option>
				<option value="12">12</option>
				<option value="24">24</option>
				<option value="48">48</option>
			</select>
			</div>
		</div>
-->



	</div>
	<div class="col-lg-10">
		<div class="row baner08" id="listaproductos">  


<?php
$i = 0;
foreach ($productos as $producto) {         

	if ($i == 0) {
	  print '<div class="row">';
	}
	elseif (($i % 3) == 0) {
		print '
		</div>
		<div class="row">';
	} 
	print '
		<div class="col-lg-4" align="center">
			<div class="row">
				<div class="col-lg-9 col-lg-offset-2">
					<div class="row">
						<div class="col-lg-12">
							<img class="img-responsive img01" src="'.$producto->imagen.'"/>
						</div>
					</div>     
					<div class="row">
						<div class="col-lg-10">
							<div class="row">
								<div class="col-lg-8 texto02" align="left"><h6><strong>'.$producto->nombre.'</strong></h6></div>
								<div class="col-lg-4 texto02" align="right"><h4><strong>$'.number_format($producto->precio , 0, ",", ".").'</strong></h4></div>
							</div>
						</div>   
					</div>
					<div class="row">
						<div class="col-lg-12 texto02" align="left">
							<h6>'.$producto->descripcioncorta.'</h6>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 text-right">
							<button type="button" class="btn btn-xs btn-success" id="btn-verdetalle" data-id="'.$producto->id.'">Ver Detalles</button>
						</div>
					</div>
				</div>
			</div>
		</div> ';
	$i = $i + 1;
	}
?>

		</div>

		<div class="row">
			<div class="col-md-12 center-text paginacion">
				<?php print $this->pagination->create_links();?>
			</div>
		</div>

<!--		<div class="row">
			<div class="dataTables_paginate paging_simple_numbers text-center" id="dataTables-example_paginate">
			   <ul class="pagination" id="paginas">
					<li class="paginate_button active" aria-controls="dataTables-example" tabindex="0">
			      	<a href="javascript:void(0)" data-pag="1" class="link-a-pagina">1</a>
					</li>
//					<?php
//					for ($i=2; $i < floor($cant/3)+2; $i++) { 
//						print'  	<li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
//									<a data-pag="'.$i.'" class="link-a-pagina" href="javascript:void(0)">'.$i.'</a>
//									</li>';
//					}
//					?>
				</ul>
			</div>  -->


		</div>
	</div>  
</div>
</div> <!-- /container -->

<!------------------------------------------------------------------------------------------------------------------------------------> 
<script type="text/javascript">

$(document).ready(function(){

	$('.container').on('click','#btn-verdetalle',function(event){
		id = $(event.target).attr("data-id");
		window.location="<?php print base_url();?>web/producto/"+id;
	});

	$('.container').on('click','.categ',function(event){
		idcategoria = $(event.target).attr("data-id");
		rta = buscarxcategoria(idcategoria, function(rta){
			if(!rta) {  }
		})
	})

	$('.container').on('click','.marca',function(event){
		idmarca = $(event.target).attr("data-id");
		rta = buscarxmarca(idmarca, function(rta){
			if(!rta) {  }
		})
	});
})

//----------------------------------------------------------------------------------funcion buscarxcategoria
function buscarxcategoria(idcategoria, callback) {
	$.ajax({                                              
		url: "<?php print base_url();?>producto/listarWeb",
		context: document.body,
		dataType: "json",
		type: "POST",
		data: { cant : 100, pagina : 1, idcategoria : idcategoria} })
	.done(function(data) {                               // respuesta del servidor
		if(data.res=="ok") {
			callback(true);
			$("#paginacion").html(data.pag);
			pintarproductos(data);
		} else {alert(data.msj);callback(false)}
	})
	.error(function(){alert('No hay conexion');callback(false);})
}

//----------------------------------------------------------------------------------funcion buscarxcategoria
function buscarxmarca(idmarca, callback) {
	$.ajax({                                              
		url: "<?php print base_url();?>producto/listarWeb",
		context: document.body,
		dataType: "json",
		type: "POST",
		data: { cant : 100, pagina : 1, idmarca : idmarca} })
	.done(function(data) {                               // respuesta del servidor
		if(data.res=="ok") {
			callback(true);
			$("#paginacion").html(data.pag);
			pintarproductos(data); return;
		} else {alert(data.msj);callback(false)}
	})
	.error(function(){alert('No hay conexion');callback(false);})
}

//----------------------------------------------------------------------------------funcion pintarproductos
function pintarproductos(data) {
	for (var i = 0; i < data.productos.length; i++) {
		if (i == 0) { 
			$("#listaproductos").html('<div class="row">'); 
		}else {
		if ((i % 3) == 0) {
			sarta1 =	'</div>'+
						'	<div class="row">';
			$("#listaproductos").append(sarta1);
		}  
		} 
	   sarta2 =	'<div class="col-lg-4" align="center">'+
					' 	<div class="row">'+
					'		<div class="col-lg-9 col-lg-offset-2">'+
					'			<div class="row">'+
					'				<div class="col-lg-12">'+
					'					<img class="img-responsive img01" src="'+data.productos[i].imagen+'"/>'+
					'				</div>'+
					'			</div>'+
					'			<div class="row">'+
					'				<div class="col-lg-10">'+
					'					<div class="row">'+
					'						<div class="col-lg-8 texto02" align="left"><h6><strong>'+data.productos[i].nombre+'</strong></h6></div>'+
					'						<div class="col-lg-4 texto02" align="right"><h4><strong>$'+formato_numero(data.productos[i].precio)+'</strong></h4></div>'+
					'					</div>'+
					'				</div>'+
					'			</div>'+
					'			<div class="row">'+
					'				<div class="col-lg-12 texto02" align="left">'+
					'					<h6>'+data.productos[i].descripcioncorta+'</h6>'+
					'				</div>'+
					'			</div>'+
					'			<div class="row">'+
					'				<div class="col-lg-12 text-right">'+
					'					<button type="button" class="btn btn-xs btn-success" id="btn-verdetalle" data-id="'+data.productos[i].id+'">Ver Detalles</button>'+
					'				</div>'+
					'			</div>'+
					'		</div>'+
					'	</div>'+
					'</div>';
		$("#listaproductos").append(sarta2);
	}
}

//----------------------------------------------------------------------------------funcion formato_numero
function formato_numero(texto) {
var resultado = "";
for (var j, i = texto.length - 1, j = 0; i >= 0; i--, j++) 
	resultado = texto.charAt(i) + ((j > 0) && (j % 3 == 0)? ".": "") + resultado; 
return resultado;
}

</script>

