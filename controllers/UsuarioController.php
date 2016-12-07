<?php
require 'models/Usuario.php';
require 'models/Empleado.php';

class UsuarioController extends Controller
{
    public function indexAction()
    {
        $model = new Usuario();
        $usuarios = $model->listar();
        return $this->view->show('usuario/index',['usuarios' => $usuarios]);
    }
    public function crearAction()
    {
        if (!empty($_POST['empleado'])) {
            $usuario = new Usuario();
            $usuario->nombre_usuario = $_POST['nombre_usuario'];
            $usuario->email = $_POST['email'];
            $usuario->id_rol = $_POST['rol'];
            $usuario->password = $_POST['password'];
            $tipo = $_POST['tipo'];
            $usuario->tipo = $tipo;
            $id_usuario = $usuario->crear();

            if (!is_null($id_usuario)) {

                if ($tipo == 'EMPLEADO') {
                    $usuario->tipo = 1;
                    $persona = new Empleado();
                    $persona->domicilio = $_POST['domicilio'];

                    $persona->crear();
                } else {
                    $usuario->tipo = 2;
                    $persona = new Cliente();
                    $persona->crear();
                }
                header('Location: index.php?controller=Empleado&action=index');

            }
        }

        $rol= new Rol();
        $roles=$rol->listar();
        return $this->view->show( 'usuario/crear',['roles'=>$roles]);

    }
    public function editarAction()
    {
        if(!empty($_POST['usuario']))
        {

        }
        if(!empty($_GET['id']) and is_numeric($_GET['id']) )
        {
            $model = new Usuario();
            $model->id=$_GET['id'];
            $usuario = $model->editar();
            return $this->view->show('usuario/editar',['u' => $usuario]);
        }

    }
    public function eliminarAction()
    {

    }


}