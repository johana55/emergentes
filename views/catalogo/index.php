<?php
include 'views/layout/head.php';
?>

    <h2>Productos</h2>
    <a href="<?= $config->get('urlBase').'?controller=Catalogo&action=crear'?>">Registrar</a>
    <table class="table table-bordered">
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
                <td><?php if($c->show==0){echo 'desabilitado'; }else{echo 'habilitado';} ?></td>
                <td><a href="<?= $config->get('urlBase').'?controller=Catalogo&action=editar&id='.$c->id?>">
                        editar
                    </a></td>
                <td><a href="<?= $config->get('urlBase').'?controller=Catalogo&action=productos&id='.$c->id.'&q='?>">
                        Productos
                    </a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php
include 'views/layout/foot.php';
?>