<?php

namespace Model;

class Clientes extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'clientes';
    protected static $columnasDB = ['id', 'Nombre_Cliente', 'RFC', 'Correo_Cliente', 'Forma_Pago', 'Regimen_Fiscal', 'Uso_CFDI', 'DomicilioC'];

    public $id;
    public $Nombre_Cliente;
    public $RFC;
    public $Correo_Cliente;
    public $Forma_Pago;
    public $Regimen_Fiscal;
    public $Uso_CFDI;
    public $DomicilioC;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->Nombre_Cliente = $args['Nombre_Cliente'] ?? '';
        $this->RFC = $args['RFC'] ?? '';
        $this->Correo_Cliente = $args['Correo_Cliente'] ?? '';
        $this->Forma_Pago = $args['Forma_Pago'] ?? '';
        $this->Regimen_Fiscal = $args['Regimen_Fiscal'] ?? '';
        $this->Uso_CFDI = $args['Uso_CFDI'] ?? '';
        $this->DomicilioC = $args['DomicilioC'] ?? '';
    }
}
