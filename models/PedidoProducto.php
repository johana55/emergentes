<?php

require 'models/ProductoC.php';
class PedidoProducto extends Model
{
    public $pedido;
    public $producto;
    public $cantidad;

    public function productoc()
    {
        $sql = 'SELECT * FROM producto_catalogo ';
        $sql .= ' where id = ?';
        $params = [$this->producto];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoC');
        return $query->fetch();
    }


}