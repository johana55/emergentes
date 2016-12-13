<?php

class ProductoC extends Model
{
    public $id;
    public $precio;
    public $stock;
    public $catalogo;
    public $show;
    public $producto;

    const table='producto_catalogo';

    public function listar()
    {
        $sql = "SELECT pc.*
                FROM producto_catalogo pc 
                WHERE pc.catalogo = $this->catalogo";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoC');
    }

    public function productos()
    {
        $sql = 'SELECT p.*';
        $sql .= ' FROM producto p, producto_catalogo pc';
        $sql .= ' WHERE  pc.producto = p.id and pc.catalogo = ? ';
        $params = [$this->producto];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Producto');
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
    public function eliminar()
    {
        $sql = 'DELETE FROM '.self::table.' where producto='.$this->producto.' and catalogo='.$this->catalogo;
        $query = $this->db->prepare($sql);
        return $query->execute();
    }
    public function listarOtros()
    {
        $sql = 'SELECT p.*
                from  producto p
                WHERE p.id Not IN (SELECT pc.producto 
                                   from producto_catalogo pc  where pc.catalogo='.$this->catalogo.');';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Producto');
    }
    public function insertar()
    {
        $sql = 'INSERT INTO '.self::table;
        $sql .= ' (producto,catalogo,precio,stock,show)';
        $sql .= ' VALUES(?,?,?,?,?)';
        $params = [$this->producto,$this->catalogo,0,0,0];
        $query = $this->db->prepare($sql);
        $query->execute($params);
    }

    public function buscarOtrosProductos($q)
    {

         $sql = 'SELECT p.id,p.nombre,p.descripcion,p.precio_compra,um.abreviatura as unidad_medida,ma.descripcion as marca,ca.descripcion as categoria
from  producto p,unidad_medida um,marca ma, categoria ca
WHERE p.marca=ma.id AND p.unidad_medida=um.id AND p.categoria=ca.id AND p.id Not IN (SELECT pc.producto
                                                                                     from producto_catalogo pc  where pc.catalogo='.$this->catalogo.') and  lower(p.nombre) LIKE lower(\'%'.$q.'%\')';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Producto');
    }
}