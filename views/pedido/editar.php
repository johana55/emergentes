<?php
include 'views/layout/cliente/clienteHead.php';
?>

<div class="container" ">
    <div class="row">
        <h2>Carrito de Compras</h2>
            <h3><b>Pedido:  #</b> <?= $id?></h3>
        <br>
        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Producto</th>
                        <th>Precio Bs.</th>
                        <th>Cantidad</th>
                        <th>Subtotal Bs.</th>

                    </tr>
                    <tr>
                        <?php

                        foreach ($pedidoProducto as $pp) {
                            $precio = $pp->productoc()->precio;
                            ?>
                            <form action="" class="table" method="post">
                                <input type="hidden" name="producto" value="<?=$pp->producto ?>">

                                <td><?= $pp->productoc()->producto()->nombre?></td>
                                <td><?= $precio ?></td>
                                <td><input type="number" min="1" name="cantidad" value="<?= $pp->cantidad?>" ></td>
                                <td><?= $precio*$pp->cantidad?></td>
                                <td><input type="submit" style="margin: 0px; padding: 0px"  name="actualizar"  class="btn btn-link btn-sm" value="Actualizar"> </td>
                                <td> <input type="submit" style="margin: 0px; padding: 0px"  name="eliminar" class="btn btn-link btn-sm" value="Eliminar"></td>
                            </form>
                        <?php } ?>
                    </tr>
                </table>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-6">
            <ul class="list-group-item">
                <li class="list-group-item"><h4 style="display: inline" >Cantidad Productos: </h4>   <?= $cantidad ?> </li>
                <li class="list-group-item"><h4 style="display: inline" >Subtotal Bs.: </h4>   <?= $pedido->total ?> </li>
            </ul>
        </div>
    </div>

<div class="row">
    <div class="col-md-6 col-md-offset-6">
        <a style="margin: 15px auto" class="btn btn-danger" href="<?= $config->get('urlBase').'?controller=Pedido&action=finalizar&id='.$id?>">Finalizar Compra</a>
    </div>
</div>
</div>

<?php
include 'views/layout/cliente/clienteFoot.php';
?>

