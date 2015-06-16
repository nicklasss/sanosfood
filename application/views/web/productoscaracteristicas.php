

<!---------------------------------------------------------------PRODUCTOS -->
<!--<div class="row" style="background: #cccccc;">   -->
<div class="container">

<div class="row baner08">
	<div class="col-lg-12">
		<table class="table table-condensed table-striped table-bordered registro" id="procar">
		   <caption class="textos06"><div align="center"><h3><strong>CARACTERÍSTICAS DE NUESTROS PRODUCTOS</strong></h3></div></caption>
			<thead>
	            <tr class="textos05">
	            	<th>Nombre del producto</th>
<?php
foreach ($caracteristicas as $caracteristica) {
	print '<th>'.$caracteristica->nombre.'</th>';
}
?>
				</tr>
			</thead>	
			<tbody>
<?php
foreach ($productos as $producto) {
	print 
				'<tr>'.
				'	<td class="textos05">'.$producto->nombre.'</td>';
	foreach ($caracteristicas as $caracteristica) {
		$i = 0;
		foreach ($pro_car as $procar) {
			if($procar->idproducto == $producto->id && $procar->idcaracteristica == $caracteristica->id) {
				if ($procar->tipo == "remove") {
					print '<td class="simbolo"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>';
					$i = 1;
				}
				if ($procar->tipo == "asterisk") {
					print '<td class="simbolo"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></td>';
					$i = 1;
				}
			}
		}
		if ($i == 0) {
			print '<td class="simbolo"><span class="glyphicon glyphicon-ok"></span></td>';
		}
	}
}
?>
				</tr>
			</tbody>
		</table> <!-- tabla--> 
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


</div> <!-- container--> 

