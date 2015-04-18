 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuarios</h1>
    </div>
</div>
<table class="table table-striped table-condensed">
<thead>
  <tr>
    <th class="center">Nombre</th>
    <th>Usuario</th>
    <th>Movil</th>
    <th>Municipio</th>
    <th>Departamento</th>
  </tr>
</thead>
<tbody>
        <?php
        foreach ($usuarios as $usuario) {
            print ' <tr role="usuario">
                        <td>'.$usuario->nombres." ".$usuario->apellidos. '</td>
                        <td>'.$usuario->usuario.'</td>
                        <td>'.$usuario->movil.'</td>
                        <td>'.$usuario->municipio.'</td>
                        <td>'.$usuario->departamento.'</td>
                    </tr>';
        }
        ?>
</tbody>
</table>




