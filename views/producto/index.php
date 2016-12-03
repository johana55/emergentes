



<h2>Productos</h2>
<a href="<?= $config->get('urlBase').'?controller=Producto&action=create' ?>">Registrar Nuevo Producto</a>
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


    <?php foreach ($productos as $producto){ ?>
        <tr>
            <td><?=$producto->id ?></td>
            <td><?=$producto->nombre ?></td>
            <td><?=$producto->descripcion ?></td>
            <td><?=$producto->precio_compra ?></td>
            <td><?= $producto->unidad_medida()->abreviatura?></td>
            <td><?=$producto->marca()->descripcion ?></td>
            <td><?=$producto->categoria()->descripcion ?></td>

        </tr>
    <?php } ?>
    </tbody>
</table>