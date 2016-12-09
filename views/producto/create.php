<?php
include 'views/layout/admin/head.php';
?>

<h2>Registro de Producto</h2>
<form class="form-horizontal" action="<?= $config->get('urlBase').'?controller=Producto&action=store'?>" method="post">

        <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label" >Nombre</label>
            <div class="col-sm-10">
                <input type="text" required class="form-control" name="nombre" id="nombre" placeholder="Titulo del Producto">
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
            <div class="col-sm-10">
                <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Describe el Producto">
            </div>
        </div>
    <div class="form-group">
        <label for="precio_compra" class="col-sm-2 control-label">Precio Compra</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="precio_compra" placeholder="Ingresa el precio">
        </div>
    </div>
    <div class="form-group">
        <label for="unidad_medida" class="col-sm-2 control-label">Unidad de Medida</label>
        <div class="col-sm-10">
            <select class="form-control" name="unidad_medida" id="unidad_medida" required>
                <option value="">Seleccionar</option>
               <?php foreach ($unidad_medida as $um): ?>
                   <option value="<?=$um->id?>"><?=$um->abreviatura?></option>
               <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="marca" class="col-sm-2 control-label">Marca</label>
        <div class="col-sm-10">
            <select class="form-control" name="marca" id="marca" required>
                <option value="">Seleccionar</option>
                <?php foreach ($marca as $m): ?>
                    <option value="<?=$m->id?>"><?=$m->descripcion?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="categoria" class="col-sm-2 control-label">Categoria</label>
        <div class="col-sm-10">
            <select class="form-control" name="categoria" id="categoria" required>
                <option value="">Seleccionar</option>
                <?php foreach ($categoria as $c): ?>
                    <option value="<?=$c->id?>"><?=$c->descripcion?></option>
                <?php endforeach; ?>
            </select>
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