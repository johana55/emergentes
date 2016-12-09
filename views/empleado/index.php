<?php
include 'views/layout/admin/head.php';
?>

    <h2>Empleados</h2>
<a href="<?= $config->get('urlBase').'?controller=Empleado&action=create' ?>">Registrar </a>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Password</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Domicilio</th>
    </tr>
    </thead>
    <tbody>


    <?php foreach ($empleados as $e){ ?>
        <tr>
            <td><?=$e->id ?></td>
            <td><?=$e->nombre_usuario ?></td>
            <td><?=$producto->password ?></td>
            <td><?=$producto->email ?></td>
            <td><?= $producto->rol()->nombre?></td>
            <td><?=$producto->domicilio ?></td>
            <td><a href="<?= $config->get('urlBase').'?controller=Empleado&action=edit&id='.$e->id?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a></td>
            <td><a href="<?= $config->get('urlBase').'?controller=Empleado&action=imagen&id='.$e->id?>">
                   <span class="glyphicon glyphicon-trash"></span>
                </a></td>


        </tr>
    <?php } ?>
    </tbody>
</table>

<?php
include 'views/layout/admin/foot.php';
?>