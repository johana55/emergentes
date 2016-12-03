<?php

class PedidoController extends Controller
{
    public function inicioAction()
    {

        $this->view->show('pedido/inicio',[]);
    }
}