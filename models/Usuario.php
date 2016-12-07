<?php
require 'models/Rol.php';

class Usuario extends Model
{
    public $id;
    public $nombre_usuario;
    public $password;
    public $tipo;
    public $email;
    public $id_rol;
    const table='usuario';
    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Usuario');
    }
    public function rol()
    {
        $sql = 'SELECT * FROM '.'rol ';
        $sql .= ' where id = ?';
        $params = [$this->id_rol];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Rol');
        return $query->fetch();
    }
    public function editar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $sql.=' where id= ?';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Usuario');
        return $query->fetch();
    }
    public function crear()
    {
        $sql = 'INSERT INTO usuario';
        $sql .= ' (nombre_usuario,password,tipo,email,id_rol)';
        $sql .= ' VALUES(?,?,?,?,?)';
        $params = [$this->nombre_usuario,$this->password,$this->tipo,$this->email,$this->id_rol];
        $query = $this->db->prepare($sql);

        if($query->execute($params))
            return $this->db->lastInsertId();
        else
            return null;

    }

}