<?php
require 'models/User.php';
$auth = User::singleton();

if( $auth->isGuest() )
{
    // registrar rutas de acceso de los invitados
    switch ($controllerName)
    {
        case 'SiteController':
            // registrar acciones
            $acciones = ['loginAction',];
            if(!in_array($actionName,$acciones))
            {
                // no tiene acceso poner rutas donde mostrar error en este caso yo lo pongo q muestre ruta no encontrada
                $controllerName = '';
                $actionName = '';
            }
            break;
        // registrar mas rutas

        default :
            // no tiene acceso poner rutas donde mostrar error en este caso yo lo pongo q muestre ruta no encontrada
            $controllerName = '';
            $actionName = '';

            break;
    }

}else {

    switch ($auth->rol())
    {
        case 'ADMINISTRADOR':

            // registrar rutas de acceso al admin
                switch ($controllerName)
                {
                    case 'SiteController':

                        // registrar acciones
                        $acciones = ['indexAction','logoutAction',];

                        if(!in_array($actionName,$acciones))
                        {
                            // no tiene acceso poner rutas donde mostrar error en este caso yo lo pongo q muestre ruta no encontrada
                           if($actionName=='loginAction')
                           {
                               $actionName='indexAction';
                           }else{
                            $controllerName = '';
                            $actionName = '';
                           }
                        }
                        break;
                    case 'PedidoController':

                        // registrar acciones
                        $acciones = ['indexAction',];

                        if(!in_array($actionName,$acciones))
                        {
                            // no tiene acceso poner rutas donde mostrar error en este caso yo lo pongo q muestre ruta no encontrada
                            $controllerName = '';
                            $actionName = '';
                        }
                        break;
                    case 'ProductoController':

                        // registrar acciones
                        $acciones = ['indexAction','createAction','storeAction','editarAction','updateAction','imagenAction','eliminarImagenAction'];

                        if(!in_array($actionName,$acciones))
                        {
                            // no tiene acceso poner rutas donde mostrar error en este caso yo lo pongo q muestre ruta no encontrada
                            $controllerName = '';
                            $actionName = '';
                        }
                        break;
                    case 'ImagenController':

                        // registrar acciones
                        $acciones = ['indexAction',];

                        if(!in_array($actionName,$acciones))
                        {
                            // no tiene acceso poner rutas donde mostrar error en este caso yo lo pongo q muestre ruta no encontrada
                            $controllerName = '';
                            $actionName = '';
                        }
                        break;
                    case 'CatalogoController':

                        // registrar acciones
                        $acciones = ['indexAction','crearAction','editarAction','productosAction',
                            'eliminarProductoAction','addProductosAction','cambiarEstadoAction','listaOtrosProductosAction'];

                        if(!in_array($actionName,$acciones))
                        {
                            // no tiene acceso poner rutas donde mostrar error en este caso yo lo pongo q muestre ruta no encontrada
                            $controllerName = '';
                            $actionName = '';
                        }
                        break;
                    case 'EmpleadoController':

                        // registrar acciones
                        $acciones = ['indexAction','createAction','editarAction',];

                        if(!in_array($actionName,$acciones))
                        {
                            // no tiene acceso poner rutas donde mostrar error en este caso yo lo pongo q muestre ruta no encontrada
                            $controllerName = '';
                            $actionName = '';
                        }
                        break;
                    default :
                        // no tiene acceso poner rutas donde mostrar error en este caso yo lo pongo q muestre ruta no encontrada
                        $controllerName = '';
                        $actionName = '';
                        break;
                }
            break;

        // rol no encontrado o no tiene rol asignado
        default :
            // no tiene acceso poner rutas donde mostrar error en este caso yo lo pongo q muestre ruta no encontrada
            $controllerName = '';
            $actionName = '';
            break;

    }

}

