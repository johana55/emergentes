<?php

class UnidadMedida extends Model
{
    public $id;
    public $abreviatura;
    public $descripcion;

    const table='unidad_medida';
    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'UnidadMedida');
    }
}