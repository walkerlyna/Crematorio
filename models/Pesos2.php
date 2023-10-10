<?php

namespace Model;

class Pesos2 extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'pesos2';
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
