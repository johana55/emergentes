<?php
include 'views/layout/cliente/clienteHead.php';
?>

<div class="container">
    <div class="row">
        <h2>Mis Pedidos</h2>

        <br>
        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                    </tr>
                        <?php

                        foreach ($pedidos as $pedido) {
                            ?>
                            <tr>
                                <td><?= $pedido->id?></td>
                                <td><?= $pedido->horafecha ?></td>
                                <td><?= $pedido->total+ $pedido->total*$pedido->iva+ $pedido->metodo_envio()->monto?></td>
                                <td><?= $pedido->estado()?></td>
                                <?php if($pedido->estado == 1 ){ ?>
                                    <td><a href="">Pagar</a></td>
                                <?php }else{
                                    if($pedido->estado != 0){?>
                                        <td> <button type="button" onclick="informacion(<?= $pedido->id ?>)" class="btn btn-info">Ver Estado</button></td>

                                <?php }}?>

                            </tr>
                        <?php } ?>

                </table>
            </div>

        </div>
    </div>
</div>

<script>
    function informacion(id)
    {

        $.ajax(
            {
                url : '<?= $config->get('urlBase').'?controller=Pedido&action=estado'?>',
                type: "POST",
                data : {id: id}
            })
            .done(function(data) {
                //location.reload(true);

            });
        /*
         .fail(function(data) {
         alert( "error" );
         })
         .always(function(data) {
         alert( "complete" );
         })*/ ;
    }
</script>


<?php
include 'views/layout/cliente/clienteFoot.php';
?>


