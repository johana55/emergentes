<?php
include 'views/layout/admin/head.php';
?>
    <h2>Catalogos</h2>
    <a class="btn btn-primary" style="margin-bottom: 10px"  href="<?= $config->get('urlBase').'?controller=Catalogo&action=crear'?>">Registrar</a>
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($catalogos as $c){ ?>
            <tr>
                <td><?=$c->id ?></td>
                <td><?=$c->nombre ?></td>
                <td><?=$c->descripcion ?></td>
                <td><?=$c->fechainicio ?></td>
                <td><?= $c->fechafin?></td>
                <td style="text-align: center">
                    <?php if($c->show==0){ ?>
                       <button type="button" onclick="habilitar(<?= $c->id ?>)" class="btn btn-warning" data-toggle="modal" data-target="#gridSystemModal">Deshabilitado </button>
                    <?php }else{ ?>
                        <button type="button" onclick="deshabilitar(<?= $c->id ?>)" name="estado" class="btn btn-success" data-toggle="modal" data-target="#gridSystemModal">Habilitado</button>
                   <?php } ?>
                </td>
                <td><a href="<?= $config->get('urlBase').'?controller=Catalogo&action=editar&id='.$c->id?>">
                        Editar
                    </a></td>
                <td><a href="<?= $config->get('urlBase').'?controller=Catalogo&action=productos&id='.$c->id.'&q='?>">
                        Productos
                    </a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


    <div class="modal fade" id="gridSystemModal" tabindex="-1" role="dialog" aria-labelledby="titulo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="titulo">Cambiar Estado del Catalogo</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12" id="contenido-modal">

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="cambiar"  class="btn btn-primary">Cambiar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




    <script>

         var id_catalogo;
        function habilitar(id) {
            $('#contenido-modal').html('<h3>¿Establecera el catalogo como el principal? <br> Se deshabilitara los catalogos activos.</h3>');
            id_catalogo = id;
        }

        function deshabilitar(id) {
            $('#contenido-modal').html('<h3>Si deshabilita el catalogo no habra productos para mostrar a los clientes, debera a continuacion habilitar otro catalogo.</h3>');
            id_catalogo = id;
        }


        $('#cambiar').click(function () {

            $.ajax(
                {
                    url : '<?= $config->get('urlBase').'?controller=Catalogo&action=cambiarEstado'?>',
                    type: "POST",
                    data : {id:id_catalogo}
                })
            .done(function(data) {
                location.reload(true);
            })/*
                .fail(function(data) {
                    alert( "error" );
                })
                .always(function(data) {
                    alert( "complete" );
                })*/ ;
        });
    </script>




<?php
include 'views/layout/admin/foot.php';
?>