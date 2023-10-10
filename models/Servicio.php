<?php

namespace Model;

class Servicio extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'servicio';
    protected static $columnasDB = ['id', 'fecha', 'nombre', 'motivo', 'especie', 'peso_kg', 'sexo', 'nombreDueño', 'numeroContacto', 'domicilio', 'cliente', 'autorizacion', 'evidencia', 'certificado', 'estado', 'pdf', 'rfc', 'video', 'remisiones', 'comprobante', 'observaciones'];

    public $id;
    public $fecha;
    public $nombre;
    public $motivo;
    public $especie;
    public $peso_kg;
    public $sexo;
    public $nombreDueño;
    public $numeroContacto;
    public $domicilio;
    public $cliente;
    public $autorizacion;
    public $evidencia;
    public $certificado;
    public $estado;
    public $pdf;
    public $rfc;
    public $video;
    public $remisiones;
    public $comprobante;
    public $observaciones;
    

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->motivo = $args['motivo'] ?? '';
        $this->especie = $args['especie'] ?? '';
        $this->peso_kg = isset($args['peso_kg']) ? (float) $args['peso_kg'] : null;;
        $this->sexo = $args['sexo'] ?? '';
        $this->nombreDueño = $args['nombreDueño'] ?? '';
        $this->numeroContacto = $args['numeroContacto'] ?? '';
        $this->domicilio = $args['domicilio'] ?? '';
        $this->cliente = $args['cliente'] ?? '';
        $this->autorizacion = $args['autorizacion'] ?? '';
        $this->evidencia = $args['evidencia'] ?? '';
        $this->certificado = $args['certificado'] ?? '';
        $this->estado = $args['estado'] ?? 0;
        $this->pdf = $args['pdf'] ?? '';
        $this->rfc = $args['rfc'] ?? '';
        $this->video = $args['video'] ?? '';
        $this->remisiones = $args['remisiones'] ?? '';
        $this->comprobante = $args['comprobante'] ?? '';
        $this->observaciones = $args['observaciones'] ?? '';
    }

    public static function obtenerClientesAutocompletado($term) {
        $query = "SELECT cliente FROM " . static::$tabla . " WHERE cliente LIKE '%" . self::$db->escape_string($term) . "%' GROUP BY cliente";
        $resultados = self::consultarSQL($query);
    
        $clientes = array();
        foreach ($resultados as $resultado) {
            $cliente = array(
                'nombre' => $resultado->cliente
            );
            $clientes[] = $cliente;
        }
    
        return $clientes;
    }

}
