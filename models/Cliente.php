<?php

require 'models/Usuario.php';
require 'models/Direccion.php';
class Cliente extends Model
{
    public $id;
    public $nombres;
    public $apellidos;
    public $direccion;
    public $telefono;
    public $nit;

    const table='cliente';


    public static function find($id)
    {
        $db = SPDO::singleton();
        $sql = 'SELECT * FROM '.self::table.' where id=?';
        $query = $db->prepare($sql);
        $params = [$id];
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Cliente');
        return $query->fetch();
    }
    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Cliente');
    }
    public function usuario()
    {
        $sql = 'SELECT * FROM usuario';
        $sql .= ' where id = ?';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Usuario');
        return $query->fetch();
    }
    public function crear()
    {
        $sql = 'INSERT INTO cliente';
        $sql .= ' (id,fechacreado,prospecto)';
        $sql .= ' VALUES(?,?,?)';
        $params = [$this->id,$this->fechacreado,null];
        $query = $this->db->prepare($sql);

        if($query->execute($params))
            return $this->db->lastInsertId();
        else
            return null;

    }


    public function direccion()
    {
        $sql = 'SELECT * FROM '.'direccion ';
        $sql .= ' where id = ?';
        $params = [$this->direccion];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Direccion');
        return $query->fetch();
    }
}