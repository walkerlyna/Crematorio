<?php

namespace Model;

class Productos extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'precio', 'cantidad', 'precioPublico'];

    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $cantidad;
    public $precioPublico;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->cantidad = $args['cantidad'] ?? '';
        $this->precioPublico = $args['precioPublico'] ?? '';
    }
}
