<?php


class User  extends Model
{
    private $id;
    public $username;
    public $email;

    private static $instance = null;


    public function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION)) { session_start(); }

        if (!$this->load($_SESSION['id']))
        {
            $this->id = null;
        }
    }

    private function load($id)
    {
        $validador = false;

        if(isset($_SESSION['id']))
        {
            $sql = 'SELECT * FROM usuario u ';
            $sql .= 'where u.id = ?';
            $query = $this->db->prepare($sql);
            $query->execute([$id]);
            if($result = $query->fetch(PDO::FETCH_OBJ))
            {
                $this->id = $result->id;
                $this->username = $result->nombre_usuario;
                $this->email = $result->email;

                $validador =true;
            }
        }
            return $validador;

    }

    public static function singleton()
    {
        if(is_null(self::$instance))
            self::$instance = new User();

        return self::$instance;
    }


    public function isGuest()
    {
        return !isset($this->id);
    }

    public function rol()
    {

        $sql = 'SELECT r.nombre FROM usuario u, rol r ';
        $sql .= 'where u.id_rol = r.id and u.id = ?';
        $query = $this->db->prepare($sql);
        $query->execute([$this->id]);
        if($result = $query->fetch(PDO::FETCH_OBJ))
        {
            return $result->nombre;
        }else
        {
            return 'SIN ROL';
        }
    }

    public function login( $username, $password)
    {
        $sql = 'select * from usuario  where ';
        $sql .= ' nombre_usuario = ? and password = ? ';
        $params = [$username,$password];
        $query = $this->db->prepare($sql);
        $query->execute($params);

        if($user = $query->fetch(PDO::FETCH_OBJ))
        {
            $_SESSION['id'] = $user->id;
            return true;
        }
        return false;
    }

    public static function logout()
    {
        if (!isset($_SESSION)) { session_start(); }
        unset($_SESSION['id']);
    }

}