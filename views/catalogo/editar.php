<?php

$head= "
    <link rel=\"stylesheet\" media=\"all\" type=\"text/css\" href=\"assets/css/jquery-ui.css\" />
    <link rel=\"stylesheet\" media=\"all\" type=\"text/css\" href=\"assets/css/jquery-ui-timepicker-addon.css\" />
    ";

include 'views/layout/admin/head.php';
?>
<h2>Editar </h2>
<form class="form-horizontal" action="" method="post" >

    <input type="hidden" required class="form-control" name="id" value="<?= $c->id ?>">
    <div class="form-group">
        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="nombre" value="<?=$c->nombre ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="descripcion" value="<?=$c->descripcion?>">
        </div>
    </div>
    <div class="form-group">
        <label for="fechainicio" class="col-sm-2 control-label">Fecha Inicio</label>
        <div class="col-sm-10">
            <input type="text" id="fechainicio" required class="form-control" name="fechaincio" value="<?=$c->fechainicio?>">
        </div>
    </div>
    <div class="form-group">
        <label for="fin" class="col-sm-2 control-label">Fecha Fin</label>
        <div class="col-sm-10">
            <input type="text" id="fin" required class="form-control" name="fechafin" value="<?=$c->fechafin?>">
        </div>
    </div>
    <div class="form-group">
        <label for="show" class="col-sm-2 control-label">  </label>
        <div class="col-sm-10">
            <input type="checkbox" disabled id="show" name="show"  <?php if ($c->show == 1) echo 'checked'?>>Show( Mostrar en pág. Web)
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-warning btn-lg">Registrar</button>
        </div>
    </div>

</form>



    <script type="text/javascript" src="assets/js/jquery-1.12.2.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui-sliderAccess.js"></script>
    <script type="text/javascript" src="assets/js/datetime.js"></script>
<?php
include 'views/layout/admin/foot.php';
?>