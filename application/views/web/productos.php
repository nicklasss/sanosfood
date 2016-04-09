<script type="text/javascript">
var quebuscar = "<?php print $quebuscar;?>";
var ppp = <?php print $ppp;?>;
var baseurl = '<?php print base_url()?>';
var pag = 1;
var proceso = "busqueda";
</script>

<div class="container">

<!---------------------------------------------------------------PRODUCTOS -->
<!--<div class="row" style="background: #cccccc;">   -->
<div class="row">
   <div class="col-lg-10 col-lg-offset-2 text-center" id="titulo">
		<h4>Busqueda de: <strong>
			<?php
			 	if ($quebuscar == "*") {print 'TODOS LOS PRODUCTOS <span class="badge">'.$cant.'</span>';} 
				else {print $quebuscar.' <span class="badge"> '.$cant.'</span>';} 
			?>
		</strong></h4>
	</div>
</div>
<div class="row">
	<div class="col-lg-2">
		<div class="row">
			<div class="panel panel-success">
				<div class="panel-heading text-center"><h5><strong>CATEGORIAS</strong></h5></div>
				<div class="list-group">
					<?php 
					foreach ($categorias as $categoria) {
						print '	<a href="javascript:void(0)" class="list-group-item categ" data-id="'.$categoria->id.'" id="cat'.$categoria->id.'">
								'.$categoria->nombre.' <span class="badge">'.$categoria->cuentas.'</span></a>';
					}
					?>
				</div> <!-- list-group--> 
			</div> <!-- Panel-->
		</div>
		<div class="row">
			<div class="panel panel-success">
				<div class="panel-heading text-center"><h5><strong>MARCAS</strong></h5></div>
				<div class="list-group">
					<?php 
					foreach ($marcas as $marca) {
						print '	<a href="javascript:void(0)" class="list-group-item marca" data-id="'.$marca->idmarca.'" id="mar'.$marca->idmarca.'">
								'.$marca->nombre.' <span class="badge">'.$marca->cuentas.'</span></a>';
					}
					?>
				</div> <!-- list-group--> 
			</div> <!-- Panel-->
		</div>
	</div>
	<div class="col-lg-10">
		<div id="listaproductos">  

<?php
if (count($productos) == 0) {print '<h4 class="text-center label-warning">No hay productos coincidentes con el criterio de busqueda</h4>';}

$i = 0;
foreach ($productos as $producto) {         
	if ($i == 0) {
	  print '
			<div class="row">';
	}
	elseif (($i % 3) == 0 && $i != 0) {
		print '
			</div>
			<div class="row">';
	} 
	print '		<div class="col-lg-4 prod-linea">
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="row">
								<div class="col-lg-12" align="center">
									<div class="panel panel-default panel-prod-img-mediana">
										<a href="'.base_url().'web/producto/'.$producto->id.'"><img class="img-responsive img-mediana" src="'.$producto->imagen.'"/></a>
									</div>
								</div>
							</div>     
							<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default panel-prod-nom">
										<a href="'.base_url().'web/producto/'.$producto->id.'" class="linkproducto"><div class="texto03" align="center"><strong>'.$producto->nombre.'</strong></div></a>
									</div>   
								</div>  
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-default panel-prod-desc">
										<a href="'.base_url().'web/producto/'.$producto->id.'" class="linkproducto"><h6 align="justify">'.$producto->descripcioncorta.'</h6></a>
									</div>
								</div>   
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="input-append">
										<div class="col-lg-3" align="left" id="existen">
											<h5><small>Disponibles:</small></h5>
										</div>
										<div class="col-lg-2" align="left">
											<h5><strong>'.$producto->existencias.'</strong></h5>
										</div>
										<div class="col-lg-1" align="right">
											<h5><small>Precio:</small></h5>
										</div>
										<div class="col-lg-3" align="left">
											<div class="col-lg-4 texto02" ><h4><strong>$'.number_format($producto->precio , 0, ",", ".").'</strong></h4></div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12" align="center">
									<div class="input-append">
										<button type="button" class="btn btn-xs btn-info" id="btn-verdetalle" data-id="'.$producto->id.'">Mas Detalles</button>
									</div>
								</div>
							</div>
							<div>
								<input type="hidden" class="idprod"     data-id="'.$producto->id.'"/>
								<input type="hidden" class="imagenprod" data-id="'.$producto->imagen.'"/>
								<input type="hidden" class="nombreprod" data-id="'.$producto->nombre.'"/>
								<input type="hidden" class="precioprod" data-id="'.$producto->precio.'"/>
								<input type="hidden" class="descripcioncortaprod" data-id="'.$producto->descripcioncorta.'"/>
							</div>
						</div>
					</div>
				</div> ';
	$i = $i + 1;
	}
	print '
			</div>';
?>
		</div>
	<div class="row">
		<div class="dataTables_paginate paging_simple_numbers text-center" id="dataTables-example_paginate">
			<ul class="pagination" id="paginado">
				<?php
				$paginas = ceil($cant/$ppp);
				if ($paginas > 1) {
					print '	<li class="paginate_button active" aria-controls="dataTables-example" tabindex="0">
					  			<span>1</span>
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
</div>
</div> <!-- /container -->

<!------------------------------------------------------------------------------------------------------------------------------------> 
<script type="text/javascript">

$(document).ready(function(){

/*	$('.container').on('click','#btn-agregarcarrito',function(event){
		cantidadprod = $(event.target).parent().parent().parent().parent().find('.cantidadprod').val();
		if(cantidadprod == 0) {return false;}
		idprod = $(event.target).parent().parent().parent().parent().find('.idprod').attr("data-id");
		imagenprod = $(event.target).parent().parent().parent().parent().find('.imagenprod').attr("data-id");
		nombreprod = $(event.target).parent().parent().parent().parent().find('.nombreprod').attr("data-id");
		descripcioncortaprod = $(event.target).parent().parent().parent().parent().find('.descripcioncortaprod').attr("data-id");
		precioprod = $(event.target).parent().parent().parent().parent().find('.precioprod').attr("data-id");
		agregarcarrito(idprod, imagenprod, nombreprod, descripcioncortaprod, precioprod, cantidadprod, function(rta){})
	})
*/
	$('.container').on('click','#btn-verdetalle',function(event){
		id = $(event.target).attr("data-id");
		window.location="<?php print base_url();?>web/producto/"+id;
	});

	$('.container').on('click','.categ',function(event){
		idcategoria = $(event.target).attr("data-id");
		proceso = "categoria";
		pag = 1;
		$("#titulo").html('<h4><strong>'+$(event.target).html()+' </strong></h4>');
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

//----------------------------------------------------------------------------------funcion agregar a carrito
/*function agregarcarrito (idprod, imagenprod, nombreprod, descripcioncortaprod, precioprod, cantidadprod, callback) {
	$.ajax({                                           
		url: "<?php print base_url();?>producto/agregarCarrito",
		context: document.body,
		dataType: "json",
		type: "POST",
		data: {idprod : idprod, imagenprod : imagenprod, nombreprod : nombreprod, descripcioncortaprod : descripcioncortaprod,
			   precioprod : precioprod, cantidadprod : cantidadprod }})
	.done(function(data) {                               
		if(data.res == "ok") {
			$("#cantcart").text(data.cantcart);
			$("#btn-carrito").removeClass("btn-default");  
			$("#btn-carrito").addClass("btn-warning");  
			callback(true)
		}
		else {alert(data.msj);callback(false)}})
	.error(function(){alert('No hay conexion');callback(false);})
}
*/
//----------------------------------------------------------------------------------funcion buscarxcategoria
function buscarxcategoria(idcategoria) {
	$.ajax({                                              
		url: "<?php print base_url();?>producto/listarxCategoriaWeb",
		context: document.body,
		dataType: "json",
		type: "POST",
		data: { idcategoria : idcategoria, ppp : ppp, pag : pag }})
	.done(function(data) { 
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
			sarta = '<div class="row">';
		}
		if ((i % 3) == 0 & i != 0) {
			sarta =	sarta + '</div>'+
							'	<div class="row">';
		}
		sarta = sarta +  
				'<div class="col-lg-4 prod-linea">'+
				'	<div class="row">'+
				'		<div class="col-lg-10 col-lg-offset-1">'+
				'			<div class="row">'+
				'				<div class="col-lg-12" align="center">'+
				'					<div class="panel panel-default panel-prod-img-mediana">'+
				'						<a href="'+baseurl+'web/producto/'+data.productos[i].id+'"><img class="img-responsive img-mediana" src="'+data.productos[i].imagen+'"/></a>'+
				'					</div>'+
				'				</div>'+
				'			</div>'+
				'			<div class="row">'+
				'				<div class="col-lg-12">'+
				'					<div class="panel panel-default panel-prod-nom">'+
				'						<a href="'+baseurl+'web/producto/'+data.productos[i].id+'" class="linkproducto"><div class="texto02" align="center"><strong>'+data.productos[i].nombre+'</strong></div></a>'+
				'					</div>'+
				'				</div>'+
				'			</div>'+
				'			<div class="row">'+
				'				<div class="col-lg-12">'+
				'					<div class="panel panel-default panel-prod-desc">'+
				'						<a href="'+baseurl+'web/producto/'+data.productos[i].id+'" class="linkproducto"><h6 align="justify">'+data.productos[i].descripcioncorta+'</h6></a>'+
				'					</div>'+
				'				</div>'+
				'			</div>'+
				'			<div class="row">'+
				'				<div class="col-lg-12">'+
				'					<div class="input-append">'+
				'						<div class="col-lg-3" align="left" id="existen">'+
				'							<h5><small>Disponibles:</small></h5>'+
				'						</div>'+
				'						<div class="col-lg-2" align="left">'+
				'							<h5><strong>'+data.productos[i].existencias+'</strong></h5>'+
				'						</div>'+
				'						<div class="col-lg-1" align="right">'+
				'							<h5><small>Precio:</small></h5>'+
				'						</div>'+
				'						<div class="col-lg-3" align="left">'+
				'							<div class="col-lg-4 texto02" ><h4><strong>$'+formato_numero(data.productos[i].precio)+'</strong></h4></div>'+
				'						</div>'+
				'					</div>'+
				'				</div>'+
				'			</div>'+
				'			<div class="row">'+
				'				<div class="col-lg-12" align="center">'+
				'					<div class="input-append">'+
				'						<button type="button" class="btn btn-xs btn-info" id="btn-verdetalle" data-id="'+data.productos[i].id+'">Mas Detalles</button>'+
				'					</div>'+
				'				</div>'+
				'			</div>'+
				'			<div>'+
				'				<input type="hidden" class="idprod"     data-id="'+data.productos[i].id+'"/>'+
				'				<input type="hidden" class="imagenprod" data-id="'+data.productos[i].imagen+'"/>'+
				'				<input type="hidden" class="nombreprod" data-id="'+data.productos[i].nombre+'"/>'+
				'				<input type="hidden" class="precioprod" data-id="'+data.productos[i].precio+'"/>'+
				'				<input type="hidden" class="descripcioncortaprod" data-id="'+data.productos[i].descripcioncorta+'"/>'+
				'			</div>'+
				'		</div>'+
				'	</div>'+
				'</div> ';
	}
	sarta = sarta + '</div>'
	$("#listaproductos").html(sarta); 
	
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
		if((i)==pag){
		  sartahtml+= 	'<li class="paginate_button active aria-controls="dataTables-example" tabindex="0">'+
						'	<span>'+(i)+'</span>'+
						'</li>';
		} else {
		  sartahtml+= 	'<li class="paginate_button aria-controls="dataTables-example" tabindex="0">'+
						'	<a data-pag="'+(i)+'" class="link-a-pagina" href="javascript:void(0)">'+(i)+'</a>'+
						'</li>';
		};
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

