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
            $catalogo->fechainicio=$_POST['inicio'];
            $catalogo->fechafin=$_POST['fin'];
            $catalogo->show=$_POST['show'];
           if( $catalogo->actualizar())
            header('Location: index.php?controller=Catalogo&action=index');

        }

            if( !empty($_GET['id']))
            {
                $model=new Catalogo();
                $model->id=$_GET['id'];
                $catalogo=$model->editar();
                return $this->view->show('catalogo/editar',['c' => $catalogo]);
            }
    }
    public function crearAction()
    {
        if(!empty($_POST))
        {
            $catalogo=new Catalogo();
            $catalogo->nombre=$_POST['nombre'];
            $catalogo->descripcion=$_POST['descripcion'];
            $catalogo->fechainicio=$_POST['inicio'];
            $catalogo->fechafin=$_POST['fin'];
            $catalogo->show=$_POST['show'];
            if($catalogo->crear())
                header('Location: index.php?controller=Catalogo&action=index');
        }
        return $this->view->show('catalogo/crear',[]);
    }
    public function unidad_medida()
    {
        $sql = 'SELECT * FROM '.'unidad_medida ';
        $sql .= ' where id = ?';
        $params = [$this->unidad_medida];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'UnidadMedida');
        return $query->fetch();
    }
    //el parametro q son las bsquedas con las que se muestran los productos del catalogo
    public function productosAction()
    {

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
            $q=$_GET['q'];
            $producto=new ProductoC();
            $producto->catalogo=$_GET['id'];
            $productos=$producto->listar($q);

            $otrosProductos=$producto->listarOtros();
            return $this->view->show('catalogo/productos',[
                'productos' => $productos,
                'otrosProductos'=>$otrosProductos,
                'catalogo'=>$producto->catalogo,
            ]);
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

            if($producto->eliminar())
                header('Location: index.php?controller=Catalogo&action=productos&id='.$producto->catalogo.'&q=');

        }
    }
    public function addProductosAction()
    {
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
                header('Location: index.php?controller=Catalogo&action=productos');
            }
        }
    }
}