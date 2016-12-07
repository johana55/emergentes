<?php
include 'views/layout/head.php';
?>
<form class="form-horizontal" action="" method="post">


    <div class="form-group">
            <label for="nombre_usuario" class="col-sm-2 control-label">nombre de Usuario</label>
            <div class="col-sm-10">
                <input type="text" required class="form-control"  name="nombre_usuario" placeholder="user name">
            </div>
        </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control"  name="password" placeholder="Contraseña...">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" required class="form-control" name="email" placeholder="nombre@domicio.com">
        </div>
    </div>
    <div class="form-group">
        <label for="domicilio" class="col-sm-2 control-label">Domicilio</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="domicilio"  placeholder="Domicilio ">
        </div>
    </div>
    <div class="form-group">
        <label for="rol" class="col-sm-2 control-label">Rol:</label>
        <div class="col-sm-10">
            <select name="rol"class="btn btn-block dropdown-toggle" >
                <?php foreach ($roles as $c): ?>
                 <option value="<?= $c->id ?>"><?= $c->nombre?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" >Guardar</button>
        </div>
    </div>
    </form>
<?php
include 'views/layout/foot.php';
?>