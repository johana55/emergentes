
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <?= isset($head)? $head : '' ?>
</head>
<style>
    .navbar-inverse{background-color: purple;border-color: purple}

    .cuerpo{margin-left: 1%;border-style: none none none solid ; border-color: #00bcd4;}
    .pie{ background-color: #79b5af ;font-style: inherit}
</style>
<body>

<nav class="navbar navbar-inverse" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">VentasOnline</a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul  class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart"></span> PEDIDOS <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li ><a href="<?= $config->get('urlBase').'?controller=Pedido&action=index'?>">Pendientes</a></li>
                        <li ><a href="#">Historial</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-thumbs-up"></span> PUBLICIDAD <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li ><a href="<?= $config->get('urlBase').'?controller=Catalogo&action=index'?>">Catalogos</a></li>
                        <li ><a href="<?= $config->get('urlBase').'?controller=Producto&action=index'?>">Productos</a></li>
                        <li ><a href="<?= $config->get('urlBase').'?controller=Marca&action=index'?>">Marcas</a></li>
                        <li ><a href="<?= $config->get('urlBase').'?controller=Imagen&action=index'?>">Imagenes</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-thumbs-up"></span> USUARIOS <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li ><a href="<?= $config->get('urlBase').'?controller=Empleado&action=index'?>">Empleados</a></li>
                        <li ><a href="<?= $config->get('urlBase').'?controller=Cliente&action=index'?>">Clientes</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-briefcase"></span> CONFIG <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                    </ul>
                </li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-unchecked"></span> <?= User::singleton()->username ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Ver Perfil</a></li>

                        <li role="separator" class="divider"></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Mi cuenta</a></li>
                        <li><a href="<?= $config->get('urlBase')?>?controller=Site&action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container cuerpo" >
