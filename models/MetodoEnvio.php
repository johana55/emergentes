<?php


class MetodoEnvio extends Model
{
    public $id;
    public $descripcion;
    public $monto;

    const table ='metodo_envio';

    public static function all()
    {
        $db = SPDO::singleton();
        $sql = 'SELECT * FROM '.self::table;
        $query = $db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'MetodoEnvio');
    }

}