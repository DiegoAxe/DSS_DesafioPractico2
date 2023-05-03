<?php
class Categoria{
    public $IdCategoria;
    public $NombreCategoria;
    public $Descripcion;

    public function __construct($code, $nom, $desc){
        $this->IdCategoria  = $code;
        $this->NombreCategoria  = $nom;
        $this->Descripcion  = $desc;
    }

    public function getIdCategoria(){
        return $this->IdCategoria;
    }
    public function getNombreCategoria(){
        return $this->NombreCategoria;
    }
    public function getDescripcion(){
        return $this->Descripcion;
    }

}
    