<?php
require 'models/Catalogo.php';
require 'models/Producto.php';
require 'models/ProductoC.php';

class CatalogoController extends Controller
{
    public function indexAction()
    {
        $model = new Catalogo();
        $catalogos = $model->listar();
        return $this->view->show('catalogo/index',['catalogos' => $catalogos]);
    }
    public function editarAction()
    {
        if(!empty($_POST))
        {
            $catalogo=new Catalogo();
            $catalogo->id=$_POST['id'];
            $catalogo->nombre=$_POST['nombre'];
            $catalogo->descripcion=$_POST['descripcion'];
            $catalogo->fechainicio=new DateTime($_POST['fechaincio']);
            $catalogo->fechafin=new DateTime($_POST['fechafin']);
            //$catalogo->show= $_POST['show'] ? 1 :0;
           if( $catalogo->actualizar())
            header('Location: index.php?controller=Catalogo&action=index');

        }

            if( !empty($_GET['id']))
            {
                $model=new Catalogo();
                $model->id=$_GET['id'];
                $catalogo=$model->buscar();
                return $this->view->show('catalogo/editar',['c' => $catalogo]);
            }
    }
    public function crearAction()
    {
        $mensaje='';
        if(!empty($_POST))
        {
            $catalogo=new Catalogo();
            $catalogo->nombre=$_POST['nombre'];
            $catalogo->descripcion=$_POST['descripcion'];
            $catalogo->fechainicio= new DateTime($_POST['inicio']);
            $catalogo->fechafin=new DateTime($_POST['fin']);
            $catalogo->show=$_POST['show'];
           $catalogo->crear();

            header('Location: index.php?controller=Catalogo&action=index');

        }
        else {
            return $this->view->show('catalogo/crear', []);
        }
    }

    //el parametro q son las bsquedas con las que se muestran los productos del catalogo
    public function productosAction()
    {
       /* echo '<pre>';
        print_r($_POST);
        echo '</pre>';
*/
        if (!empty($_POST['addProducto'])) {

            if (is_array($_POST['producto'])) {

                $cantidad = count($_POST['producto']);
                $productos = $_POST['producto'];
                $catalogo=$_POST['catalogo'];

                $productoC=new ProductoC();
                $productoC->catalogo=$catalogo;
                foreach ($productos as $p) {
                    $productoC->producto=$p;
                    $productoC->insertar();
                }
                header('Location: index.php?controller=Catalogo&action=productos&id='.$catalogo.'&q=');
            }
        }
        if(!empty($_GET['id']))
        {

            $producto=new ProductoC();
            $producto->catalogo=$_GET['id'];
            $productos = $producto->listar();

            $otrosProductos = $producto->listarOtros();
           /*echo '<pre>';
            print_r($otrosProductos);
            echo '</pre>';
*/
            return $this->view->show('catalogo/productos',[
                'productos' => $productos,
                'otrosProductos'=>$otrosProductos,
                'catalogo'=>$producto->catalogo,
            ]);
        }
    }

    public function listaOtrosProductosAction()
    {
       if($_POST)
       {
           $q=$_POST['q'];
           $producto=new ProductoC();
           $producto->catalogo=$_POST['catalogo'];;
           $otrosProductos = $producto->buscarOtrosProductos($q);
           echo json_encode($otrosProductos);
       }
    }

    public function eliminarProductoAction()
    {
        //este es el id de la tabla producto-catalogo
        if(!empty($_GET['producto']) and !empty($_GET['catalogo']))
        {
            $producto=new ProductoC();
            $producto->producto=$_GET['producto'];
            $producto->catalogo=$_GET['catalogo'];
            $producto->eliminar();
            header('Location: index.php?controller=Catalogo&action=productos&id='.$producto->catalogo);
        }

    }
    public function editarProductoAction()
    {
        //este es el id de la tabla producto-catalogo
        if(!empty($_GET['id']) && !$_POST )
        {
            $producto=new ProductoC();
            $producto->id=$_GET['id'];
            $producto = $producto->buscar();
            return $this->view->show('catalogo/editar-producto',[
                'producto' => $producto,
            ]);
        }
        else{
            if($_POST)
            {
                $producto=new ProductoC();
                $producto->id=$_POST['id'];
                $producto = $producto->buscar();
                $producto->precio=$_POST['precio'];
                if($_POST['stocknuevo'])
                {
                    $producto->stock += $_POST['stocknuevo'];
                }

                if(!empty($_POST['show']))
                {
                    $producto->show=1;
                }
                else{
                    $producto->show=0;
                }
                $producto->actualizar();
                header('Location: index.php?controller=Catalogo&action=productos&id='.$producto->catalogo);


            }else {
                echo "Pagina no encontrada";
            }
        }
    }
    public function addProductosAction()
    {
        if (!empty($_POST)) {

            $productoC=new ProductoC();
            $productoC->producto=$_POST['producto'];
            $productoC->catalogo=$_POST['catalogo'];
            $productoC->show=$_POST['show'];
            $productoC->precio=$_POST['precio'];
            $productoC->stock=$_POST['stock'];
            $productoC->insertar();
        }
    }


    public function cambiarEstadoAction()
    {
       if($_POST)
       {
           $model=new Catalogo();
           $model->id=$_POST['id'];
           $catalogo=$model->buscar();

           if($catalogo->show == 1)
           {
               $catalogo->deshabilitar();
           }
           else{
               $catalogo->habilitar();
           }
       }
    }


}