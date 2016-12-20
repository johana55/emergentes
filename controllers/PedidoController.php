<?php
require 'models/Pedido.php';
require 'models/MetodoEnvio.php';
require 'models/MetodoPago.php';
class PedidoController extends Controller
{
    public function indexAction()
    {

        $this->view->show('pedido/inicio',[]);
    }

    public function indexClienteAction()
    {
        $pedidos = Pedido::misPedidos();
        $p = Pedido::obtenerPedido();
        $this->view->show('pedido/inicio_cliente',['pedidos' => $pedidos,'id'=> $p->id]);
    }

    public function addProductAction()
    {
        if(!empty($_POST))
        {
            $pedido = Pedido::obtenerPedido();
            $pedido->addProducto($_POST['id_producto'],1);
        }
    }

    public function editarAction()
    {
        if(!$_POST){
            $pedido = Pedido::obtenerPedido();
            $pedidoProducto =$pedido->pedidoProducto() ;
            $cantidad = 0;

            foreach ($pedidoProducto as $p)
            {
                $cantidad += $p->cantidad;
            }

            $this->view->show('pedido/editar',['pedido' => $pedido,
                'pedidoProducto' => $pedidoProducto,'id' => $pedido->id, 'cantidad' => $cantidad]);

        }else{

            if(!empty($_POST['actualizar']))
            {
                $pedido = Pedido::obtenerPedido();
                $pedido->addProducto($_POST['producto'],$_POST['cantidad']);
                $pedido = Pedido::obtenerPedido();
                $pedidoProducto =$pedido->pedidoProducto();
                $cantidad = 0;

                foreach ($pedidoProducto as $p)
                {
                    $cantidad += $p->cantidad;
                }

                $this->view->show('pedido/editar',['pedido' => $pedido,
                    'pedidoProducto' => $pedidoProducto,'id' => $pedido->id, 'cantidad' => $cantidad]);
            }
            if(!empty($_POST['eliminar'])){
                $pedido = Pedido::obtenerPedido();
                $pedido->deleteProducto($_POST['producto']);

                $pedido = Pedido::obtenerPedido();
                $pedidoProducto =$pedido->pedidoProducto() ;
                $cantidad = 0;

                foreach ($pedidoProducto as $p)
                {
                    $cantidad += $p->cantidad;
                }

                $this->view->show('pedido/editar',['pedido' => $pedido,
                    'pedidoProducto' => $pedidoProducto,'id' => $pedido->id, 'cantidad' => $cantidad]);
            }
        }
    }

    public function finalizarAction()
    {
        $pedido = Pedido::obtenerPedido();
        $pedidoProducto =$pedido->pedidoProducto();
        $cantidad = 0;

        foreach ($pedidoProducto as $p)
        {
            $cantidad += $p->cantidad;
        }



        return $this->view->show('pedido/finalizar',['pedido' => $pedido, 'pedidoProducto' => $pedidoProducto,'id' => $pedido->id, 'cantidad' => $cantidad,
        'envios'=>MetodoEnvio::all(),'pagos'=>MetodoPago::all(),'direccion' => $pedido->direccion()]);
    }

    // En este metodo el pedido ya se realizo solo espera la confirmacion de pago
    public function guardarAction()
    {
        $pedido = Pedido::obtenerPedido();
        $pedido->guardar();

        header('Location: index.php?controller=Pedido&action=indexCliente');
    }

    public function estadoAction()
    {
        if (!empty($_POST['id']))
        {

        }
    }
}