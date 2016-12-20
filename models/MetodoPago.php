<?php


class MetodoPago extends Model
{
    public $id;
    public $descripcion;

    const table ='metodo_pago';

    public static function all()
    {
        $db = SPDO::singleton();
        $sql = 'SELECT * FROM '.self::table;
        $query = $db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'MetodoPago');
    }
}