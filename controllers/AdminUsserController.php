<?php

namespace Controllers;

use MVC\Router;
use Model\ActiveRecord;
use Model\Vendedor;
use Model\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

class AdminUsserController
{
    public static function LogIn(Router $router)
    {
        $router->render('admin/log', []);
    }
}
