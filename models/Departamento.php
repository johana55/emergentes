<?php

require 'models/Pais.php';
class Departamento extends Model
{
    public $id;
    public $nombre;
    public $pais;

    const table= 'departamento';

    public function pais()
    {
        $sql = 'SELECT * FROM '.'pais ';
        $sql .= ' where id = ?';
        $params = [$this->pais];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Pais');
        return $query->fetch();
    }
}