<?php

class Empleado extends Model
{

    public $id;
    public $domicilio;
    const table='empleado';
    public function listar()
    {
         $sql = 'SELECT * FROM '.self::table;
         $query = $this->db->prepare($sql);
         $query->execute();
         return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Empleado');
    }
    public function crear()
    {
        $sql = 'INSERT INTO '.self::table;
        $sql .= ' (domicilio)';
        $sql .= ' VALUES(?)';
        $params = [$this->domicilio];
        $query = $this->db->prepare($sql);
        return $query->execute($params);

    }
    public function marca()
    {
        $sql = 'SELECT * FROM '.'rol ';
        $sql .= ' where id = ?';
        $params = [$this->marca];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Marca');
        return $query->fetch();
    }
}