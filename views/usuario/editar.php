<?php
include 'views/layout/head.php';
?>

<h2>Editar</h2>
<form class="form-horizontal" action="" method="post" >

    <input type="text" value="<?=$u->id ?>" name="id">
    <div class="form-group">
        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="nombre" placeholder="<?=$u->nombre_usuario ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="descripcion" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="descripcion" placeholder="<?=$u->password?>">
        </div>
    </div>
    <div class="form-group">
        <label for="precio_compra" class="col-sm-2 control-label">Tipo</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="precio_compra" placeholder="<?=$u->tipo?>">
        </div>
    </div>
    <div class="form-group">
        <label for="precio_compra" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" required class="form-control" name="precio_compra" placeholder="<?=$u->email?>">
        </div>
    </div>
    <div class="form-group">
        <label for="precio_compra" class="col-sm-2 control-label">Rol</label>
        <div class="col-sm-10">
            <input type="email" required class="form-control" name="precio_compra" placeholder="<?=$u->rol()->nombre ?>">
        </div>
    </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="usuario" class="btn btn-default">Registrar</button>
        </div>
    </div>

</form>
<?php
include 'views/layout/foot.php';
?>