<?php


class SiteController extends Controller
{
    public function indexAction()
    {
        $mensaje = 'Mensaje enviado desde el controlador';
        $parametros = ['mensaje' => $mensaje,'usuario' =>  User::singleton(),'modulos'=> User::singleton()->modulos()];

        // mostramos la vista
        $this->view->show('site/inicio', $parametros);
    }


    public function loginAction()
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $user = User::singleton();

            if( $user->login($_POST['username'],$_POST['password']))
            {
                header('Location: index.php?controller=Pedido&action=index');
            }
        }else {

            $this->view->show('site/login');
        }
    }
    public function logoutAction()
    {
        $user = User::singleton();
        $user::logout();
        header('Location: inicio.php?controller=Site&action=index');
    }
}