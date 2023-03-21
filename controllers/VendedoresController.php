<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class VendedoresController
{
    public static function crear(Router $router)
    {
        $vendedor = new Vendedor;
        $errores = Vendedor::getErrores();
        $resultado = $_GET['resultado'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
            // Validar que no haya campos vacios
            $errores = $vendedor->validar();
            // No hay errores
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }
        $router->render('admin/vendedores/crear', [
            'vendedor' => $vendedor,
            'resultado' => $resultado,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $errores = Vendedor::getErrores();
        $id = validarOrRedireccionar('/admin');
        $vendedor = Vendedor::find($id);
        $resultado = $_GET['resultado'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los atributos
            $args = $_POST['vendedor'];
            // Sincronizar obketo en memoria con lo que el usuario escribio
            $vendedor->sincronizar($args);
            // Vendedor Validacion
            $errores = $vendedor->validar();

            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('admin/vendedores/actualizar', [
            'vendedor' => $vendedor,
            'resultado' => $resultado,
            'errores' => $errores
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Valida el tipa a eliminar
            $tipo = $_POST['tipo'];

            // Validar el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if (validarTipoContenido($tipo)) {
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            }
        }
    }
}
