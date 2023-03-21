<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;
        $router->render('admin/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad();
        $vendedores = Vendedor::all();
        // Arreglo con mensajes de errores
        $errores = $propiedad::getErrores();
        // debuggear($_SERVER['REQUEST_METHOD']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crea una nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);

            //CREAR CARPETA
            $carpetaImagenes = '/imagenes/';

            //GENERA UN NOMBRE UNICO
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // SETEAR LA IMAGEN
            // Realiza un resize a la imagen con intervention
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            // VALIDAR
            $errores = $propiedad->validar();

            if (empty($errores)) {

                // Crear la carpeta para subir imagenes
                // if (!is_dir(CARPETA_IMAGENES)) {
                //     mkdir(CARPETA_IMAGENES);
                // }

                // Guarda la imagen en el servidor
                $image->save($carpetaImagenes . $nombreImagen);

                // Guarda en la base de datos
                $propiedad->guardar();
            }
        };

        $router->render('admin/propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarOrRedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        // Metodo Post para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad->sincronizar($_POST);
            // Asignar los atributos
            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);
            // Validacion
            $errores = $propiedad->validar();

            // Subida de Archivos
            //GENERA UN NOMBRE UNICO
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }
            // REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
            if (empty($errores)) {
                $resultado =  $propiedad->guardar();
            }
        }

        $router->render('admin/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->Eliminar();
                }
            }
        }
    }
}
