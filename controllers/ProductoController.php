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
        return $this->view->show('producto/create');
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
        else
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
            $model->id=$id;
            $producto = $model->editar();


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

    }


}