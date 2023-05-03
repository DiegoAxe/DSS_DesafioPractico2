<?php
class Producto{
    public $IdProducto;
    public $NombreProducto;
    public $DescProducto;
    public $ImgProducto;
    public $IdCategoria;
    public $Precio;
    public $Existencias;
    public $nomImg;

    public function __construct($code, $nom, $desc, $img, $categ, $pre, $exist){
        $this->IdProducto  = $code;
        $this->NombreProducto  = $nom;
        $this->DescProducto  = $desc;
        $this->nomImg  = $img;
        $this->IdCategoria  = $categ;
        $this->Precio  = $pre;
        $this->Existencias  = $exist;
    }

    public function ValidacionDatos(){
        $mensaje = "";
        if(!preg_match("/^PROD[0-9]{5}$/",$this->IdProducto )){
            $mensaje .= "- Error en el Codigo Ingresado. <br>";
        }
        if(!preg_match("/^[a-zA-Z ]+$/", $this->NombreProducto )){
             $mensaje .= "- Error en el Nombre Ingresado. <br>";
        }
        $img_name = $_FILES['img']['name'];
        $extension = pathinfo($img_name, PATHINFO_EXTENSION);
        if($extension != "jpg" && $extension != "png" && $extension != "jpeg" ){  
             $mensaje .= "- Error en el tipo de Archivo Ingresado. <br>";
        }
        if($this->Precio < 0){ 
             $mensaje .= "- Error en el Precio Ingresado. <br>";
        }
        if($this->Existencias < 0){ 
             $mensaje .= "- Error en las Existencias Ingresado. <br>";
        }
        return $mensaje;
    }

    public function ExportImg(){
        $ruta_tmp = $_FILES['img']['tmp_name'];
        $ruta_final = "../imagenes/".$this->IdProducto.".png";

        // Obtener información de la imagen
        list($ancho_original, $alto_original, $tipo_imagen) = getimagesize($ruta_tmp);
        switch ($tipo_imagen) {
            case IMAGETYPE_JPEG:
                $imagen_original = imagecreatefromjpeg($ruta_tmp);
                break;
            case IMAGETYPE_PNG:
                $imagen_original = imagecreatefrompng($ruta_tmp);
                break;
            default:
                return false;
        }

        //Crear imagen con igual tamaño
        $nueva_imagen = imagecreatetruecolor($ancho_original, $alto_original);

        //Copia la imagen
        imagecopy($nueva_imagen, $imagen_original, 0, 0, 0, 0, $ancho_original, $alto_original);
        
        // Guardar la imagen
        switch ($tipo_imagen) {
            case IMAGETYPE_JPEG:
                imagejpeg($nueva_imagen, $ruta_final);
                $this->ImgProducto = $this->IdProducto.".jpg";
                break;
            case IMAGETYPE_PNG:
                imagepng($nueva_imagen, $ruta_final);
                $this->ImgProducto = $this->IdProducto.".png";
                break;
        }

    }

    public function getIdProducto(){
        return $this->IdProducto;
    }
    public function getNombreProducto(){
        return $this->NombreProducto;
    }
    public function getDescProducto(){
        return $this->DescProducto;
    }
    public function getImgProducto(){
        return $this->ImgProducto;
    }
    public function getIdCategoria(){
        return $this->IdCategoria;
    }
    public function getPrecio(){
        return $this->Precio;
    }
    public function getExistencias(){
        return $this->Existencias;
    }



}
    