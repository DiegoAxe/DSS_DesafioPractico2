<?php
class Venta{
    public $IdVenta;
    public $Cantidad;
    public $FechaVenta;
    public $IdProducto;
    public $IdUsuario;

    public function __construct($code, $cant, $fecha, $product, $cliente){
        $this->IdVenta  = $code;
        $this->Cantidad  = $cant;
        $this->FechaVenta  = $fecha;
        $this->IdProducto  = $product;
        $this->IdUsuario  = $cliente;
    }

    public function getIdVenta(){
        return $this->IdVenta;
    }
    public function getCantidad(){
        return $this->Cantidad;
    }
    public function getFechaVenta(){
        return $this->FechaVenta;
    }
    public function getIdProducto(){
        return $this->IdProducto;
    }
    public function getIdUsuario(){
        return $this->IdUsuario;
    }
}
    