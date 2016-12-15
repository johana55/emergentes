<?php

require 'models/Cliente.php';

class ClienteController extends Controller
{
    public function indexAction()
    {
        $model= new Cliente();
        $clientes= $model->listar();
        return $this->view->show('cliente/index',['clientes'=>$clientes]);
    }
    public function createAction(){

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
                header('Location: index.php?controller=Cliente&action=index');
            }
            else
            {
                header('Location: index.php?controller=Cliente&action=index');

            }
        }else

        return $this->view->show('cliente/create',[]);

    }
    public function editarAction()
    {

    }
}