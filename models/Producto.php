<?php
require 'models/UnidadMedida.php';
require 'models/Marca.php';
require 'models/Categoria.php';

class Producto extends Model
{
    public $id;
    public $nombre;
    public $descripcion;
    public $precio_compra;
    public $unidad_medida;
    public $marca;
    public $categoria;

    const table='producto';


    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Producto');
    }
    public function unidad_medida()
    {
        $sql = 'SELECT * FROM '.'unidad_medida ';
        $sql .= ' where id = ?';
        $params = [$this->unidad_medida];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'UnidadMedida');
        return $query->fetch();
    }
    public function marca()
    {
        $sql = 'SELECT * FROM '.'marca ';
        $sql .= ' where id = ?';
        $params = [$this->marca];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Marca');
        return $query->fetch();
    }
    public function categoria()
    {
        $sql = 'SELECT * FROM  categoria ';
        $sql .= ' where id = ?';
        $params = [$this->categoria];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria');
        return $query->fetch();
    }



    public function buscar($id)
    {
        $this->id=$id;
        $sql = 'SELECT * FROM '.self::table;
        $sql.=' where id= ?';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Producto');
        return $query->fetch();
    }

    public function save()
    {

        try {

            $sql = 'INSERT INTO producto (nombre,descripcion,precio_compra,unidad_medida,marca,categoria)';
            $sql .= ' VALUES (?,?,?,?,?,?)';
            $params = [$this->nombre, $this->descripcion, $this->precio_compra, $this->unidad_medida, $this->marca, $this->categoria];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);

        }catch ( PDOException $e)
        {
            return false;
        }
    }

    public function update()
    {

       try {
            $sql = 'UPDATE producto SET nombre=?, descripcion=?,precio_compra=?,unidad_medida=?,marca=?,categoria=?';
            $sql .= ' WHERE id=?';
            $params = [$this->nombre, $this->descripcion, $this->precio_compra, $this->unidad_medida, $this->marca, $this->categoria,$this->id];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);

        }catch ( PDOException $e)
        {
            return false;
        }
    }


}