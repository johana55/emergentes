<?php
include 'views/layout/admin/head.php';
?>

<h2>Editar Producto</h2>
<form class="form-horizontal"  action="<?= $config->get('urlBase').'?controller=Producto&action=update&id='.$producto->id?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="nombre" value="<?=$producto->nombre ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="descripcion" value="<?=$producto->descripcion?>">
        </div>
    </div>
    <div class="form-group">
        <label for="precio_compra" class="col-sm-2 control-label">Precio Compra</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="precio_compra" value="<?=$producto->precio_compra?>">
        </div>
    </div>
   <div class="form-group">
        <label for="unidad_media" class="col-sm-2 control-label">Unidad de medida</label>
        <div class="col-sm-10">
            <select name="unidad_medida"class="form-control"  required>

                    <?php foreach ($umedidas as $u):
                        if($u->id==$producto->unidad_medida()->id){
                            ?>
                            <option value="<?= $u->id ?>" selected><?= $u->abreviatura ?> <span class="caret"></span></option>
                        <?php }else{?>
                            <option value="<?= $u->id ?>"><?= $u->abreviatura?></option>
                        <?php }?>
                    <?php endforeach;?>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="marca" class="col-sm-2 control-label">Marca</label>
        <div class="col-sm-10">
                <select name="marca"class="form-control" required>

                    <?php foreach ($marcas as $m):
                        if($m->id==$producto->marca()->id){
                            ?>
                            <option value="<?= $m->id ?>" selected><?= $m->descripcion ?> <span class="caret"></span></option>
                        <?php }else{?>
                            <option value="<?= $m->id ?>"><?= $m->descripcion?></option>
                        <?php }?>
                    <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="categoria" class="col-sm-2 control-label">Categoria</label>
        <div class="col-sm-10">
            <select name="categoria"class="form-control"  required>

                <?php foreach ($categorias as $c):
                    if($c->id==$producto->categoria()->id){
                        ?>
                        <option value="<?= $c->id ?>" selected><?= $c->descripcion ?> <span class="caret"></span></option>
                    <?php }else{?>
                        <option value="<?= $c->id ?>"><?= $c->descripcion?></option>
                    <?php }?>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-warning btn-lg  btn-block">Actualizar</button>
        </div>
    </div>

</form>
<?php
include 'views/layout/admin/foot.php';
?>