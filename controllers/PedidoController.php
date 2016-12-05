<?php

class PedidoController extends Controller
{
    public function indexAction()
    {

        $this->view->show('pedido/inicio',[]);
    }
}