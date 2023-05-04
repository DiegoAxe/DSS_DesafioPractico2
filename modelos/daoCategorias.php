<?php
    //Esta direccion, el directiorio superior se cambiará segun la carpeta final
    require_once 'conexion.php';

    class daoCategoria{
        public function insertar($Categoria){
            $cn = new Conexion();        
            $dbh = $cn->getConexion();
            $sql = "INSERT INTO categorias VALUES (null, :NombreCategoria, :Descripcion)";
            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':NombreCategoria',$Categoria->NombreCategoria);
                $stmt->bindParam(':Descripcion',$Categoria->Descripcion);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }  

        public function modificar($Categoria){
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $sql = "UPDATE categorias SET NombreCategoria=:nom, Descripcion=:descrip WHERE IdCategoria=:code";

            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':nom',$Categoria->NombreCategoria);
                $stmt->bindParam(':descrip',$Categoria->Descripcion);
                $stmt->bindParam(':code',$Categoria->IdCategoria);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

        }

        public function eliminar($idCategoria){
            $cn = new Conexion();        
            $dbh = $cn->getConexion();
            $sql = "DELETE FROM categorias WHERE IdCategoria=:code";
            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':code',$idCategoria);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Lo sentimos, no se puede borrar esta categoria, hay productos que lo utilizan.";
            }
        }

        public function listaCategorias(){
            $sql = "SELECT * FROM categorias";
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categorias;
        }

        public function mostrarCategoria($idCategoria){
            $sql = "SELECT * FROM categorias WHERE IdCategoria=:code";
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':code',$idCategoria);
            $stmt->execute();
            $categoria = $stmt->fetch();
            return $categoria;
        }

    }
?>