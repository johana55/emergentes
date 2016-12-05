<?php
include 'views/layout/head.php';
?>
<h2>Editar </h2>
<form class="form-horizontal" action="" method="post" >

    <input type="hidden" required class="form-control" name="id" placeholder="<?= $c->id ?>">
    <div class="form-group">
        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="nombre" placeholder="<?=$c->nombre ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="descripcion" placeholder="<?=$c->descripcion?>">
        </div>
    </div>
    <div class="form-group">
        <label for="precio_compra" class="col-sm-2 control-label">Fecha Inicio</label>
        <div class="col-sm-10">
            <input type="datetime-local" required class="form-control" name="fechaincio" value="<?=$c->fechainicio?>">
        </div>
    </div>
    <div class="form-group">
        <label for="precio_compra" class="col-sm-2 control-label">Fecha Fin</label>
        <div class="col-sm-10">
            <input type="datetime-local" required class="form-control" name="fechafin" value="<?=$c->fechafin?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10">
            <input type="checkbox" name="show" value="show" <?php if ($c->show) echo 'checked'?>>Show( Mostrar en pág. Web)
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Registrar</button>
        </div>
    </div>

</form>
<?php
include 'views/layout/foot.php';
?>