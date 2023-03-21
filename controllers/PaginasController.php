<?php

namespace Controllers;

use MVC\Router;
use Model\ActiveRecord;
use Model\Vendedor;
use Model\Propiedad;
use Model\blogs;
use Intervention\Image\ImageManagerStatic as Image;

class PaginasController
{
    public static function index(Router $router)
    {
        $propiedad = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedad,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router)
    {
        $id = validarOrRedireccionar('/propiedades');
        // Buscar propiedad por su id
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad', [
            'id' => $id,
            'propiedad' => $propiedad
        ]);
    }

    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada', []);
    }

    public static function contacto(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        $router->render('/paginas/contacto', []);
    }
}
