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
            $acciones = ['inicioAction','loginAction','logoutAction'];
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
                        $acciones = ['inicioAction','loginAction','logoutAction',];

                        if(!in_array($actionName,$acciones))
                        {
                            // no tiene acceso poner rutas donde mostrar error en este caso yo lo pongo q muestre ruta no encontrada
                            $controllerName = '';
                            $actionName = '';
                        }
                        break;
                    case 'PedidoController':

                        // registrar acciones
                        $acciones = ['inicioAction',];

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
            break;

        // rol no encontrado o no tiene rol asignado
        default :
            // no tiene acceso poner rutas donde mostrar error en este caso yo lo pongo q muestre ruta no encontrada
            $controllerName = '';
            $actionName = '';
            break;

    }

}

