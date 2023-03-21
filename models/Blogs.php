<?php

namespace Model;

use JetBrains\PhpStorm\Internal\ReturnTypeContract;


class Blogs extends ActiveRecord
{
    protected static $tabla = 'blogs';
    protected static $columnasDb = ['id', 'titulo', 'descripcion', 'imagen', 'creado', 'usuarios_id'];

    public $id;
    public $titulo;
    public $descripcion;
    public $imagen;
    public $creado;
    public $usuarios_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->creado = date('Y/m/d');
        $this->usuarios_id = $args['usuarios_id'] ?? '';
    }

    public function validar()
    {
        // REVISAR QUE CADA CAMPO TENGA SUS VALORES ASIGNADOS
        if (!$this->titulo) {
            self::$errores[] = "Debes insertar un titulo";
        };

        if (!$this->descripcion || strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es obligatorio, y debe tener al menos 50 caracteres";
        };

        if (!$this->imagen) {
            self::$errores[] = "La imagen es requerida";
        };

        return self::$errores;
    }
}
