<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-5"><h2>Pedidos en estado <?php print $this->uri->segment(3);?></h2></div>
</div>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<table class="table table-condensed table-striped">
			<thead>
			<tr role="row">
			  <th>Fecha y Hora</th>
			  <th>Ciudad</th>
			  <th>correo</th>
			</tr>
			</thead>
			<tbody>
<?php 	
if (isset($pedidos)) {
	foreach ($pedidos as $pedido) {
		print '<tr role="row">';
		print '<td>'.$pedido->fecha.'</td>';
		print '<td>'.$pedido->ciudad.'</td>';
		print '<td>'.$pedido->correo.'</td>';
		print '</tr>';
	};
}
?>
			</tbody>
		</table> 
	</div>
</div>
<div class="row">
	<div class="col-md-12 center-text">
	<?php print $this->pagination->create_links();?>
	</div>
</div>


<script type="text/javascript">

</script>