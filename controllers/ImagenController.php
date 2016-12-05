<?php
require 'models/Imagen.php';

class ImagenController extends Controller
{
    public function indexAction()
    {
        $model = new Imagen();
        $count = $model->ultimoId();
        return $this->view->show('imagen/index',['count' => $count]);
    }

}