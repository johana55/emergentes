<?php
include 'views/layout/admin/head.php';
?>
<h2>Editar </h2>
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
            <input type="text" required class="form-control" name="descripcion" placeholder="ingrese una descripcion">
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

            <input type="hidden"  name="show" value="0" >

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Registrar</button>
        </div>
    </div>

</form>
<?php
include 'views/layout/admin/foot.php';
?>