<?php
include 'views/layout/admin/head.php';
?>

<h2>Registro de Marca</h2>
<form class="form-horizontal" action="" method="post">


        <div class="form-group">
            <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
            <div class="col-sm-10">
                <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Describe el Producto">
            </div>
        </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-warning btn-lg btn-block">Registrar</button>
        </div>
    </div>
    </form>


<?php
include 'views/layout/admin/foot.php';
?>