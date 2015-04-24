<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Productos</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Todos los productos
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <div class="form-inline">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length">
                                <label>Show 
                                    <select id="select-cant" aria-controls="dataTables-example" class="form-control input-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="dataTables-example_filter" class="dataTables_filter">
                                    <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 150px;">Nombre</th>
                                            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 184px;">Existencias</th>
                                            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 171px;">Estado</th>
                                            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 129px;">Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody id="lista">
                                        <?php
                                        foreach ($productos as $row) {
                                            print ' <tr role="row">
                                                        <td>'.$row->nombre.'</td>
                                                        <td>'.$row->existencias.'</td>
                                                        <td>'.$row->estado.'</td>
                                                        <td class="center">'.number_format($row->precio , 0, ",", ".").'</td> 
                                                    </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                    <ul class="pagination" id="paginas">
                                        <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0">
                                            <a href="javascript:void(0)" data-pag="1" class="link-a-pagina">1</a>
                                        </li>
                                        <?php
                                        for ($i=2; $i < floor($cant/10)+2; $i++) { 
                                            print'  <li class="paginate_button " aria-controls="dataTables-example" tabindex="0">
                                                        <a data-pag="'.$i.'" class="link-a-pagina" href="javascript:void(0)">'.$i.'</a>
                                                    </li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<script type="text/javascript">
    var cant = 10;
    var pagina = 1;
    $(document).ready(function(){
        $("#select-cant").change(function(){
            cant = $("#select-cant").val();
            pagina = 1;
            listar();
        });
        $("#paginas").on('click','.link-a-pagina',function(e){
            e.preventDefault();
            pagina = $(e.target).attr('data-pag');
            listar();
        });
    })
    function listar(){
        $.ajax({                                               // envio de los datos
            url: "<?php print base_url();?>producto/listar",
            context: document.body,
            dataType: "json",
            type: "POST",
            data: {
                    cant : cant,
                    pagina : pagina
                }
            })
            .done(function(data) {                                // respuesta del servidor
            if(data.res=="ok") {
                resultado = '';
                for (var i = 0; i < data.productos.length; i++) {
                    resultado += ' <tr role="row">'+
                                    '<td>'+data.productos[i].nombre+'</td>'+
                                    '<td>'+data.productos[i].existencias+'</td>'+
                                    '<td>'+data.productos[i].estado+'</td>'+
                                    '<td>'+data.productos[i].precio+'</td>'+
                                '   </tr>';
                    $("#lista").html(resultado);
                };
                resultado = '';
                for (var i = 0; i < Math.floor((data.cant-1)/cant)+1; i++) {
                    resultado += '  <li class="paginate_button ';
                    if((i+1)==pagina){
                        resultado+= ' active';
                    }
                    resultado += '" aria-controls="dataTables-example" tabindex="0">'+
                                        '<a data-pag="'+(i+1)+'" class="link-a-pagina" href="javascript:void(0)">'+(i+1)+'</a>'+
                                    '</li>';
                };
                $("#paginas").html(resultado);
              }
            else{alert(data.msj) } })          
            .error(function(){alert('error en el servidor'); });  // error generado
    }
    function buscar(query){
        $.ajax({
            url: "<?php print base_url();?>producto/buscar",
            context: document.body,
            dataType: "json",
            type: "POST",
            data: {
                    query : query
                }
        })
        .done(function(data){
            if(data.res=="ok"){

            }else{
                alert('Sin resultados')
            }
        })
        .error(function(){
            alert('Sin resultados')
        })

        });
    }
</script>