<?php

require 'models/Cliente.php';
require 'models/PedidoProducto.php';


class Pedido extends Model
{
    public $id;
    public $cliente;
    public $direccion;
    public $metodo_envio;
    public $metodo_pago;
    public $horafecha;
    public $total;
    public $iva;
    public $estado;

    public static function obtenerPedido()
    {

        $user= User::singleton();
        $db = SPDO::singleton();


        $sql = 'select  p.*';
        $sql .= ' from pedido p, cliente c, usuario u ';
        $sql .= ' WHERE  u.tipo=0 and u.id=c.id and p.cliente= c.id and u.id=? and estado= 0';
        $params = [$user->getID()];
        $query = $db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Pedido');
        $pedido = $query->fetch();

        echo 'hola';
        echo '<pre>';
        print_r($pedido);
        echo '</pre>';

        if(empty($pedido))
        {
            $cliente = Cliente::find($user->getID());
            $sql = 'insert into pedido (cliente,direccion,metodo_envio,metodo_pago,horafecha,total,iva,estado)';
            $sql .= ' VALUES (?,?,1,1,now(),0,0.13,0)';
            $params = [$cliente->id,$cliente->direccion];
            $query = $db->prepare($sql);
            $query->execute($params);



            $sql = 'select  p.*';
            $sql .= ' from pedido p, cliente c, usuario u ';
            $sql .= ' WHERE  u.tipo=0 and u.id=c.id and p.cliente= c.id and u.id=? and estado= 0';
            $params = [$user->getID()];
            $query = $db->prepare($sql);
            $query->execute($params);
            $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Pedido');
            $pedido = $query->fetch();

        }

        return $pedido;
    }

    public static function misPedidos()
    {
        $user= User::singleton();
        $db = SPDO::singleton();


        $sql = 'select  p.*';
        $sql .= ' from pedido p, cliente c, usuario u ';
        $sql .= ' WHERE  u.tipo=0 and u.id=c.id and p.cliente= c.id and u.id=? ';
        $params = [$user->getID()];
        $query = $db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Pedido');
        return $query->fetchAll();
    }

    public function addProducto($id_producto, $cantidad)
    {
        $sql = ' select count(*) as cantidad ';
        $sql .= ' FROM pedido_producto pp ';
        $sql .= 'where pp.producto=? and pp.pedido=?';
        $params = [$id_producto,$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $fila = $query->fetch(PDO::FETCH_OBJ);

        if($fila->cantidad == 0)
        {

            $sql ='INSERT INTO pedido_producto (pedido, producto, cantidad) VALUES (?,?,?)';
            $params = [$this->id,$id_producto,$cantidad];
            $query = $this->db->prepare($sql);
            $query->execute($params);

            $this->actualizar();
        }else
        {
            $sql =' UPDATE pedido_producto set cantidad = ?';
            $sql .= 'where producto = ? and pedido= ?';
            $params = [$cantidad,$id_producto,$this->id];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            $this->actualizar();

        }



    }

    public function actualizar()
    {
        $sql ='SELECT SUM(pp.cantidad*pc.precio) as subtotal';
        $sql .= ' from pedido_producto pp, producto_catalogo pc ';
        $sql .= ' where pp.pedido= ?  and pp.producto=pc.id';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $fila = $query->fetch(PDO::FETCH_OBJ);

        if(!empty($fila))
        {
            $sql ='UPDATE pedido set total = ? where id =?';
            $params = [empty($fila->subtotal) ? 0: $fila->subtotal ,$this->id];
            $query = $this->db->prepare($sql);
            $query->execute($params);
        }
    }

    public function pedidoProducto()
    {
        $sql = 'SELECT * FROM pedido_producto where pedido=?';
        $query = $this->db->prepare($sql);
        $params = [$this->id];
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'PedidoProducto');
    }

    public function deleteProducto( $producto)
    {

            $sql ='DELETE FROM pedido_producto pp WHERE pp.pedido=? and pp.producto=?';
            $params = [$this->id,$producto];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            $this->actualizar();
    }

    public function metodo_pago()
    {
        $sql = 'SELECT * FROM '.'metodo_pago ';
        $sql .= ' where id = ?';
        $params = [$this->metodo_pago];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'MetodoPago');
        return $query->fetch();
    }
    public function metodo_envio()
    {
        $sql = 'SELECT * FROM '.'metodo_envio ';
        $sql .= ' where id = ?';
        $params = [$this->metodo_envio];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'MetodoEnvio');
        return $query->fetch();
    }

    public function direccion()
    {
        $sql = 'SELECT * FROM '.' direccion ';
        $sql .= ' where id = ?';
        $params = [$this->direccion];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Direccion');
        return $query->fetch();
    }

    public function guardar()
    {
        $sql ='UPDATE pedido set estado = ? where id =?';
        $params = [2 ,$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
    }

    public function estado()
    {
        $valor = 'Sin Estado';
        switch ($this->estado)
        {
            case 1:
                $valor='Solicitado';
                break;
            case 2:
                $valor='Pagado';
                break;
            case 3:
                $valor='Enviado';
                break;

            default :
                $valor = 'Nuevo';
                break;
        }
        return $valor;
    }
}