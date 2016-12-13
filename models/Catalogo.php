<?php
class Catalogo extends Model
{
    public $id;
    public $descripcion;
    public $fechainicio;
    public $fechafin;
    public $nombre;
    public $show;

    const table='catalogo';
    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Catalogo');
    }
    public function crear()
    {
        $sql = 'INSERT INTO '.self::table;
        $sql .= ' (descripcion,fechainicio,fechafin,nombre,show)';
        $sql .= ' VALUES(?,?,?,?,?)';
        $params = [$this->descripcion,$this->fechainicio->format('Y-m-d H:i'),$this->fechafin->format('Y-m-d H:i'),$this->nombre,$this->show];
        $query = $this->db->prepare($sql);
        $query->execute($params);
    }

    public function buscar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $sql.=' where id= ?';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Catalogo');
        return $query->fetch();
    }
    public function actualizar()
    {
        $sql = 'UPDATE catalogo SET ';
        $sql .= 'descripcion=?, fechainicio=?, fechafin=?, nombre=? ';
        $sql .= ' WHERE id=?';
        $params = [
            $this->descripcion,
            $this->fechainicio->format('Y-m-d H:i'),
            $this->fechafin->format('Y-m-d H:i'),
            $this->nombre,
             $this->id
        ];
        $query = $this->db->prepare($sql);
        return $query->execute($params);
    }

    public function deshabilitar()
    {
        $sql = 'UPDATE catalogo SET ';
        $sql .= 'show=?';
        $sql .= ' WHERE id=?';
        $params = [
            0,
            $this->id
        ];
        $query = $this->db->prepare($sql);
        return $query->execute($params);
    }

    public function habilitar()
    {
        $sql = 'SELECT * FROM '.self::table.' WHERE show = 1';
        $query = $this->db->prepare($sql);
        $query->execute();
        $catalogos = $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Catalogo');

        foreach ($catalogos as $c)
        {
            $c->deshabilitar();
        }

        $sql = 'UPDATE catalogo SET ';
        $sql .= 'show=?';
        $sql .= ' WHERE id=?';
        $params = [
            1,
            $this->id
        ];
        $query = $this->db->prepare($sql);
        return $query->execute($params);
    }

}