<div class="row">
	<div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h2> 
<?php 			if ($this->uri->segment(3)=="todos") {print "Todos los Pedidos";}
				else {print "Pedidos en estado <mark>".$this->uri->segment(3)."</mark>";}
?>				</h2></div>
			<table class="table table-condensed table-striped" id="tabla-car">
				<thead>
				<tr role="row">
				  <th>Id</th>
				  <th>Estado</th>
				  <th>Fecha y Hora</th>
				  <th>Ciudad</th>
				  <th>Usuario</th>
				</tr role="row">
				</thead>
				<tbody>
<?php 	
if (isset($pedidos)) {
	foreach ($pedidos as $pedido) {
		print '<tr role="row">';
        print '<td width="10%"><a href="../../pedido/'.$pedido->id.'">'.$pedido->id.'</a></td>';  
        print '<td width="15%"><a href="../../pedido/'.$pedido->id.'">'.$pedido->estado.'</a></td>';  
        print '<td width="25%"><a href="../../pedido/'.$pedido->id.'">'.$pedido->fecha.'</a></td>';  
        print '<td width="15%"><a href="../../pedido/'.$pedido->id.'">'.$pedido->ciudad.'</a></td>';  
        print '<td width="35%"><a href="../../pedido/'.$pedido->id.'">'.$pedido->correo.'</a></td>';  
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