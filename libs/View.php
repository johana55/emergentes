<?php

/**
 * Modor generador de plantillas para la vista
 */
class View
{
    public static function show($view, $vars = [])
    {
        // 1.- instanciamos la clase singleton de configuraciones
        $config = Config::singleton();

        // 2.- armamos la ruta de la plantilla para la vista y verificamos si existe,
        //      de lo contrario disparamos un trigger de error
        $viewPath = $config->get('views') . $view . '.php';

        if (!file_exists($viewPath)) {
            trigger_error('La plantilla '.$view.' no existe.', E_USER_NOTICE);
            return false;
        }

        // 3.- si hay datos para mostrar, pasamos una por una
        if(is_array($vars))
            foreach ($vars as $key => $value) {
                $$key = $value;
            }

        // 4.- si todo esta bien lanzamos la vista
        include $viewPath;

    }
}