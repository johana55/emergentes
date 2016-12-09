<?php
require 'models/Producto.php';
require 'models/Imagen.php';

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
        $unidad_medida= new UnidadMedida();
        $unidad_medida= $unidad_medida->listar();
        $marca = new Marca();
        $marca = $marca->listar();
        $categoria = new Categoria();
        $categoria = $categoria->listar();
        return $this->view->show('producto/create',['unidad_medida' => $unidad_medida,'marca' => $marca, 'categoria' => $categoria]);
    }
    public function imagenAction()
    {
        if (!empty($_POST))
        {
            $producto_id = $_POST['producto'];//id del producto
            $error='';

            //sabemos cuantas imagenes se seleccionaron
            $cantidad= count($_FILES["imagen"]["tmp_name"]);
            for ($i=0; $i<$cantidad; $i++) {
                // Recibo los datos de la imagen
                $nombre_img = $_FILES['imagen']['name'][$i];
                $tipo = $_FILES['imagen']['type'][$i];
                $tamano = $_FILES['imagen']['size'][$i];
                //Si existe imagen y tiene un tamaño correcto
                if (($nombre_img == !NULL) && ($tamano <= 200000)) {
                    //indicamos los formatos que permitimos subir a nuestro servidor
                    if (($tipo == "image/gif") || ($tipo == "image/jpeg") || ($tipo == "image/jpg") || ($tipo == "image/png")) {

                        $extension = end(explode(".",$nombre_img));
                        // Ruta donde se guardarán las imágenes que subamos
                        $ruta='images/productos/';
                        $directorio = $_SERVER['DOCUMENT_ROOT'] . '/emergentes/'.$ruta;
                        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente


                        $imagen=new Imagen();
                        $lastIdImage=$imagen->ultimoId();
                        $lastIdImage++;
                        //el nombre de la imagen debe ser producto-imagen.extension
                        move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $directorio. $producto_id . '-'.$lastIdImage.'.'.$extension);
                        $imagen->id=$lastIdImage;
                        $imagen->url=$producto_id . '-'.$lastIdImage.'.'.$extension;
                        $imagen->producto=$producto_id;
                        $imagen->crear();


                    } else {
                        $error="formatodeimagen";
                    }
                }
                else {
                    //si existe la variable pero se pasa del tamaño permitido
                    if($nombre_img == !NULL) $error= "imagendemasiadogrande ";
                }
            }

            header('Location: index.php?controller=Producto&action=imagen&id='.$producto_id);
        }
        else{
            if(!empty($_GET['id'])){
                $model=new Imagen();
                $producto=$_GET['id'];
                $model->producto=$producto;
                $imagenes=$model->buscar();
                return $this->view->show('producto/imagen',[
                    'imagenes'=>$imagenes,
                    'producto'=>$producto,
                    'mensaje'=>'',
                ]);
            }
        }
    }
    public function eliminarImagenAction()
    {
        if(!empty($_GET['imagen']) && !empty($_GET['producto'])){
            $model=new Imagen();
            $producto=$_GET['producto'];
            $model->id=$_GET['imagen'];
            $url=$model->url;
            if($model->eliminar())
            {
                unlink('images/productos/'.$url);
                header('Location: index.php?controller=Producto&action=imagen&id='.$producto);

            }else
            {
                return $this->view->show('producto/imagen',['mensaje'=>'Error al eliminar.']);
            }
        }

    }
    public function editarAction()
    {
        if(!empty($_GET['id'])) {
            $id=$_GET['id'];
            $model = new Producto();
            $producto = $model->buscar($id);

            $modelU=new UnidadMedida();
            $umedidas=$modelU->listar();
            $modelM= new Marca();
            $marcas=$modelM->listar();
            $modelC=new Categoria();
            $categorias=$modelC->listar();

            $this->view->show('producto/editar',[
                'producto'=>$producto,
                'umedidas'=>$umedidas,
                'marcas'=>$marcas,
                'categorias'=>$categorias,
            ]);
        }
    }
    public function storeAction(){

        if(!empty($_POST['categoria']) && !empty($_POST['nombre']) &&
            !empty($_POST['descripcion']) && !empty($_POST['precio_compra'])
            && !empty($_POST['unidad_medida']) && !empty($_POST['marca'] )){

            $model = new Producto();
            $model ->categoria=$_POST['categoria'];
            $model->marca=$_POST['marca'];
            $model->nombre =$_POST['nombre'];
            $model->descripcion =$_POST['descripcion'];
            $model->precio_compra =$_POST['precio_compra'];
            $model->unidad_medida =$_POST['unidad_medida'];

            if($model->save())
            {
                header('Location: index.php?controller=Producto&action=index');
            }
            else{
                header('Location: index.php?controller=Producto&action=create');
            }
        }else{
            header('Location: index.php?controller=Producto&action=index');
        }

    }

    public function updateAction()
    {
        if( !empty($_GET['id']) &&!empty($_POST['categoria']) && !empty($_POST['nombre']) &&
            !empty($_POST['descripcion']) && !empty($_POST['precio_compra'])
            && !empty($_POST['unidad_medida']) && !empty($_POST['marca'] )){
            $id= $_GET['id'];
            $model = new Producto();
            $model = $model->buscar($id);
            $model ->categoria=$_POST['categoria'];
            $model->marca=$_POST['marca'];
            $model->nombre =$_POST['nombre'];
            $model->descripcion =$_POST['descripcion'];
            $model->precio_compra =$_POST['precio_compra'];
            $model->unidad_medida =$_POST['unidad_medida'];

            if($model->update())
            {
                header('Location: index.php?controller=Producto&action=index');
            }
            else{
                header('Location: index.php?controller=Producto&action=editar&id='.$id);
            }
        }else{
            header('Location: index.php?controller=Producto&action=index');
        }

    }


}