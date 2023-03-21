<?php

namespace Controllers;

use MVC\Router;
use Model\Blogs;
use Model\Users;
use Intervention\Image\ImageManagerStatic as Image;

class BlogsController
{

    public static function blog(Router $router)
    {
        $blogs = Blogs::all();
        $users = Users::all();
        $router->render('paginas/blog', [
            'blogs' => $blogs,
            'users' => $users
        ]);
    }

    public static function crear(Router $router)
    {
        $blogs = Blogs::all();
        $users = Users::all();
        $resultado = $_GET['resultado'] ?? null;
        $errores = Blogs::getErrores();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crea una nueva instancia
            $blogs = new Blogs($_POST['blogs']);

            //CREAR CARPETA
            $carpetaImagenes = '/imagenes/';

            //GENERA UN NOMBRE UNICO
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // SETEAR LA IMAGEN
            // Realiza un resize a la imagen con intervention
            if ($_FILES['blogs']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blogs']['tmp_name']['imagen'])->fit(800, 600);
                $blogs->setImagen($nombreImagen);
            }

            // VALIDAR
            $errores = $blogs->validar();

            if (empty($errores)) {

                // Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save($carpetaImagenes . $nombreImagen);

                // Guarda en la base de datos
                $blogs->guardar();
            }
        };
        $router->render('admin/blog/crear', [
            'blogs' => $blogs,
            'users' => $users,
            'resultado' => $resultado,
            'errores' => $errores
        ]);
    }
}
