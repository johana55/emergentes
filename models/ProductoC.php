<?php

class ProductoC extends Model
{
    public $id;
    public $nombre;
    public $precio;
    public $stock;
    public $catalogo;
    public $show;
    public $producto;

    const table='producto_catalogo';
    public function listar($q)
    {
        $sql = 'SELECT pc.id,p.id as producto,p.nombre,p.marca,pc.precio,pc.stock,pc.show,c.id as catalogo
                FROM producto_catalogo pc, catalogo c, producto p
                WHERE p.id=pc.producto and pc.catalogo='.$this->catalogo.' '.$q;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoC');
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
        $sql = 'SELECT p.nombre,p.id,p.precio_compra,p.unidad_medida,p.marca
                from  producto p
                WHERE p.id Not IN (SELECT producto 
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
}