<?php
class Usuario{
    public $IdUsuario;
    public $Usuario;
    public $Correo;
    public $Contrasena;
    public $Habilitado;
    public $TipoUsuario;

    public function __construct($code, $nom, $email, $contra, $habil, $tipo){
        $this->IdUsuario  = $code;
        $this->Usuario  = $nom;
        $this->Correo  = $email;
        $this->Contrasena  = $contra;
        $this->Habilitado  = $habil;
        $this->TipoUsuario  = $tipo;
    }

    public function getIdUsuario(){
        return $this->IdUsuario;
    }
    public function getUsuario(){
        return $this->Usuario;
    }
    public function getCorreo(){
        return $this->Correo;
    }
    public function getContrasena(){
        return $this->Contrasena;
    }
    public function getHabilitado(){
        return $this->Habilitado;
    }
    public function getTipoUsuario(){
        return $this->TipoUsuario;
    }
}
    