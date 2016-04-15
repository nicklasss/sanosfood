<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Productos</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <div class="form-inline">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="dataTables_length">
                                <label>Mostrar 
                                    <select id="select-cant" aria-controls="dataTables-example" class="form-control input-sm">
                                        <option value="5">5</option>
                                        <option value="10" selected>10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select> productos</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div id="dataTables-example_filter" class="dataTables_filter">
                                    <label>Buscar:<input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example"></label>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-offset-1">
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
                            <div class="col-md-1">
                                <button type="button" class="btn btn-success btn-nuevo"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</button>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered table-condensed table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr role="row">
                                            <th width="10%" class="sorting_asc text-center" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" >Id</th>
                                            <th width="50%" class="sorting" tabindex="0" rowspan="1" colspan="1" >Nombre</th>
                                            <th width="15%" class="sorting text-center" tabindex="0" rowspan="1" colspan="1" >Existencias</th>
                                            <th width="15%" class="sorting text-center" tabindex="0" rowspan="1" colspan="1" >Estado</th>
                                            <th class="sorting text-right" tabindex="0" rowspan="1" colspan="1" >Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody id="lista">
<?php
                            foreach ($productos as $producto) {
                                print ' <tr role="row">
                                            <td class="text-center">'.$producto->id.'</td>
                                            <td><strong><a href="'.base_url().'admin/producto/'.$producto->id.'">'.$producto->nombre.'</a></strong></td>
                                            <td class="text-center">'.$producto->existencias.'</td>
                                            <td class="text-center">'.$producto->estado.'</td>
                                            <td class="text-right">'.number_format($producto->precio , 0, ",", ".").'</td> 
                                        </tr>';
                            }
?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- panel-body -->
        </div><!-- panel --> 
    </div><!-- col-lg-12 -->
</div>


<!------------------------------------------------------------------------------------------------------------------------------------> 
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

    $('.container').on('click','.btn-nuevo',function(event){
        window.location="<?php print base_url();?>admin/crearproducto";
    });
});

//----------------------------------------------------------------------------------funcion LISTAR
function listar(){
    $.ajax({                                              
        url: "<?php print base_url();?>producto/listar",
        context: document.body,
        dataType: "json",
        type: "POST",
        data: { cant : cant, pagina : pagina, nomestado : "<?php print $this->uri->segment(3);?>"  }
        })
    .done(function(data) {                                
        if(data.res == "ok") {
            resultado = '';
            for (var i = 0; i < data.productos.length; i++) {
                resultado +=
                '<tr role="row">'+
                    '<td class="text-center">'+data.productos[i].id+'</td>'+
                    '<td><strong><a href="<?php print base_url();?>admin/producto/'+data.productos[i].id+'">'+data.productos[i].nombre+'</a></strong></td>'+
                    '<td class="text-center">'+data.productos[i].existencias+'</td>'+
                    '<td class="text-center">'+data.productos[i].estado+'</td>'+
                    '<td class="text-right">'+formato_numero(data.productos[i].precio)+'</td>'+
                '</tr>';
            }
            $("#lista").html(resultado);
            resultado = '';
            for (var i = 0; i < Math.floor((data.cant-1)/cant)+1; i++) {
                resultado += '  <li class="paginate_button ';
                if((i+1) == pagina){ 
                    resultado+= ' active';
                }
                resultado += '" aria-controls="dataTables-example" tabindex="0">'+
                                    '<a data-pag="'+(i+1)+'" class="link-a-pagina" href="javascript:void(0)">'+(i+1)+'</a>'+
                                '</li>';
            }
            $("#paginas").html(resultado);
        }
        else{alert(data.msj) } })          
    .error(function(){alert('error en el servidor'); });  // error generado
}

//----------------------------------------------------------------------------------funcion BUSCAR
function buscar(query){
    $.ajax({
        url: "<?php print base_url();?>producto/buscar",
        context: document.body,
        dataType: "json",
        type: "POST",
        data: { query : query }
    })
    .done(function(data){
        if(data.res == "ok"){
        }else{ alert('Sin resultados') }
    })
    .error(function(){
        alert('Sin resultados')
    })
}

//----------------------------------------------------------------------------------funcion formato_numero
function formato_numero(texto) {
    var cadena = "";
    var resultado = "";
    if (isNaN(texto)) { cadena = texto; }
    else { cadena = texto.toString() }

    for (var j, i = cadena.length - 1, j = 0; i >= 0; i--, j++) 
        resultado = cadena.charAt(i) + ((j > 0) && (j % 3 == 0)? ".": "") + resultado; 
    return resultado;
}
    
</script>