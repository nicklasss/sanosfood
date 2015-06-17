<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if( @$this->session->userdata( 'usuario' ) =="" ){ redirect('admin/login'); }

?><!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Fixed Top Navbar Example for Bootstrap</title>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
 <![endif]-->
 <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
 <link rel="stylesheet" href="<?php print base_url();?>css/admin.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php print base_url().'admin/productos/Todos';?>">SanosFoods</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php print base_url().'admin/productos/Todos';?>">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <?php
                foreach ($estadosproductos as $estadosprod) { ?>
                  <li><a href="<?php print base_url().'admin/productos/'.$estadosprod->id;?>"><?php print $estadosprod->nombre; ?></a></li>
                
                  <?php
                }
                ?>
                <li class="divider"></li>
                <li><a href="<?php print base_url().'admin/productos/Todos';?>">Todos</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Administradores</a></li>
                <li><a href="<?php print base_url().'admin/buscarusuarios'?>">Usuarios</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pedidos <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <?php
                foreach ($estadospedidos as $estados) { ?>
                  <li><a href="<?php print base_url().'admin/pedidos/'.$estados->id;?>"><?php print $estados->nombre; ?></a></li>
                
                  <?php
                }
                ?>
                <li class="divider"></li>
                <li><a href="<?php print base_url().'admin/pedidos/Todos';?>">Todos</a></li>
              </ul>
            </li>
            <li><a href="<?php print base_url(); ?>admin/caracteristicas">Características</a></li>
            <li><a href="<?php print base_url(); ?>admin/categorias">Categorías</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Estados <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php print base_url().'admin/estadospedidos';?>">Pedidos</a></li>
                <li><a href="<?php print base_url().'admin/estadosproductos';?>">Productos</a></li>
              </ul>
            </li>
            <li><a href="<?php print base_url(); ?>admin/marcas">Marcas</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">