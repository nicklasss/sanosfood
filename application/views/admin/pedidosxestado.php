<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-5"><h2>Pedidos en estado <?php print $this->uri->segment(3);?></h2></div>
</div>

<?php print $this->uri->segment(3);?>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 panel panel-default panel-usuarios">
		<table class="table table-condensed table-striped">
			<thead>
			<tr role="row">
			  <th>Producto</th>
			  <th>Estado</th>
			</tr>
			</thead>
			<tbody>
<?php 	
if (isset($pedidos)) {
	foreach ($pedidos as $pedido) {
		print '<tr role="row">';
		print '<td><a href="../pedido/'.$pedido->id.'">'.$pedido->fecha.'</a></td>';
		print '<td>'.$pedido->estado.'</td>';
		print '</tr>';
	};
}
?>
			</tbody>
		</table> 
	</div>
</div>


<script type="text/javascript">

</script>