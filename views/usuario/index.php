<?php
include 'views/layout/head.php';
?>

    <h2>Usuarios</h2>

    <button onclick="document.getElementById('id01').style.display='block'"
            class="btn btn-primary">Nuevo</button>

    <table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Password</th>
        <th>Tipo</th>
        <th>Email</th>
        <th>Rol</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($usuarios as $u){ ?>
        <tr>
            <td><?=$u->id ?></td>
            <td><?=$u->nombre_usuario ?></td>
            <td><?=$u->password ?></td>
            <td><?=$u->tipo ?></td>
            <td><?=$u->email ?></td>
            <td><?= $u->rol()->nombre?></td>
            <td><a href="<?= $config->get('urlBase').'?controller=Usuario&action=editar&id='.$u->id?>">
                    editar
                </a></td>
            <td><a href="<?= $config->get('urlBase').'?controller=Usuario&action=eliminar&id='.$u->id?>">
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
            <form class="form-horizontal" action="" method="post" >

                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" name="nombre" placeholder="ingrese el nombre ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" name="password" placeholder="ingrese una descripcion">
                    </div>
                </div>
                <div class="form-group">
                    <label for="precio_compra" class="col-sm-2 control-label">Fecha Inicio</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" name="inicio">

                    </div>
                </div>
                <div class="form-group">
                    <label for="precio_compra" class="col-sm-2 control-label">Fecha Fin</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" name="fin">
                    </div>
                </div>

                <input type="hidden"  name="show" value="0" >Show( Mostrar en pág. Web)

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Registrar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
<?php
include 'views/layout/foot.php';
?>