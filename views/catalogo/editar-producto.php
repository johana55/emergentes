<?php
include 'views/layout/admin/head.php';
?>

<form class="form-horizontal" action="" method="post" >
    <input type="hidden" name="id" value="<?=$producto->id ?>">
    <div class="form-group">
        <label for="idproducto" class="col-sm-2 control-label">ID Producto</label>
        <div class="col-sm-10">
            <input type="text" id="idproducto" readonly required class="form-control" name="producto" value="<?=$producto->producto ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="precio" class="col-sm-2 control-label">Precio Venta</label>
        <div class="col-sm-10">
            <input type="number" min="0" id="precio" step="0.1" required value="<?=$producto->precio?>" class="form-control" name="precio" placeholder="Ingrese el precio de venta ">
        </div>
    </div>
    <div class="form-group">
        <label for="stock" class="col-sm-2 control-label">Stock</label>
        <div class="col-sm-10">
            <input type="number" min="0" readonly required class="form-control" name="stock" id="stock" value="<?=$producto->stock?>" placeholder="Ingrese el stock inicial">
        </div>
    </div>
    <div class="form-group">
        <label for="stocknuevo" class="col-sm-2 control-label">Cantidad a ingresar</label>
        <div class="col-sm-10">
            <input type="number" min="0" required class="form-control" name="stocknuevo" id="stocknuevo" value="0" placeholder="Ingrese el stock inicial">
        </div>
    </div>
    <div class="form-group">
        <label for="show" class="col-sm-2 control-label">Estado</label>
        <div class="col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="show" <?=$producto->show? 'checked':''?> id="show"  >
                    Habilitar
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-warning" value="Guardar Cambios">
        </div>
    </div>

</form>

<?php
include 'views/layout/admin/foot.php';
?>
