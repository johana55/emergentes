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
                                <td><?= $pp->productoc()->producto()->nombre?></td>
                                <td><?= $precio ?></td>
                                <td><?= $pp->cantidad?></td>
                                <td><?= $precio*$pp->cantidad?></td>
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
        <div class="col-md-6">
            <h2>Seleccionar Metodo de Envio</h2>
            <select name="metodo_envio" id="envio" required class="form-control">
                <option value="">Seleccione</option>
                <?php
                $mtenvio = null;
                foreach ($envios as $e){
                    if($e->id == $pedido->metodo_envio){
                        $mtenvio=$e;
                    ?>
                        <option value="<?=$e->id ?>" selected><?=$e->descripcion?></option>
                        <?php }else{?>
                        <option value="<?=$e->id ?>" ><?=$e->descripcion?></option>

                <?php }}?>
            </select>

            <p >
            <h2><?= $mtenvio ? $mtenvio->descripcion: '' ?></h2>
            Precio Por el envio <?= $mtenvio ? $mtenvio->monto: '' ?>
            </p>
        </div>
        <div class="col-md-6">
            <h2>Metodo de Pago</h2>
            <?php $metodo_pago = $pedido->metodo_pago(); ?>
            <ul class="list-group-item">
                <li class="list-group-item"><h4 style="display: inline" >Tipo: </h4>   <?= $metodo_pago->descripcion?> </li>
                <li class="list-group-item"><h4 style="display: inline" >Descripcion: </h4> Depósitos o transferencias bancarias en los siguientes bancos:
                    <img src="assets/img/Logo_BNB.jpg" class="img-responsive" width="120px" alt="bnb">

                </li>
                <li class="list-group-item"><h4 style="display: inline" >Numero de Cuenta: </h4> ########</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Direccion de Envio</h2>
            <ul class="list-group-item">

                <li class="list-group-item"><h4 style="display: inline" >Pais: </h4>   <?= $direccion->departamento()->pais()->nombre?> </li>
                <li class="list-group-item"><h4 style="display: inline" >Departamento: </h4>  <?= $direccion->departamento()->nombre?>      </li>
                <li class="list-group-item"><h4 style="display: inline" >Localidad: </h4> <?= $direccion->localidad?> </li>
                <li class="list-group-item"><h4 style="display: inline" >Direccion: </h4> <?= $direccion->direccion?> </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Total a Pagar : </h2>

                <ul class="list-group-item">

                    <li class="list-group-item"><h4  >Subtotal: </h4>   <?= $pedido->total?> </li>
                    <li class="list-group-item"><h4 >Iva: </h4>  <?= $pedido->iva*$pedido->total?> </li>
                    <li class="list-group-item"><h4 >Precio Envio: </h4> <?= $pedido->metodo_envio()->monto?> </li>
                </ul>


            <h3>Bs.: <?= $pedido->total + $pedido->total*$pedido->iva + $pedido->metodo_envio()->monto ?></h3>
            <a style="margin: 15px auto" class="btn btn-danger" href="<?= $config->get('urlBase').'?controller=Pedido&action=guardar'?>">Enviar Pedido</a>
        </div>
    </div>
</div>
<?php
include 'views/layout/cliente/clienteFoot.php';
?>
