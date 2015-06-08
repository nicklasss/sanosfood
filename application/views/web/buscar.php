
<!---------------------------------------------------------------PRODUCTOS -->
<!--<div class="row" style="background: #cccccc;">   -->
<div class="row">
   <div class="col-lg-4">
        <div class="panel panel-default">
			<div class="panel-heading text-center"><h5>CATEGORIAS</h5></div>
			<table class="table table-condensed table-striped">
				<tbody>


<?php 
foreach ($categorias as $categoria) {
	print '
				<tr>
					<td>
     					<label  class= "checkbox"><input  type= "checkbox" data-valor="0"></label> 
					</td>
				<th scope="row">'.$categoria->nombre.'</th>
				</tr>';
}
?>

				</tbody>
			</table> <!-- tabla--> 
		</div> <!-- Panel-->
	</div>




   </div>




<?php
$i = 0;
foreach ($productos as $producto) {
   $i = $i + 1;
   if ($i == 1 || ($i % 4) == 0) {
      if (($i % 4) == 0) {
         print '</div>';
      }
      print '<div class="row">';
   } 
  print '<div class="col-lg-3" align="center">
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
                        <button type="button" class="btn-verdetalle btn-xs btn-success" data-id="'.$producto->id.'">Ver Detalles</button>
                     </div>
                  </div>
               </div>
            </div>
         </div> ';
}
?>
</div>  


</div> <!-- /container -->

<!---------------------------------------------------------------BANER 4 -->
<div class="row baner04">
   <div class="container">
      <div class="col-lg-8 col-lg-offset-2 text-center">
         <div class="textos01">
            <h1><strong>LOREM IPSUM</strong></h1>
            <h2>dolor sit awet, consectetur adipising elit,</h2>
            <h2>sed do eiuswod tempor incididuut ut.</h2>
         </div>
      </div> 
   </div> <!-- /container -->
</div> 

<div class="container">

<!------------------------------------------------------------------------------------------------------------------------------------> 
<script type="text/javascript">
    $(document).ready(function(){

   $('*').on('click','.btn-verdetalle',function(event){
      alert ("entra por aqui");
      id = $(event.target).attr("data-id");
      window.location="<?php print base_url();?>web/producto/"+id+")";
   });
})
</script>
