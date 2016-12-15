<?php
include 'views/layout/admin/head.php';
?>

    <h2>Marcas</h2>
<a class="btn btn-primary" style="margin-bottom: 10px" href="<?= $config->get('urlBase').'?controller=Marca&action=create' ?>">Registrar Nuevo Marca</a>
<table class="table table-bordered table-responsive">
    <thead>
    <tr>
        <th>ID</th>
        <th>Descripción</th>
    </tr>
    </thead>
    <tbody>


    <?php foreach ($marcas as $marca){ ?>
        <tr>
            <td><?=$marca->id ?></td>
            <td><?=$marca->descripcion ?></td>
            <td><a href="<?= $config->get('urlBase').'?controller=Marca&action=editar&id='.$marca->id?>">
                    Editar
                </a></td>
            <td><a href="<?= $config->get('urlBase').'?controller=Marca&action=eliminar&id='.$marca->id?>">
                    Eliminar
                </a></td>


        </tr>
    <?php } ?>
    </tbody>
</table>

<?php
include 'views/layout/admin/foot.php';
?>