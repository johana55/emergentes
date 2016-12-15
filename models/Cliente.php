<?php

require 'models/Usuario.php';
class Cliente extends Model
{
    public $id;
    public $fechacreado;
    public $prospecto;

    const table='cliente';
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

}