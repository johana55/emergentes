<?php
require 'models/Producto.php';

class ProductoController extends Controller
{
    public function indexAction()
    {
        $model = new Producto();
        $productos = $model->listar();

        return $this->view->show('producto/index',['productos' => $productos]);
    }
    public function createAction()
    {
        return $this->view->show('producto/create');
    }

    public function storeAction(){

    }

}