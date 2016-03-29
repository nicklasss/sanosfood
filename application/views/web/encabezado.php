<!DOCTYPE html>
<!--[if lt IE 7]> 
<html class="no-js ie6 oldie" lang="es_co" version="HTML+RDFa 1.1" xmlns:fb="http://www.facebook.com/2008/fbml"> <![endif]-->
<!--[if IE 7]>    
<html class="no-js ie7 oldie" lang="es_co" version="HTML+RDFa 1.1" xmlns:fb="http://www.facebook.com/2008/fbml"> <![endif]-->
<!--[if IE 8]>    
<html class="no-js ie8 oldie" lang="es_co" version="HTML+RDFa 1.1" xmlns:fb="http://www.facebook.com/2008/fbml"> <![endif]-->
<!--[if IE 9]>    
<html class="no-js ie9" lang="es_co" version="HTML+RDFa 1.1" xmlns:fb="http://www.facebook.com/2008/fbml"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="es_co" version="HTML+RDFa 1.1" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/">
<!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,700,800' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="robots" content="INDEX,FOLLOW" />
	<link rel="canonical" href="http://www.1doc3.com/" />
	<link rel="alternate" href="http://www.1doc3.com/" hreflang="es-co" />
	<link rel="icon" href="" type="image/x-icon" />
	<link rel="shortcut icon" href="">

	<a href="https://plus.google.com/g+" rel="publisher"></a>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="sanosfoods">
	<meta property="og:url" content="<?php print base_url();?>" />
	<meta property="og:type" content="website"/>
	<meta property="og:image" content=""/>
	<meta property="og:title" content=""/>
	<meta property="og:site_name" content="Sanosfoods"/>
	<meta property="og:description" content="" />
	<meta property="fb:app_id" content="" />
	<meta property="twitter:account_id" content="" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="Sanosfoods">
	<meta name="twitter:description" content="">
	<meta name="twitter:url" content="http://www.sanosfoods.com/">
	<meta name="twitter:site" content="">
	<meta name="twitter:image" content="">
	<meta name="twitter:domain" content="www.sanosfoods.com">
	<link rel="stylesheet" href="<?php print base_url();?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php print base_url();?>css/main.css">
	<script type="text/javascript" src="<?php print base_url();?>js/modernizr.js"></script>
	<script src="//code.jquery.com/jquery-2.0.2.min.js"></script>  
	<script type="text/javascript" src="<?php print base_url();?>js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrap">
	<div class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-excollapse">
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <div class="navbar-brand logo-menu">
	            	<a href="<?= base_url();?>"><img src="http://sanosfoods.com/images/20.jpg" height="35px"/></a>
	            </div>
	        </div>
	        <div class="collapse navbar-collapse">
	        	<ul class="nav navbar-nav navbar-right">
					<?php
					if ($this->session->userdata("usuario") <> "") {
						print '
			            <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><strong><span class="glyphicon glyphicon-user"></span> '.$this->session->userdata("usuario").'</strong></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="'.base_url().'web/micuenta">Mi Información</a></li>
								<li><a href="'.base_url().'web/mispedidos">Mis Pedidos</a></li>
								<li><a href="'.base_url().'web/cambiarclave">Cambiar la Contraseña</a></li>
							</ul>
			            </li>';
						print '<li><a href="'.base_url().'web/logout"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>';}
					else {
						print '<li><a href="'.base_url().'web/Registrarse"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>';
						print '<li><a href="'.base_url().'web/login"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>';}
					?>

            		<li class="text-center">
						<?php
						if ($this->cart->total_items() > 0) {
		        			print '<a href="'.base_url().'web/mostrarCarrito" id="hrefcarrito">';
							print '	<button type="button" class="btn btn-sm btn-warning" id="btn-carrito" aria-label="Left Align">';
						} else {
		        			print '<a href="#" id="hrefcarrito">';
							print '	<button type="button" class="btn btn-sm btn-default" id="btn-carrito" aria-label="Left Align">';
						}
						?>
						<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span id="cantcart"> <?= $this->cart->total_items();?></span> 
							</button>
							</a>
	        		</li>

				</ul>
				<form id="form-buscar" class="navbar-form" method="POST" action="<?= base_url();?>web/productos">
					<div class="form-group" style="display:inline;">
						<div class="input-group" style="display:table;">
							<input class="form-control" name="quebuscar" placeholder="Buscar aqui" autocomplete="off" autofocus="autofocus" type="text">
							<span id="btn-buscar-barra" class="input-group-addon success" style="width:1%;"><span class="glyphicon glyphicon-search"></span></span>
						</div>
					</div>
				</form>
			</div>
	    </div>
	</div>
    <div class="navbar navbar-inverse navbar-static-top hidden-xs navbar-cats">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-nav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse main-nav">
                <ul class="nav navbar-nav">
                    <li><a href="<?= base_url();?>web/productos">Productos</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="<?= base_url();?>web/productoscaracteristicas">Características</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#contact">it3d</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#contact">it4d</a></li>
                    <li class="divider-vertical"></li>

                </ul>
            </div>
        </div>
    </div>
</div><!-- final navbar -->
 