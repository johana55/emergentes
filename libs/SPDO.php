<?php

/**
 * Created by PhpStorm.
 * User: USUARIO
 * Date: 6/18/2016
 * Time: 00:48
 */
class SPDO extends PDO
{
    private static $instance = null;

    public function __construct()
    {
        // instanciamos la clase singleton de configuraciones
        $config = Config::singleton();

        // llamamos al contructor padre
       // configuracion para conexion a postgresql
        try {
            parent::__construct(
                'pgsql:host=' . $config->get('dbhost') . ';dbname=' . $config->get('dbname'),
                $config->get('dbuser'),
                $config->get('dbpass')
            );
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }

       /*Configuracion para conexion a mysql
        *  parent::__construct(
            'mysql:host=' . $config->get('dbhost') . ';dbname=' . $config->get('dbname'),
            $config->get('dbuser'),
            $config->get('dbpass')
        );
       */
    }

    public static function singleton()
    {
        if(is_null(self::$instance))
            self::$instance = new SPDO();

        return self::$instance;
    }
}