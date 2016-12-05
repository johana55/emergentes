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
        $params = [$this->descripcion,$this->fechainicio,$this->fechafin,$this->nombre,$this->show];
        $query = $this->db->prepare($sql);
        $query->execute($params);
    }
    public function editar()
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
        $sql = 'UPDATE Catalogo SET ';
        $sql .= 'descripcion=:descripcion, fechainicio=:fechainicio, fechafin=:fechafin, nombre=:nombre, show=:show';
        $sql .= ' WHERE id=:id';
        $params = [
            'id' => $this->id,
            'descripcion' => $this->descripcion,
            'fechainicio'=>$this->fechainicio,
            'fechafin'=>$this->fechafin,
            'nombre'=>$this->nombre,
            'show'=>$this->show
        ];
        $query = $this->db->prepare($sql);
        return $query->execute($params);
    }
}