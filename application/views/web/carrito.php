<div class="container">

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="row text-center"><h2>Carrito de Compras</h2></div>
		<div class="panel panel-default">
			<table class="table table-condensed table-striped">
				<thead>
				<tr role="row">
					<th width="15%"></th>
					<th width="50%">Producto</th>
<!--					<th width="10%">Precio</th>  -->
					<th width="10%">Cantidad</th>
					<th width="10%">Subtotal</th>
				</tr role="row">
				</thead>
				<tbody>
					<form action="actualizarCarrito" method="POST">
<?php
						foreach ($this->cart->contents() as $item) {
							print '<input type="hidden" name="rowid[]" value="'.$item['rowid'].'">';

							print '<tr>';
							print ' <td><img class="img-responsive img-pequena" src="'.$item['imagen'].'"/></td>';
							print '	<td><h5 class="nombre"><strong>'.$item['name'].'</strong></h5>';
							print '	<h6><small>'.$item['descripcioncorta'].'</small></h6></td>';
//							print '	<td>'.number_format($item['price'],0,',','.').'</td>';
							print '	<td><h5><input type="number" class="form-control" name="qty[]" value="'.$item['qty'].'"></h5></td>';
							print '	<td class="text-right"><h5><strong>'.number_format($item['subtotal'],0,',','.').'</strong></h5></td>';
							print '</tr>';
						}
						print '<tr>';
						print '	<td colspan="2">';
						print '		<input type="submit" class="btn btn-xs btn-primary" name="actualizar" value="Actualizar Carrito">';
						print '		<input type="submit" class="btn btn-xs btn-warning" name="vaciar" value="Vaciar Carrito">';
						print '		<input type="submit" class="btn btn-xs btn-success" name="comprar" value="Comprar">';
						print '	</td>';
//						print '	<td></td>';
						print '	<td class="text-right"><h5>Total:</h5></td>';
						print '	<td class="text-right"><h4><strong>'.number_format($this->cart->total(),0,',','.').'</strong></h4></td>';
						print '</tr>';
?>
					</form>
				</tbody>
			</table>
		</div> <!-- Panel-->
	</div>
</div>

</div>
