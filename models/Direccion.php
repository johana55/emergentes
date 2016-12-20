<?php
require 'models/Departamento.php';

class Direccion extends Model
{
    public $id;
    public $direccion;
    public $departamento;
    public $localidad;

    public function departamento()
    {
        $sql = 'SELECT * FROM '.'departamento ';
        $sql .= ' where id = ?';
        $params = [$this->departamento];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Departamento');
        return $query->fetch();
    }


}