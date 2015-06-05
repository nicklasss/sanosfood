
</div> <!-- /container -->

<!---------------------------------------------------------------IMAGEN SUPERIOR -->
<div class="row baner01">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-lg-offset-1">
            <div class="textos01">
               <h3><strong>LOREM IPSUM</strong></h3>
               <h1><strong>DOLOR SIT AMET</strong></h1>
               <h4>LOREM IPSUM</h4>
               <h5>CONSECTETUR ADIPISICING ELIT, SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE.</h5>
               <div class="row boton01">
                  <div class="col-lg-5">
                     <button type="button" class="btn btn-md btn-success" id="btn-guardar">Ver Detales</button>
                  </div>
               </div>           
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-1 col-lg-offset-9 text-right">
            <div class="boton01">
               <div class="row">
                  <div class="col-lg-6 text-right">
                     <a href="#"><span class="badge"> <</span></a>
                  </div>
                  <div class="col-lg-6 text-left">
                     <a href="#"><span class="badge"> ></span></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> <!-- /container -->
</div> 

<!---------------------------------------------------------------BANNER DE PLATOS -->
<div class="container">

<div class="row baner02">
   <div class="col-lg-4" align="center">
       <img class="plato01" src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQs0zs9HD7B6cF9l_o2zSM8goQ-Q7VnFWnHNRbYozeA_Nw9gFfHow"/>
   </div> 
   <div class="col-lg-4"  align="center">
       <img class="plato01" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSYjZO4E3jO0jUfwNcB8L_TxEZyGX3HOj_zdr4UMPaJxMcR17-zcg"/>
   </div> 
   <div class="col-lg-4" align="center">
       <img class="plato01" src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTzDwFGbTG2gEkCh0gn7xa4SBqXwitKCWq7GPWcvnyyKH7L5iWk"/>
   </div> 
</div> 

<!---------------------------------------------------------------PRODUCTOS -->
<div class="row" style="background: #cccccc;">
   <div class="col-lg-12 text-center">
      <h4><strong>PRODUCTOS DESTACADOS</strong></h4>
   </div>
</div>


<?php
$i = 0;
foreach ($productos as $producto) {
   $i = $i + 1;
   if ($i == 1 || $i == 5) {
      if ($i == 5) {
         print '</div>';
      }
      print '<div class="row baner03" style="background: #cccccc;">';
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
                           <div class="col-lg-8 texto02" align="left"><h5><strong>'.$producto->nombre.'</strong></h5></div>
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
                        <button type="button" class="btn btn-xs btn-success" id="btn-vermas'.$producto->id.'">Ver Detales</button>
                     </div>
                  </div>
               </div>
            </div>
         </div> ';
}
?>


<!--






<div class="row baner03" style="background: #cccccc;">
   <div class="col-lg-3">
      <div class="row">
         <div class="col-lg-9 col-lg-offset-3">
            <div class="row">
               <div class="col-lg-12">
                  <img class="img-responsive img01" src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSvJ7qUhQWipGR5B-Q0KxTNkD-825SRmcyzQGKr0qmB4NO8Fp1mow"/>
               </div>
            </div>     
            <div class="row">
               <div class="col-lg-10">
                  <div class="row">
                     <div class="col-lg-8 texto02"><h6><strong>LOREM IPSUM</strong></h6></div>
                     <div class="col-lg-4 texto02"><h4><strong>$35.000</strong></h4></div>
                  </div>
               </div>   
            </div>
            <div class="row">
               <div class="col-lg-12 texto02">
                  <h6>Loren ipsum dolor sit amet, consecte tur adipiscing elit, sed do elusmod tempor.</h6>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12 text-right">
                  <button type="button" class="btn btn-xs btn-success" id="btn-guardar">Ver Detales</button>
               </div>
            </div>
         </div>
      </div>
   </div> 
 
   <div class="col-lg-3">
      <div class="row">
         <div class="col-lg-9 col-lg-offset-2">
            <div class="row">
               <div class="col-lg-12">
                  <img class="img-responsive img01" src="http://cmsa-img.seccionamarilla.com/Media/Articulos/Imagenes/468_Web_piel-brillante.gif"/>
               </div>
            </div>     
            <div class="row">
               <div class="col-lg-10">
                  <div class="row">
                     <div class="col-lg-8 texto02"><h6><strong>LOREM IPSUM</strong></h6></div>
                     <div class="col-lg-4 texto02"><h4>$35.000</h4></div>
                  </div>
               </div>   
            </div>
            <div class="row">
               <div class="col-lg-12 texto02">
                  <h6>Loren ipsum dolor sit amet, consecte tur adipiscing elit, sed do elusmod tempor.</h6>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12 text-right">
                  <button type="button" class="btn btn-xs btn-success" id="btn-guardar">Ver Detales</button>
               </div>
            </div>
         </div>
      </div>
   </div> 

   <div class="col-lg-3">
      <div class="row">
         <div class="col-lg-9 col-lg-offset-1">
            <div class="row">
               <div class="col-lg-12">
                  <img class="img-responsive img01" src="https://alimentossaludablesynosaludables.files.wordpress.com/2013/04/aditivos.jpg"/>
               </div>
            </div>     
            <div class="row">
               <div class="col-lg-10">
                  <div class="row">
                     <div class="col-lg-8 texto02"><h6><strong>LOREM IPSUM</strong></h6></div>
                     <div class="col-lg-4 texto02"><h4>$35.000</h4></div>
                  </div>
               </div>   
            </div>
            <div class="row">
               <div class="col-lg-12 texto02">
                  <h6>Loren ipsum dolor sit amet, consecte tur adipiscing elit, sed do elusmod tempor.</h6>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12 text-right">
                  <button type="button" class="btn btn-xs btn-success" id="btn-guardar">Ver Detales</button>
               </div>
            </div>
         </div>
      </div>
   </div> 

   <div class="col-lg-3">
      <div class="row">
         <div class="col-lg-9">
            <div class="row">
               <div class="col-lg-12">
                  <img class="img-responsive img01" src="http://azu1.facilisimo.com/ima/i/3/4/5c/am_79218_2123806_383473.jpg"/>
               </div>
            </div>     
            <div class="row">
               <div class="col-lg-10">
                  <div class="row">
                     <div class="col-lg-8 texto02"><h6><strong>LOREM IPSUM</strong></h6></div>
                     <div class="col-lg-4 texto02"><h4>$35.000</h4></div>
                  </div>
               </div>   
            </div>
            <div class="row">
               <div class="col-lg-12 texto02">
                  <h6>Loren ipsum dolor sit amet, consecte tur adipiscing elit, sed do elusmod tempor.</h6>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12 text-right">
                  <button type="button" class="btn btn-xs btn-success" id="btn-guardar">Ver Detales</button>
               </div>
            </div>
         </div>
      </div>
   </div> 
</div> 


<div class="row baner03" style="background: #cccccc;">
   <div class="col-lg-3">
      <div class="row">
         <div class="col-lg-9 col-lg-offset-3">
            <div class="row">
               <div class="col-lg-12">
                  <img class="img-responsive img01" src="http://g.cdn.ecn.cl/nutricion/files/2014/02/alimentos-no-saludables.jpg"/>
               </div>
            </div>     
            <div class="row">
               <div class="col-lg-10">
                  <div class="row">
                     <div class="col-lg-8 texto02"><h6><strong>LOREM IPSUM</strong></h6></div>
                     <div class="col-lg-4 texto02"><h4>$35.000</h4></div>
                  </div>
               </div>   
            </div>
            <div class="row">
               <div class="col-lg-12 texto02">
                  <h6>Loren ipsum dolor sit amet, consecte tur adipiscing elit, sed do elusmod tempor.</h6>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12 text-right">
                  <button type="button" class="btn btn-xs btn-success" id="btn-guardar">Ver Detales</button>
               </div>
            </div>
         </div>
      </div>
   </div> 
 
   <div class="col-lg-3">
      <div class="row">
         <div class="col-lg-9 col-lg-offset-2">
            <div class="row">
               <div class="col-lg-12">
                  <img class="img-responsive img01" src="http://www.vitadelia.com/images/2008/03/legumbres.gif"/>
               </div>
            </div>     
            <div class="row">
               <div class="col-lg-10">
                  <div class="row">
                     <div class="col-lg-8 texto02"><h6><strong>LOREM IPSUM</strong></h6></div>
                     <div class="col-lg-4 texto02"><h4>$35.000</h4></div>
                  </div>
               </div>   
            </div>
            <div class="row">
               <div class="col-lg-12 texto02">
                  <h6>Loren ipsum dolor sit amet, consecte tur adipiscing elit, sed do elusmod tempor.</h6>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12 text-right">
                  <button type="button" class="btn btn-xs btn-success" id="btn-guardar">Ver Detales</button>
               </div>
            </div>
         </div>
      </div>
   </div> 

   <div class="col-lg-3">
      <div class="row">
         <div class="col-lg-9 col-lg-offset-1">
            <div class="row">
               <div class="col-lg-12">
                  <img class="img-responsive img01" src="http://www.cosasdesalud.es/images/pasta1.jpg"/>
               </div>
            </div>     
            <div class="row">
               <div class="col-lg-10">
                  <div class="row">
                     <div class="col-lg-8 texto02"><h6><strong>LOREM IPSUM</strong></h6></div>
                     <div class="col-lg-4 texto02"><h4>$35.000</h4></div>
                  </div>
               </div>   
            </div>
            <div class="row">
               <div class="col-lg-12 texto02">
                  <h6>Loren ipsum dolor sit amet, consecte tur adipiscing elit, sed do elusmod tempor.</h6>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12 text-right">
                  <button type="button" class="btn btn-xs btn-success">Ver Detales</button>
               </div>
            </div>
         </div>
      </div>
   </div> 

   <div class="col-lg-3">
      <div class="row">
         <div class="col-lg-9">
            <div class="row">
               <div class="col-lg-12">
                  <img class="img-responsive img01" src="http://www.puntofape.com/wp-content/uploads/2012/10/Reglas-de-una-alimentaci%C3%B3n-saludable.jpg"/>
               </div>
            </div>     
            <div class="row">
               <div class="col-lg-10">
                  <div class="row">
                     <div class="col-lg-8 texto02"><h6><strong>LOREM IPSUM</strong></h6></div>
                     <div class="col-lg-4 texto02"><h4>$35.000</h4></div>
                  </div>
               </div>   
            </div>
            <div class="row">
               <div class="col-lg-12 texto02">
                  <h6>Loren ipsum dolor sit amet, consecte tur adipiscing elit, sed do elusmod tempor.</h6>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12 text-right">
                  <button type="button" class="btn btn-xs btn-success">Ver Detales</button>
               </div>
            </div>
         </div>
      </div>
   </div> --> 
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

