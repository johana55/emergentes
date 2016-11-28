<?php


class SiteController extends Controller
{
    /**
     * Accion que realiza algo
     * y lanza una vista con los resultados
     */
    public function inicioAction()
    {
        $mensaje = 'Mensaje enviado desde el controlador';

        $parametros = ['mensaje' => $mensaje,'usuario' =>  User::singleton()];



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
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/index.php?controller=site&action=inicio');
            }
        }

        // mostramos la vista
        $this->view->show('site/login');
    }

}