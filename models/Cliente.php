<?php


class Cliente
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
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Empleado');
    }
}