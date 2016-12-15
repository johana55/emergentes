<?php


class Marca extends Model
{
    public $id;
    public $descripcion;

    const table='marca';
    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Marca');
    }
    public function buscar($id)
    {
        $this->id=$id;
        $sql = 'SELECT * FROM '.self::table;
        $sql.=' where id= ?';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Marca');
        return $query->fetch();
    }
    public function update()
    {

        try {
            $sql = 'UPDATE marca SET descripcion=?';
            $sql .= ' WHERE id=?';
            $params = [$this->descripcion, $this->id];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);

        }catch ( PDOException $e)
        {
            return false;
        }
    }
    public function save()
    {

        try {

            $sql = 'INSERT INTO marca (descripcion)';
            $sql .= ' VALUES (?)';
            $params = [ $this->descripcion];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);

        }catch ( PDOException $e)
        {
            return false;
        }
    }
    public function eliminar($id){
        try {

            $sql = 'delete from marca';
            $sql .= ' where id=?';
            $params = [ $id];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);

        }catch ( PDOException $e)
        {
            return false;
        }
    }
}