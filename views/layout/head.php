<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" href="assets/css/w3-theme-teal.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</head>
<style>
    .w3-sidenav a {padding:16px}
    .navimg {float:left;width:33.33% !important}
</style>
<body>

<nav class="w3-sidenav w3-collapse w3-white w3-animate-left w3-large" style="z-index:3;width:200px;" id="mySidenav">

    <ul class="w3-navbar w3-black w3-center">
        <li class="navimg">
            <a href="javascript:void(0)" onclick="openNav('nav01')">
                Payment</a></li>
        <li class="navimg">
            <a href="javascript:void(0)" onclick="openNav('nav02')">
                Publish</a></li>
        <li class="navimg">
            <a href="javascript:void(0)" onclick="openNav('nav03')">
                Config</a>
        </li>
    </ul>

<!--    modulo de pedidos -->
    <div id="nav01">
        <ul class="w3-ul w3-large">
            <li class="w3-padding-16"><a href="<?= $config->get('urlBase').'?controller=Pedido&action=inicio'?>">Pendientes</a></li>
            <li class="w3-padding-16"><a href="#">Historial</a></li>
        </ul>
    </div>

<!--    modulo de publicidad-->
    <div id="nav02">
        <!-- <a target="_blank" href="tryw3css_templates_black.htm"><img src="img_demo_black.png" style="width:100%;"></a>-->
        <ul class="w3-ul w3-large">
            <li class="w3-padding-16"><a href="#">Catalogo</a></li>
            <li class="w3-padding-16"><a href="<?= $config->get('urlBase').'?controller=Producto&action=index'?>">Productos</a></li>
            <li class="w3-padding-16"><a href="#">Clientes</a></li>
            <li class="w3-padding-16"><a href="<?= $config->get('urlBase').'?controller=Imagen&action=index'?>">Imagenes</a></li>

        </ul>
    </div>
<!--modulo de config-->
    <div id="nav03">

        <ul class="w3-ul w3-large">
            <li class="w3-padding-16"><a href="#">Pagina 1</a></li>
            <li class="w3-padding-16"><a href="#">Pagina 2</a></li>
        </ul>
    </div>


</nav>
<div class="w3-main" style="margin-left:200px;">

    <div id="myTop" class="w3-top w3-container w3-padding-16 w3-theme w3-large w3-hide-large">
        <a href="#">login</a>
    </div>

    <header class="w3-container w3-theme w3-center">
        <h1 class="w3-xxxlarge w3-padding-16">Ventas Online</h1>
    </header>

    <div class="w3-container w3-padding-large w3-section w3-light-grey">