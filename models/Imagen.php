<?php

class Imagen extends Model
{
    public $id;
    public $url;
    public $producto;

    const table='imagen';

    //esta accion busca todas las imagenes que pertenecen al un producto
    //el nombre no concuerda
    public function buscar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $sql .= ' where producto = ?';
        $params = [$this->producto];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Imagen');
    }
    public function ultimoId()
    {
        $sql = 'SELECT max(id) FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_COLUMN);
    }
    public function crear()
    {
        $sql = 'INSERT INTO '.self::table;
        $sql .= ' (id,url,producto)';
        $sql .= ' VALUES(?,?,?)';
        $params = [$this->id,$this->url,$this->producto];
        $query = $this->db->prepare($sql);
        if($query->execute($params))
            return $this->db->lastInsertId();
        else
            return null;

    }
    //devuelve una imagen con el id y el producto indicado
    public function buscarImagen($id)
    {
        $sql = 'SELECT * FROM '.self::table;
        $sql .= ' where id = ?';
        $params = [$id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Imagen');
        return $query->fetch();
    }
    public function eliminar()
    {
        $sql = 'DELETE FROM '.self::table;
        $sql .= ' WHERE id='.$this->id;
        $query = $this->db->prepare($sql);
        return  $query->execute();
    }
}