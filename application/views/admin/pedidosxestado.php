<div class="row">
	<div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h2>Pedidos en estado <mark><?php print $this->uri->segment(3);?></mark></h2></div>
			<table class="table table-condensed table-striped" id="tabla-car">
				<thead>
				<tr role="row">
				  <th>Fecha y Hora</th>
				  <th>Ciudad</th>
				  <th>correo</th>
				</tr role="row">
				</thead>
				<tbody>
<?php 	
if (isset($pedidos)) {
	foreach ($pedidos as $pedido) {
		print '<tr role="row">';
		print '<td width="30%">'.$pedido->fecha.'</td>';
		print '<td width="20%">'.$pedido->ciudad.'</td>';
		print '<td width="50%">'.$pedido->correo.'</td>';
		print '</tr>';
	};
}
?>
				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>
</div>

<div class="row">
	<div class="col-md-12 center-text">
		<?php print $this->pagination->create_links();?>
	</div>
</div>


<script type="text/javascript">

</script>