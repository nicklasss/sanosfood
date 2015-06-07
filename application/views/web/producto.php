<!---------------------------------------------------------------PRODUCTO -->
<div class="row baner06">';
	<div class="col-lg-5" align="center">
	  <div class="row">
	     <div class="col-lg-12">
	        <img class="img-responsive img02" src="http://i.bellahermosa.com/wp-content/uploads/2011/11/comida-no-saludable.jpg"/>
	     </div>
	  </div>     
	  <div class="row">
	     <div class="col-lg-3">
	        <img class="img-responsive img03" src="http://i.bellahermosa.com/wp-content/uploads/2011/11/comida-no-saludable.jpg"/>
	     </div>
	     <div class="col-lg-3">
	        <img class="img-responsive img03" src="http://i.bellahermosa.com/wp-content/uploads/2011/11/comida-no-saludable.jpg"/>
	     </div>
	     <div class="col-lg-3">
	        <img class="img-responsive img03" src="http://i.bellahermosa.com/wp-content/uploads/2011/11/comida-no-saludable.jpg"/>
	     </div>
	     <div class="col-lg-3">
	        <img class="img-responsive img03" src="http://i.bellahermosa.com/wp-content/uploads/2011/11/comida-no-saludable.jpg"/>
	     </div>
	  </div>     
   </div>
	<div class="col-lg-7">
		<div class="row">
		   <div class="col-lg-12" align="left">
		      <h3><strong><?php print $producto->nombre;?></strong></h3>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12 textos05" align="left">
		      <h4><?php print $producto->descripcion;?></h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-2 textos06" align="left">
		      <h4><strong>Ingredientes:</strong></h4>
		   </div>
		   <div class="col-lg-10 textos05" align="left">
		      <h4><?php print $producto->ingredientes;?></h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12" align="left">
		      <h3>$<?php print number_format($producto->precio , 0, ",", ".");?></h3>    
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12" align="left">
		      <h4><strong>input de cantidad pedida</strong></h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12" align="left">
		      <h4><strong><?php print $producto->existencias;?> Disponibles</strong></h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-10 textos05" align="left">
		      <h4><strong>Medidas:</strong> Alto: <strong><?php print $producto->alto;?> cms,  </strong>Ancho: <strong><?php print $producto->ancho;?> cms, </strong>Largo: <strong><?php print $producto->largo;?> cms</strong></h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-10 textos05" align="left">
		      <h4>Peso Total: <strong><?php print $producto->peso;?> gms,  </strong>Peso Neto: <strong><?php print $producto->pesoneto;?> gms</h4>
		   </div>
	   </div>
		<div class="row">
		   <div class="col-lg-12" align="left">
	         <button type="button" class="btn btn-lg btn-success" id="btn-vermas'.$producto->id.'">Comprar</button>
		   </div>
	   </div>
	</div>
</div>   
