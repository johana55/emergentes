<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Site</title>
</head>
<body>

<h3>Inicio de Site</h3>

<p>Bienvenidos a php con mvc!</p>
<a href="<?= $_SERVER['PHP_SELF']?>?controller=Site&action=login">login</a>
<a href="<?= $_SERVER['PHP_SELF']?>?controller=Site&action=logout">logout</a>
<h1>Usuario que a iniciado sesion : <p><?= $usuario->username ?></p></h1>
<?php  foreach ($modulos as $m):?>
    <p> <?= $m->modulos; ?></p>

<?php endforeach;?>


</body>
</html>