<?php
include 'views/layout/admin/head.php';
?>

    <h2>Clientes</h2>
<a class="btn btn-primary" style="margin-bottom: 10px" href="<?= $config->get('urlBase').'?controller=Cliente&action=create' ?>">Registrar Nuevo </a>
<table class="table table-bordered table-responsive">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre Usuario</th>
        <th>Password</th>
        <th>Tipo</th>
        <th>Email</th>
        <th>Rol</th>
        <th>fecha de creacion</th>
    </tr>
    </thead>
    <tbody>


    <?php foreach ($clientes as $cliente){ ?>
        <tr>
            <td><?=$cliente->id ?></td>
            <td><?=$cliente->usuario()->nombre_usuario ?></td>
            <td><?=$cliente->usuario()->password ?></td>
            <td><?=$cliente->usuario()->tipo ?></td>
            <td><?=$cliente->usuario()->email ?></td>
            <td><?=$cliente->usuario()->rol()->nombre?></td>

            <td><?=$cliente->fechacreado ?></td>
            <td><a href="<?= $config->get('urlBase').'?controller=Cliente&action=editar&id='.$cliente->id?>">
                    Editar
                </a></td>
            <td><a href="<?= $config->get('urlBase').'?controller=Producto&action=deshabilitar&id='.$cliente->id?>">
                    Eliminar
                </a></td>


        </tr>
    <?php } ?>
    </tbody>
</table>

<?php
include 'views/layout/admin/foot.php';
?>