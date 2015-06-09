<div class="container">

<!---------------------------------------------------------------PRODUCTOS -->
<!--<div class="row" style="background: #cccccc;">   -->
<div class="row">
   <div class="col-lg-2">
      <div class="row">
	      <div class="panel panel-default">
				<div class="panel-heading text-center"><h5><strong>CATEGORIAS</strong></h5></div>
				<table class="table table-condensed table-striped">
					<tbody>
					<?php 
					foreach ($categorias as $categoria) {
						print '
						<tr>
							<td><input  type= "checkbox" data-valor="0"></td>
							<td>'.$categoria->nombre.'</td>
						</tr>';
					}
					?>
					</tbody>
				</table> <!-- tabla--> 
			</div> <!-- Panel-->
		</div>
      <div class="row">
	      <div class="panel panel-default">
				<div class="panel-heading text-center"><h5><strong>MARCAS</strong></h5></div>
				<table class="table table-condensed table-striped">
					<tbody>
					<?php 
					foreach ($marcas as $marca) {
						print '
						<tr>
							<td><input  type= "checkbox" data-valor="0"></td>
							<td>'.$marca->nombre.'</td>
						</tr>';
					}
					?>
					</tbody>
				</table> <!-- tabla--> 
			</div> <!-- Panel-->
		</div>
	</div>
   <div class="col-lg-10">
   	<div class="row">


<?php
$i = 0;
foreach ($productos as $producto) {
   $i = $i + 1;
   if ($i == 1 || ($i % 4) == 0) {
      if (($i % 4) == 0) {
         print '
         </div>';
      }
	      print '
	      <div class="row">';
   } 
			print '
  			<div class="col-lg-4" align="center">
            <div class="row">
               <div class="col-lg-9 col-lg-offset-2">
                  <div class="row">
                     <div class="col-lg-12">
                        <img class="img-responsive img01" src="'.$producto->imagen.'"/>
                     </div>
                  </div>     
                  <div class="row">
                     <div class="col-lg-10">
                        <div class="row">
                           <div class="col-lg-8 texto02" align="left"><h6><strong>'.$producto->nombre.'</strong></h6></div>
                           <div class="col-lg-4 texto02" align="right"><h4><strong>$'.number_format($producto->precio , 0, ",", ".").'</strong></h4></div>
                        </div>
                     </div>   
                  </div>
                  <div class="row">
                     <div class="col-lg-12 texto02" align="left">
                        <h6>'.$producto->descripcioncorta.'</h6>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12 text-right">
                        <button type="button" class="btn btn-verdetalle btn-xs btn-success" data-id="'.$producto->id.'">Ver Detalles</button>
                     </div>
                  </div>
               </div>
            </div>
         </div> ';
}
?>
		</div>
	</div>  
</div>
</div> <!-- /container -->

<!------------------------------------------------------------------------------------------------------------------------------------> 
<script type="text/javascript">
    $(document).ready(function(){

   $('*').on('click','.btn-verdetalle',function(event){
      id = $(event.target).attr("data-id");
      window.location="<?php print base_url();?>web/producto/"+id;
   });
})
</script>
