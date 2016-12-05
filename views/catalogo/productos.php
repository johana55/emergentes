<?php
include 'views/layout/head.php';
?>

    <h2>Productos en Catalogo</h2>
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-green w3-large">Login</button>


    <table class="table table-bordered">
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
                <td><a href="<?= $config->get('urlBase').'?controller=
                Catalogo&action=eliminarProducto&id='.$producto->id.'&catalogo='.$producto->catalogo?>">
                        eliminar
                    </a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
            <span onclick="document.getElementById('id01').style.display='none'"
                  class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright"
                  title="Close Modal">&times;</span>
            <br>
            <br>
            <div class="w3-section">
                <a href="<?= $config->get('urlBase').'?controller=Catalogo&action=addProducto'?>">Guardar</a>
            </div>
            <form class="w3-container" action="" method="post">
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
                    <tbody>

                    <?php foreach ($otrosProductos as $producto){ ?>
                        <tr>
                            <td><?=$producto->id ?></td>
                            <td><?=$producto->nombre ?></td>
                            <td><?=$producto->descripcion ?></td>
                            <td><?=$producto->precio_compra ?></td>
                            <td><?= $producto->unidad_medida()->abreviatura?></td>
                            <td><?=$producto->marca()->descripcion ?></td>
                            <td><input type="checkbox" value="<?=$producto->id ?>" name="producto[]" /></td>                          </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </form>

        </div>
    </div>



<?php
include 'views/layout/foot.php';
?>