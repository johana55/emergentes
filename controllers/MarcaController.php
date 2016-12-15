<?php
require 'models/Marca.php';
class MarcaController extends Controller
{
    public function indexAction()
    {
        $model = new Marca();
        $marcas = $model->listar();
        return $this->view->show('marca/index',['marcas' => $marcas]);
    }
    public function createAction()
    {
        if(!empty($_POST))
        {
            $model= new Marca();
            $model->descripcion=$_POST['descripcion'];
            if($model->save()){
                header('Location: index.php?controller=Marca&action=index');

            }
            else{
                header('Location: index.php?controller=Marca&action=index');

            }

        }else
        {

            return $this->view->show('marca/create',[]);
        }


    }
    public function eliminarAction()
    {
        if(!empty($_GET['id']))
        {
            $model = new Marca();
            $marcas = $model->eliminar($_GET['id']);

        }
            header('Location: index.php?controller=Marca&action=index');


    }
    public function editarAction()
    {

        if( !empty($_POST) ){
            $model= new Marca();
            $id= $_POST['id'];
            $model->id=$id;
            $model->descripcion=$_POST['descripcion'];

            if($model->update())
            {
                header('Location: index.php?controller=Marca&action=index');
            }
            else{
                header('Location: index.php?controller=Marca&action=editar&id='.$id);
            }
        }else {
            if (!empty($_GET['id'])) {
                $id = $_GET['id'];
                $model = new Marca();
                $marca = $model->buscar($id);
                $this->view->show('marca/editar', [
                    'marca' => $marca,
                ]);
            }
        }
    }

}