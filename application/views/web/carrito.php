<div class="container">

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading text-center"><h2>Carrito de Compras</h2></div>
			<table class="table table-condensed table-striped">
				<thead>
				<tr role="row">
					<th width="60%">Nombre del producto</th>
					<th width="10%">Precio</th>
					<th width="5%">Cantidad</th>
					<th width="5%">Subtotal</th>
				</tr role="row">
				</thead>
				<tbody>

					<form action="actualizarCarrito" method="POST">
<?php
						foreach ($this->cart->contents() as $item) {
							print '<input type="hidden" name="rowid[]" value="'.$item['rowid'].'">';

							print '<tr>';
							print '	<td><h5>'.$item['name'].'</h5></td>';
							print '	<td>'.number_format($item['price'],0,',','.').'</td>';
//							print '	<td>'.$item['qty'].'</td>';
							print '	<td><h5><input type="number" name="qty[]" value="'.$item['qty'].'"></h5></td>';
							print '	<td class="text-right"><h5>'.number_format($item['subtotal'],0,',','.').'</h5></td>';
							print '</tr>';
						}
							print '<tr>';
							print '	<td colspan="2">';
							print '		<input type="submit" class="btn btn-xs btn-success" name="actualizar" value="Actualizar Carrito">';
							print '		<input type="submit" class="btn btn-xs btn-warning" name="vaciar" value="Vaciar Carrito">';
							print '		<input type="submit" class="btn btn-xs btn-primary" name="comprar" value="Comprar">';
							print '	</td>';
							print '	<td class="text-right"><h5>Total:</h5></td>';
							print '	<td class="text-right"><h5><strong>'.number_format($this->cart->total(),0,',','.').'</strong></h5></td>';
							print '</tr>';
?>
					</form>
				</tbody>
			</table>
		</div> <!-- Panel-->
	</div>
</div>

</div>
