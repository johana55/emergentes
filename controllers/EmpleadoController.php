<?php
require 'models/Usuario.php';
require 'models/Empleado.php';


class EmpleadoController extends Controller
{

    public function indexAction()
    {
        $model = new Empleado();
        $empleados = $model->listar();
        return $this->view->show('empleado/index',['empleados' => $empleados]);
    }

    public function createAction()
   {
       if(!empty($_POST['empleado']))
       {
           $usuario = new Usuario();
           $usuario->nombre_usuario = $_POST['nombre_usuario'];
           $usuario->email = $_POST['email'];
           $usuario->id_rol = $_POST['rol'];
           $usuario->password = $_POST['password'];

           $usuario->tipo =1;
           $id_usuario = $usuario->crear();

           if(!is_null($id_usuario))
           {
               $empleado= new Empleado();
               $empleado->id=$_POST['id'];
               $empleado->domicilio=$_POST['domicilio'];
               if($empleado->crear())
               {
                   header('Location: index.php?controller=Empleado&action=index');
               }
           }

       }
       $rol= new Rol();
       $roles=$rol->listar();
       return $this->view->show( 'empleado/crear',['roles'=>$roles]);
   }

}