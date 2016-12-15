<?php

require 'models/Cliente.php';
require 'models/Catalogo.php';
require 'models/Producto.php';
require 'models/ProductoC.php';
class SiteController extends Controller
{
    public function indexAction()
    {
        $productos = new ProductoC();
        $productos = $productos->catalogoActivo();
        $parametros = ['productos'=> $productos,];

        $this->view->show('site/inicio', $parametros);
    }


    public function loginAction()
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $user = User::singleton();

            if( $user->login($_POST['username'],$_POST['password']))
            {
                header('Location: index.php?controller=Site&action=index');
            }
        }else {

            $this->view->show('site/login');
        }
    }
    public function logoutAction()
    {
        $user = User::singleton();
        $user::logout();
        header('Location: index.php?controller=Site&action=index');
    }

    public function detailAction()
    {
        echo $_GET['id'];
        $this->view->show('site/detail');
    }
    public function registrarAction()
    {
        if(!empty($_POST))
        {

            $usuario= new Usuario();

            $usuario->nombre_usuario=$_POST['nombre'];
            $usuario->password=$_POST['password'];
            $usuario->tipo=$_POST['tipo'];
            $usuario->email=$_POST['email'];
            $usuario->id_rol=$_POST['rol'];
            $id_usuario=$usuario->crear();
            if(!empty($id_usuario) and !is_null($id_usuario))
            {
                $cliente= new Cliente();
                $cliente->id=$id_usuario;
                $cliente->fechacreado=$_POST['fecha'];

                $cliente->crear();
                header('Location: index.php?controller=Site&action=index');
            }
            else
            {
                header('Location: index.php?controller=Site&action=index');

            }
        }else

            return $this->view->show('site/registrar',[]);

    }
    public function salirAction()
    {
        User::logout();
        header('Location: index.php?controller=Site&action=index');
    }
}