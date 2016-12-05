<!DOCTYPE html>
<html>
<head>
    <title>Multiple file upload Demo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width">
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
    <script src='assets/js/help-multiFile.js' type="text/javascript"></script>
    <script src='assets/js/multi-file.js' type="text/javascript" language="javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#demo1').MultiFile({
                list: '#demo1-list'
            });
        });
    </script>
</head>
<body>
<?php
echo $mensaje;
?>
<?php foreach ($imagenes as $i):  ?>
    <div>
        <img style="width: 50px" src="<?=$config->get('productos').$i->url?>" alt="producto<?=$i->url?>">
        <a href="<?= $config->get('urlBase').'?controller=Producto&action=eliminarImagen&imagen='.$i->id.'&producto='.$i->producto?>">eliminar</a>
    </div>
<?php endforeach;
?>
<br>
<form enctype="multipart/form-data" action="" method="POST">
    <input name="producto" value="<?= $producto?>" type="text">
    <input id="demo1" name="imagen[]" type="file" class="multi" accept="gif|jpg|png" maxlength="3" />
    <div id="demo1-list"></div>
    <p><input type="submit" name="upload" value="subir"/></p>
</form>

</body>
</html>