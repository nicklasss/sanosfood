

<!---------------------------------------------------------------PRODUCTOS -->
<!--<div class="row" style="background: #cccccc;">   -->
<div class="container">

<div class="row">
	<div class="col-lg-12">
		<table class="table table-condensed table-striped table-bordered registro" id="procar">
		   <caption class="textos06"><div align="center"><h4><strong>CARACTERÍSTICAS DE NUESTROS PRODUCTOS</strong></h4></div></caption>
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
</div>

</div> <!-- container--> 

