<!---------------------------------------------------------------PRODUCTO -->
<div class="row baner03" style="background: #cccccc;">';
	<div class="col-lg-4" align="center">
	  <div class="row">
	     <div class="col-lg-12">
	        <img class="img-responsive img01" src="'.$producto->imagen.'"/>
	     </div>
	  </div>     
   </div>
	<div class="col-lg-8">
		<div class="row">
		   <div class="col-lg-12" align="left">
		      <h3><strong><?php print $producto->nombre;?></strong></h3>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12" align="left">
		      <h4><strong><?php print $producto->descripcion;?></strong></h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12" align="left">
		      <h4><strong><?php print $producto->ingredientes;?></strong></h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12" align="left">
		      <h4><strong><?php print $producto->precio;?></strong></h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12" align="left">
		      <h4><strong>input de cantidad pedida</strong></h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12" align="left">
		      <h4><strong>Disponible</strong></h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12" align="left">
		      <h4><strong>Medidas</strong></h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12" align="left">
		      <h4><strong>Peso</strong></h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12" align="left">
	         <button type="button" class="btn btn-lg btn-success" id="btn-vermas'.$producto->id.'">Comprar</button>
		   </div>
	   </div>




   </div>
</div>   
