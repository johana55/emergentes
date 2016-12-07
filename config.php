
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

// parametros de configuracion para la db
//$config->set('dbhost', '200.87.51.3');
//$config->set('dbuser', 'grupo03');
//$config->set('dbport','5432');
//$config->set('dbpass', 'grupo03grupo03');


$config->set('dbhost', 'localhost');
$config->set('dbname', 'db_grupo03');
$config->set('dbuser', 'postgres');
$config->set('dbport','5432');
$config->set('dbpass', 'root');

// datos de aplicacion
$config->set('urlBase',"http://localhost/emergentes/index.php");
$config->set('productos','images/productos/');
$config->set('maxImagesProductos',3);

