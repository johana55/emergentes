    <?php
    $head= "
    <script src='assets/js/help-multiFile.js' ></script>
    <script src='assets/js/multi-file.js' ></script>
    ";

    include 'views/layout/admin/head.php';
    ?>


<style>
    .MultiFile-list {
        width: 100%;
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .MultiFile-label {
        background-color: #DADADA;
        border: 1px solid #EEEEEE;
        font-size: 16px;
        padding: 10px;
        width: 300px;
    }

    .MultiFile-list a {
        color: red;
        text-decoration: none;
    }

    .MultiFile-list span {

    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('#demo1').MultiFile({
            list: '#demo1-list'
        });
    });
</script>
<?php
echo $mensaje;
?>
    <div class="row">
<?php foreach ($imagenes as $i):  ?>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <img src="<?=$i->url?>"  alt="<?=$i->id?>" class="img-responsive">
    <form action="<?= $config->get('urlBase').'?controller=Producto&action=eliminarImagen'?>" method="post">
        <input type="hidden" name="imagen" value="<?=$i->id?>">
        <input type="hidden" name="producto" value="<?=$i->producto?>">
        <input type="submit"   value="Eliminar" class="btn btn-link"/>
    </form>
    </div>
<?php endforeach;
?>
    </div>

        <h2>Subir Imagenes</h2>
        <form enctype="multipart/form-data" action="" method="POST">
            <div class="form-group">

                <input  type="hidden" class="form-control" id="producto" name="producto" value="<?= $producto?>" >

            <div class="form-group">
                <label for="demo1">Imagenes Seleccionados</label>
                <input id="demo1" name="imagen[]" type="file" class="multi" accept="gif|jpg|png" maxlength="3" />
            </div>
            <div class="form-group" id="demo1-list"></div>
            <div class="row">
                <div class="col-md-5">
                    <input type="submit" name="upload" value="Subir" class="btn  btn-warning btn-block "/>
                </div>
            </div>

        </form>
<div class="row">
    <a class="btn  btn-link btn-lg" style="margin: 20px" href="<?= $config->get('urlBase').'?controller=Producto&action=index'?>">Atras</a>
</div>

    <?php
    include 'views/layout/admin/foot.php';
    ?>