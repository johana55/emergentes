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

    public function producto()
    {
        $sql = 'SELECT p.*';
        $sql .= ' FROM producto p, producto_catalogo pc';
        $sql .= ' WHERE  pc.producto = p.id and pc.catalogo = ? and pc.producto=? ';
        $params = [$this->catalogo,$this->producto];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Producto');
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
        $params = [$this->producto,$this->catalogo,$this->precio,$this->stock,$this->show];
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

    public function buscar()
    {
        $sql = 'SELECT  pc.*';
        $sql .= ' from producto_catalogo pc';
        $sql .= ' WHERE  pc.id=?';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoC');
        return $query->fetch();
    }

    public function actualizar()
    {
        $sql = 'UPDATE producto_catalogo SET precio=?,stock=?,show=?';
        $sql .= ' WHERE id=?';
        $params = [$this->precio, $this->stock,$this->show, $this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return ($query->rowCount() != 0);
    }

    public function catalogoActivo()
    {
        $sql  ='SELECT pc.* ';
        $sql .=' FROM  catalogo c,producto_catalogo pc ';
        $sql .= ' where  c.show=1 and pc.catalogo=c.id and pc.show=TRUE';
        $query = $this->db->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoC');
        return $query->fetchAll();
    }
}