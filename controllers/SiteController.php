<?php
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

            header('Location: index.php?controller=Cliente&action=create');

    }
}