<?php
    //Esta direccion, el directiorio superior se cambiará segun la carpeta final
    require_once 'conexion.php';
    class daoProducto{
        public function insertar($Producto){
            $cn = new Conexion();        
            $dbh = $cn->getConexion();
            $sql = "INSERT INTO productos VALUES (:IdProducto, :NombreProducto, :DescProducto, :ImgProducto, ";
            $sql .= ":IdCategoria, :Precio, :Existencias)";
            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':IdProducto',$Producto->IdProducto);
                $stmt->bindParam(':NombreProducto',$Producto->NombreProducto);
                $stmt->bindParam(':DescProducto',$Producto->DescProducto);
                $stmt->bindParam(':ImgProducto',$Producto->ImgProducto);
                $stmt->bindParam(':IdCategoria',$Producto->IdCategoria);
                $stmt->bindParam(':Precio',$Producto->Precio);
                $stmt->bindParam(':Existencias',$Producto->Existencias);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }  

        public function modificar($Producto){
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $sql = "UPDATE productos SET NombreProducto=:nom, DescProducto=:descrip, ImgProducto=:img, IdCategoria=:cat, ";
            $sql .= "Precio=:prec, Existencias=:exist WHERE IdProducto=:code";

            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':nom',$Producto->NombreProducto);
                $stmt->bindParam(':descrip',$Producto->DescProducto);
                $stmt->bindParam(':img',$Producto->ImgProducto);
                $stmt->bindParam(':cat',$Producto->IdCategoria);
                $stmt->bindParam(':prec',$Producto->Precio);
                $stmt->bindParam(':exist',$Producto->Existencias);
                $stmt->bindParam(':code',$Producto->IdProducto);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

        }

        public function eliminar($idProducto){
            $cn = new Conexion();        
            $dbh = $cn->getConexion();
            $sql = "DELETE FROM productos WHERE IdProducto=:code";
            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':code',$idProducto);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Lo sentimos, no se puede borrar este producto, hay ventas a su nombre.";
            }
        }

        public function listaProductos(){
            $sql = "SELECT p.*, c.NombreCategoria FROM productos p INNER JOIN categorias c ON p.IdCategoria = c.IdCategoria";
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $productos;
        }

        public function mostrarProducto($idProducto){
            $sql = "SELECT * FROM productos WHERE IdProducto=:code";
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':code',$idProducto);
            $stmt->execute();
            $producto = $stmt->fetch();
            return $producto;
        }

        public function buscarProducto($busqueda){
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $sql = "SELECT p.*, c.NombreCategoria FROM productos p INNER JOIN categorias c ON p.IdCategoria = c.IdCategoria WHERE NombreProducto LIKE '%".$busqueda."%'";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $productos;
        }

        public function CompraProducto($IdProducto, $cant){
            $ProductoActual = $this->mostrarProducto($IdProducto);
            $cant = $ProductoActual["Existencias"] - $cant;

            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $sql = "UPDATE productos SET Existencias=:cant WHERE IdProducto=:code";

            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':cant',$cant);
                $stmt->bindParam(':code',$IdProducto);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

        }

    }
?>