<div class="container">
 
<!---------------------------------------------------------------PRODUCTO -->
<div class="row">
	<div class="col-lg-5" align="center">
<?php
$i = 0;
foreach ($producto->imagenes as $imagen) {
	$i = $i + 1;
	if ($i > 4) {break;}
	if ($i == 1) {
		print '
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default panel-prod-img-grande">
					<img class="img-responsive img-thumbnail img02" id="imggrande" src="'.$imagen->imagen.'"/>
				</div>
			</div>
		</div>  
		<div class="row">
			<div class="col-lg-3">
				<div class="panel panel-default panel-prod-img-pequena">
					<a href="javascript:void(0)"><img class="img-responsive img-thumbnail img03 imgsmall" data-id="'.$i.'" id="imgsmall'.$i.'" src="'.$imagen->imagen.'"/></a>
				</div>
			</div>';
	} else {	  
		print '  
			<div class="col-lg-3">
				<div class="panel panel-default panel-prod-img-pequena">
					<a href="javascript:void(0)"><img class="img-responsive img-thumbnail img03 imgsmall" data-id="'.$i.'" id="imgsmall'.$i.'" src="'.$imagen->imagen.'"/></a>
				</div>
			</div>';
	};
};
?>
		</div>   
	</div>
	<div class="col-lg-7">
		<div class="row">
			<div class="col-lg-12" align="left">
			  <h3><strong><?php print $producto->nombre;?></strong></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 textos05" align="left">
			  <h4><?php print $producto->descripcion;?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 textos06" align="left">
			  <h4>Ingredientes:</h4>
			</div>
			<div class="col-lg-10 textos05" align="left">
			  <h4><?php print $producto->ingredientes;?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 textos06" align="left">
			  <h4>Marca:</h4>
			</div>
			<div class="col-lg-10 textos05" align="left">
			  <h4><?php print $producto->marca;?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4" align="left">
				<div class="row">
					<div class="col-lg-6 textos06" align="left">
					  <h4><strong>Precio:</strong></h4>
					</div>
					<div class="col-lg-6" align="left">
					  <h4><strong>$<?php print number_format($producto->precio , 0, ",", ".");?></strong></h4>
					</div>
				</div>

				<form>
					<input type="hidden" id="idprod" value="<?php print $producto->id;?>"/>
					<input type="hidden" id="nombreprod" value="<?php print $producto->nombre;?>"/>
					<input type="hidden" id="precioprod" value="<?php print $producto->precio;?>"/>
					<div class="row">
						<div class="col-lg-6" align="left">
							<h4><strong><input type="number" id="cantidadprod" min="0" max="<?php print $producto->existencias;?>" ></strong></h4>
						</div>
						<div class="col-lg-6" align="left">
							<button type="button" class="btn btn-success" id="btn-agregarcarrito"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Carrito</button> 
						</div>  
					</div>
				</form>

				<div class="row">
					<div class="col-lg-12" align="left" id="existen">
					  <h4><strong><?php print $producto->existencias;?></strong> Disponibles</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12" align="right">
						<table class="table table-condensed table-striped table-bordered" id="tabla1">
						<caption class="textos06"><div  align="center"><h5>Medidas (cms)</h5></div></caption>
							<thead>
						  <tr class="textos05">
									<th>Alto</th>
									<th>Ancho</th>
									<th>Largo</th>
								</tr>
							</thead>	
							<tbody>
								<tr align="center">
									<td><?php print $producto->alto;?></td>
									<td><?php print $producto->ancho;?></td>
									<td><?php print $producto->largo;?></td>
								</tr>
							</tbody>
						</table> <!-- tabla--> 
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12" align="left">
						<table class="table table-condensed table-striped table-bordered"  id="tabla1">
						<caption class="textos06"><div align="center"><h5>Peso (grs)</h5></div></caption>
							<thead>
						  <tr class="textos05">
									<th>Bruto</th>
									<th>Neto</th>
								</tr>
							</thead>	
							<tbody>
								<tr align="center">
									<td><?php print $producto->peso;?></td>
									<td><?php print $producto->pesoneto;?></td>
								</tr>
							</tbody>
						</table> <!-- tabla--> 
					</div>
				</div>
			</div>
		</div>
	<div class="textos06" align="center"><h4>Características</h4></div>

<?php
print '<div class="row tabla1">';
$i = 0;
foreach ($caracteristicas as $caracteristica) {
	$i = $i + 1;
	if ($i == 1) {
		print '	<div class="col-lg-3">'.
			  '		<table class="table table-condensed table-striped table-bordered" id="table2">'.
			  '			<tbody>';
	}		  	
	if ($i == 5 || $i == 9 || $i == 13) {
		print '			</tbody>'.
				'		</table>'.
				'</div>'.
				'	<div class="col-lg-3">'.
				'		<table class="table table-condensed table-striped table-bordered" id="table2">'.
				'			<tbody>';
	}
	print '<tr>'.
			'<td>'.$caracteristica->nombre.'</td>';
	$entra = 0;
	foreach ($producto->caracteristicas as $procar) {
		if ($caracteristica->id == $procar->idcaracteristica) {
			$entra = 1;
			switch ($procar->tipo) {
				case "remove":
					print 	'<td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>';
					break;
				case "asterisk":
					print 	'<td><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></td>';
					break;
			}
		}
	}
	if ($entra == 0) {
		print 	'<td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>';
	}
}
print '			</tbody>'.
		'		</table>'.
		'	</div>'.
		'</div>';
?>

	</div>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default tipocar" id="tipocar">
			<div><h6><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Indica que el producto no contiene el alérgeno o trazas del mismo.</h6></div>
			<div><h6><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Indica que el alérgeno se añade directamente o indirectamente a través de otros ingredientes. Según lo declarado en la etiqueta del producto.</h6></div>
			<div><h6><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Indica que puede contener trazas del alérgeno por contaminación cruzada, según lo declarado en la etiqueta del producto. Esta información
					es correcta en el momento de la impresión, mayo de 2013.</h6></div>			
		</div>	
	</div>
</div>

</div>   

</div> <!-- /container -->

<!------------------------------------------------------------------------------------------------------------------------------------> 
<script type="text/javascript">

$(document).ready(function(){
	$('.container').on('click','#btn-agregarcarrito',function(event){
		cantidadprod = $('#cantidadprod').val();
		if(cantidadprod == 0) {return false;}
		idprod = $('#idprod').val();
		nombreprod = $('#nombreprod').val();
		precioprod = $('#precioprod').val();
		agregarcarrito(idprod, nombreprod, precioprod, cantidadprod, function(rta){})
	})

	$('.container').on('click','.imgsmall',function(event){
	  i = $(event.target).attr("data-id");
		switch(i) {
			case "1":
				urlimg = $('#imgsmall1').attr("src");
				break;
			case "2":
				urlimg = $('#imgsmall2').attr("src");
				break;
			case "3":
				urlimg = $('#imgsmall3').attr("src");
				break;
			case "4":
				urlimg = $('#imgsmall4').attr("src");
				break;
		}
		$('#imggrande').attr("src", urlimg);
	});
})

//----------------------------------------------------------------------------------funcion agregar a carrito
function agregarcarrito (idprod, nombreprod, precioprod, cantidadprod, callback) {
	$.ajax({                                           
	  url: "<?php print base_url();?>producto/agregarCarrito",
	  context: document.body,
	  dataType: "json",
	  type: "POST",
	  data: {idprod : idprod, nombreprod : nombreprod, precioprod : precioprod, cantidadprod : cantidadprod }})
	 .done(function(data) {                               
	  if(data.res == "ok") {$("#cantcart").text(data.cantcart);callback(true)}
	  else {alert(data.msj);callback(false)}})
	 .error(function(){alert('No hay conexion');callback(false);})
}


</script>
