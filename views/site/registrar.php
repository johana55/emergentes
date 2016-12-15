<?php
include 'views/layout/cliente/head.php';
?>

<div class="container" id="productos">
<h2>Registro de Cliente</h2>
<form class="form-horizontal" action="" method="post">

    <div class="form-group">
        <label for="nombre" class="col-sm-2 control-label" >Nombre de Usuario</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="nombre" id="nombre" placeholder="username">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Contraseña:</label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" id="password" name="password" placeholder="Describe el Producto">
        </div>
    </div>
    <input value="0" type="number" name="tipo">
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Correo Electronico:</label>
        <div class="col-sm-10">
            <input type="email" required class="form-control" name="email" placeholder="nombre@dominio.com">
        </div>
    </div>
    <select name="rol" >
        <option value="3">CLIENTE</option>
    </select>

    <div class="form-group">
        <label for="fecha" class="col-sm-2 control-label">Creado:</label>
        <div class="col-sm-10">
            <input type="date" required class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-warning btn-lg btn-block">Registrar</button>
        </div>
    </div>
</form>
<?php
include 'views/layout/cliente/foot.php';
?>