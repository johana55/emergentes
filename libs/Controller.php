<?php

/**
 * Created by PhpStorm.
 * User: USUARIO
 * Date: 6/18/2016
 * Time: 01:57
 */
abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
}