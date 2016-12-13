<?php
include 'views/layout/admin/head.php';
?>
    <h2>Productos del Catalogo</h2>

    <!-- Button trigger modal -->
    <button style="margin: 5px" class="btn btn btn-warning " data-toggle="modal" data-target="#myModal">
       Ingresar Producto
    </button>

    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Precio </th>
            <th>Stock</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $producto){ ?>
            <tr>
                <td><?=$producto->id ?></td>
                <td><?=$producto->producto ?></td>
                <td><?=$producto->nombre ?></td>
                <td><?=$producto->marca()->descripcion ?></td>
                <td><?=$producto->precio?></td>
                <td><?= $producto->stock?></td>
                <td><?= $producto->show?></td>
                <td><a href="<?= $config->get('urlBase').'?controller=Catalogo&action=eliminarProducto&producto='.$producto->producto.'&catalogo='.$producto->catalogo?>">
                        eliminar
                    </a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>








    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Seleccionar Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-xs-12">
                            <form class="form-inline" action="" method="post">
                                <div class="form-group">
                                    <label for="buscar">Buscar por nombre</label>
                                    <input type="text"    class="form-control" id="buscar" name="q">
                                    <input type="hidden" name="catalogo" id="catalogo" value="<?=$catalogo ?>">
                                </div>
                                <button type="submit" id="submit-modal" class="btn btn-primary">Buscar</button>
                            </form>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio Compra</th>
                                    <th>Unidad de Medida</th>
                                    <th>Marca</th>
                                    <th>Categoria</th>
                                </tr>
                                </thead>
                                <tbody id="tablamodal-contenido">
                                <?php foreach ($otrosProductos as $producto){ ?>
                                    <tr>
                                        <td><?=$producto->id ?></td>
                                        <td><?=$producto->nombre ?></td>
                                        <td><?=$producto->descripcion ?></td>
                                        <td><?=$producto->precio_compra ?></td>
                                        <td><?= $producto->unidad_medida()->abreviatura?></td>
                                        <td><?=$producto->marca()->descripcion ?></td>
                                        <td><?=$producto->categoria()->descripcion ?> </td>
                                        <td>
                                            <button class="btn btn-warning" onclick="preparar(<?= $producto->id?>)" data-toggle="modal" data-target="#agregar"  >Agregar</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                 <!--   <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <style>
        .modal-body {
            max-height: calc(100vh - 210px);
            overflow-y: auto;
        }

    </style>



    <!--  Modal para el agregar producto -->

    <!-- Modal -->
    <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Producto</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="" method="post" >
                        <div class="form-group">
                            <label for="idproducto" class="col-sm-2 control-label">ID Producto</label>
                            <div class="col-sm-10">
                                <input type="text" id="idproducto" readonly required class="form-control" name="producto" value="" ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="precio" class="col-sm-2 control-label">Precio Venta</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" id="precio" step="0.1" required class="form-control" name="precio" placeholder="Ingrese el precio de venta ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stock" class="col-sm-2 control-label">Stock inicial</label>
                            <div class="col-sm-10">
                                <input type="number" min="0" required class="form-control" name="stock" id="stock" placeholder="Ingrese el stock inicial">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="show" class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="show"  id="show" >
                                        Habilitar
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" id="agregar_submit" data-dismiss="modal"   class="btn btn-warning btn-lg">Agregar Producto</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"   data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>


    <!--  Modal para el agregar producto -->
    <script>

        function buscar() {
            $.ajax(
                {
                    url : '<?= $config->get('urlBase').'?controller=Catalogo&action=listaOtrosProductos'?>',
                    type: "POST",
                    data : {q: $('#buscar').val(),catalogo:$('#catalogo').val()}
                })
                .done(function(data) {
                    var  html = "";
                    $.each($.parseJSON(data), function(i, item) {
                        html +=  "<tr>"+
                            "<td>"+ item.id + "</td>"+
                            "<td>"+ item.nombre + "</td>"+
                            "<td>"+ item.descripcion + "</td>"+
                            "<td>"+ item.precio_compra + "</td>"+
                            "<td>"+ item.unidad_medida + "</td>"+
                            "<td>"+ item.marca + "</td>"+
                            "<td>"+ item.categoria + "</td>"+
                            "<td>"+ "<button class=\"btn btn-warning\" onclick=\"preparar("+item.id+")\" data-toggle=\"modal\" data-target=\"#agregar\">Agregar</button>" + "</td>"+
                            "</tr>";
                    })

                    $('#tablamodal-contenido').html(html);

                }) ;
        }



        $('#submit-modal').click(function (evt) {
                evt.preventDefault();
                buscar();
        });

        $('#agregar_submit').click(function (evt) {
           evt.preventDefault();


            $.ajax(
                {
                    url : '<?= $config->get('urlBase').'?controller=Catalogo&action=addProductos'?>',
                    type: "POST",
                    data : {producto: $('#idproducto').val(),catalogo:$('#catalogo').val(),
                    show:$('#show:checked').val() == "on" ? 1 : 0,
                    stock: $('#stock').val(),
                    precio: $('#precio').val()}
                })
                .done(function(data) {

                }) ;

            buscar();
        });

        function preparar(id) {
            $('#idproducto').val(id);
        }

    </script>
<?php
include 'views/layout/admin/foot.php';
?>