<?php
    //Esta direccion, el directiorio superior se cambiará segun la carpeta final
    require_once 'conexion.php';

    class daoUsuario{
        public function insertar($Usuario){
            $cn = new Conexion();        
            $dbh = $cn->getConexion();
            $sql = "INSERT INTO usuarios VALUES (null, :Usuario, :Correo, :Contrasena, 1, :TipoUsuario)";
            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':Usuario',$Usuario->Usuario);
                $stmt->bindParam(':Correo',$Usuario->Correo);
                $stmt->bindParam(':Contrasena',$Usuario->Contrasena);
                $stmt->bindParam(':TipoUsuario',$Usuario->TipoUsuario);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }  

        public function modificar($Usuario){
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $sql = "UPDATE usuarios SET Usuario=:nom, Correo=:email, Contrasena=:contra, TipoUsuario=:tipo WHERE IdUsuario=:code";

            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':nom',$Usuario->Usuario);
                $stmt->bindParam(':email',$Usuario->Correo);
                $stmt->bindParam(':contra',$Usuario->Contrasena);
                $stmt->bindParam(':tipo',$Usuario->TipoUsuario);
                $stmt->bindParam(':code',$Usuario->IdUsuario);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

        }

        public function eliminar($idUsuario){
            $cn = new Conexion();        
            $dbh = $cn->getConexion();
            $sql = "DELETE FROM usuarios WHERE IdUsuario=:code";
            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':code',$idUsuario);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Lo sentimos, no se puede borrar esta usuario.";
            }
        }

        public function listaClientes(){
            $sql = "SELECT * FROM usuarios WHERE TipoUsuario = 'Cliente'";
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }

        public function listaEmpleados(){
            $sql = "SELECT * FROM usuarios WHERE TipoUsuario != 'Cliente' ";
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }

        public function Correo_Contra($Correo, $Contra){
            $sql = "SELECT count(IdUsuario), u.* FROM usuarios u WHERE Correo=:email AND Contrasena=:contra";
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':email',$Correo);
            $stmt->bindParam(':contra',$Contra);
            $stmt->execute();
            $usuario = $stmt->fetch();
            return $usuario;
        }

        public function Correo_o_Usuario($Correo, $User){
            $sql = "SELECT count(IdUsuario), u.* FROM usuarios u WHERE Correo=:email OR Usuario=:user";
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':email',$Correo);
            $stmt->bindParam(':user',$User);
            $stmt->execute();
            $usuario = $stmt->fetch();
            return $usuario;
        }

        public function mostrarUsuario($idUsuario){
            $sql = "SELECT * FROM usuarios WHERE IdUsuario=:code";
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':code',$idUsuario);
            $stmt->execute();
            $usuario = $stmt->fetch();
            return $usuario;
        }

        public function cambiarEstado($idUsuario){
            $usuario = $this->mostrarUsuario($idUsuario);
            if($usuario['Habilitado'] == 1){
                $sql = "UPDATE usuarios SET Habilitado=0 WHERE IdUsuario=:code";
            }else{
                $sql = "UPDATE usuarios SET Habilitado=1 WHERE IdUsuario=:code";
            }

            $cn = new Conexion();
            $dbh = $cn->getConexion();
            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':code',$idUsuario);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

            
        }
    }
?>