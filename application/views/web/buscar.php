<script type="text/javascript">
var quebuscar = "<?php print $quebuscar;?>";
var ppp = <?php print $ppp;?>;
var pag = 1;
var proceso = "busqueda";
</script>

<div class="container">

<!---------------------------------------------------------------PRODUCTOS -->
<!--<div class="row" style="background: #cccccc;">   -->
<div class="row">
   <div class="col-lg-10 col-lg-offset-2 text-center" id="titulo">
		<h4>Busqueda de: <strong><?php if ($quebuscar == "*") {print "TODOS LOS PRODUCTOS";} else {print "$quebuscar";} ?></strong></h4>
	</div>
</div>
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
	</div>
	<div class="col-lg-10">
		<div class="row baner08" id="listaproductos">  

<?php
if (count($productos) == 0) {print '<h4 class="text-center label-warning">No hay productos coincidentes con el criterio de busqueda</h4>';}

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
	</div>  
	<div class="row">
		<div class="dataTables_paginate paging_simple_numbers text-center" id="dataTables-example_paginate">
			<ul class="pagination" id="paginado">
				<?php
				$paginas = ceil($cant/$ppp);
				if ($paginas > 1) {
					print '	<li class="paginate_button active" aria-controls="dataTables-example" tabindex="0">
					  				<a href="javascript:void(0)" data-pag="1" class="link-a-pagina">1</a>
								</li>';
					for ($i=2; $i < ceil($cant/$ppp)+1; $i++) { 
				 		print'	<li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
				   					<a data-pag="'.$i.'" class="link-a-pagina" href="javascript:void(0)">'.$i.'</a>
									</li>';
					}
					print '	<li class="paginate_button" aria-controls="dataTables-example" tabindex="0">
					 				<a data-pag="sig" class="link-a-pagina" href="javascript:void(0)">&raquo;</a>
					 			</li>';
				}
				?>
			</ul>
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
		proceso = "categoria";
		pag = 1;
		$("#titulo").html('<h4><strong>'+$(event.target).html()+'</strong></h4>');
		rta = buscarxcategoria(idcategoria, function(rta){
			if(!rta) {  }
		})
	});

	$('.container').on('click','.marca',function(event){
		idmarca = $(event.target).attr("data-id");
		proceso = "marca";
		pag = 1;
		$("#titulo").html('<h4><strong>'+$(event.target).html()+'</strong></h4>');
		rta = buscarxmarca(idmarca, function(rta){
			if(!rta) {  }
		})
	});

	$("#paginado").on('click','.link-a-pagina',function(e){
		e.preventDefault();
		pagdada = $(e.target).attr('data-pag');
		switch (pagdada) {
			case 'sig': pag = pag + 1; break;
			case 'ant': pag = pag - 1; break;
			default: pag = parseInt(pagdada);
		}
		switch (proceso) {
			case 'marca': buscarxmarca(idmarca); break;
			case 'categoria': buscarxcategoria(idcategoria); break;
			case 'busqueda': buscar(); break;
		}
	});

})

//----------------------------------------------------------------------------------funcion buscarxcategoria
function buscarxcategoria(idcategoria) {
	$.ajax({                                              
		url: "<?php print base_url();?>producto/listarxCategoriaWeb",
		context: document.body,
		dataType: "json",
		type: "POST",
		data: { idcategoria : idcategoria, ppp : ppp, pag : pag }})
	.done(function(data) {                               // respuesta del servidor
		if(data.res=="ok") {
//			callback(true);
			pintarproductos(data);
			pintarpaginacion(pag, ppp, data.cant); 
		}
		else {alert(data.msj);}
	})
	.error(function(){alert('No hay conexion');});
}

//----------------------------------------------------------------------------------funcion buscarxcategoria
function buscarxmarca(idmarca, callback) {
	$.ajax({                                              
		url: "<?php print base_url();?>producto/listarxMarcaWeb",
		context: document.body,
		dataType: "json",
		type: "POST",
		data: { idmarca : idmarca, ppp : ppp, pag : pag }})
	.done(function(data) {                               // respuesta del servidor
		if(data.res=="ok") {
//			callback(true);
			pintarproductos(data);
			pintarpaginacion(pag, ppp, data.cant); 
		} 
		else {alert(data.msj);}
	})
	.error(function(){alert('No hay conexion');});
}

//----------------------------------------------------------------------------------funcion LISTAR
function buscar(){
	$.ajax({                                               // envio de los datos
		url: "<?php print base_url();?>producto/buscar",
		context: document.body,
		dataType: "json",
		type: "POST",
		data: { quebuscar : quebuscar, ppp : ppp, pag : pag }
	})
	.done(function(data) {                                // respuesta del servidor
		if(data.res == "ok") {
			pintarproductos(data);
			pintarpaginacion(pag, ppp, data.cant); 
			return;
		}
		else{alert(data.msj) } 
		})          
	.error(function(){alert('error en el servidor'); });  // error generado
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

//----------------------------------------------------------------------------------funcion pintarproductos
function pintarpaginacion(pag, ppp, cant) {
	sartahtml = '';
	paginas = Math.ceil(cant/ppp);
	if (pag > 1) {
		sartahtml += '	<li class="paginate_button" aria-controls="dataTables-example" tabindex="0">'+
		             '		<a data-pag="ant" class="link-a-pagina" href="javascript:void(0)">&laquo;</a>'+
		             '	</li>';
	};		 
	for (var i = 1; i < Math.ceil(cant/ppp)+1; i++) {
		sartahtml += ' <li class="paginate_button ';
		if((i)==pag){
		  sartahtml+= ' active';
		}
		sartahtml += '" aria-controls="dataTables-example" tabindex="0">'+
		                  '<a data-pag="'+(i)+'" class="link-a-pagina" href="javascript:void(0)">'+(i)+'</a>'+
		              '</li>';
	};
	if (pag < paginas) {
		sartahtml += '	<li class="paginate_button" aria-controls="dataTables-example" tabindex="0">'+
		             '		<a data-pag="sig" class="link-a-pagina" href="javascript:void(0)">&raquo;</a>'+
		             '	</li>';
	};		 

	$("#paginado").html(sartahtml);   
}


//----------------------------------------------------------------------------------funcion formato_numero
function formato_numero(texto) {
	var resultado = "";
	for (var j, i = texto.length - 1, j = 0; i >= 0; i--, j++) 
		resultado = texto.charAt(i) + ((j > 0) && (j % 3 == 0)? ".": "") + resultado; 
	return resultado;
}

</script>

