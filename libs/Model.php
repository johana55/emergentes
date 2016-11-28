<?php

/**
 * Created by PhpStorm.
 * User: USUARIO
 * Date: 6/18/2016
 * Time: 01:59
 */
abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new SPDO();

    }
}