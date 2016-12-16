
<?php
/**
 * Archivo de configuracion global
 */
// instanciamos la clase singleton
$config = Config::singleton();

// parametros de configuracion para el mvc
$config->set('controllers', 'controllers/');
$config->set('views', 'views/');
$config->set('models', 'models/');



$config->set('dbhost', '200.87.51.3');
$config->set('dbname', 'db_grupo03');
$config->set('dbuser', 'grupo03');
$config->set('dbport','5432');
$config->set('dbpass', 'grupo03grupo03');

$config->set('dbname', 'db_grupo03');
/* //parametros de configuracion para la db

$config->set('dbhost', 'localhost');
$config->set('dbname', 'db_grupo03');
$config->set('dbuser', 'postgres');
$config->set('dbport','5432');
$config->set('dbpass', 'root');
*/
// datos de aplicacion

$config->set('urlBase',"http://localhost/emergentes/index.php");
$config->set('imagenes','images/');


// /home/grupo03/agenda/pc_login.php


$config->set('aplication_name','Sistema de Comercio Electronico');