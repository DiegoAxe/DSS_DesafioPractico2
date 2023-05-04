<?php
    //Esta direccion, el directiorio superior se cambiará segun la carpeta final
    require_once 'conexion.php';

    class daoVenta{
        public function insertar($Ventas){
            $cn = new Conexion();        
            $dbh = $cn->getConexion();
            $sql = "INSERT INTO ventas (Cantidad, IdProducto, IdUsuario) VALUES (:Cantidad, :IdProducto, :IdUsuario)";
            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':Cantidad',$Ventas->Cantidad);
                $stmt->bindParam(':IdProducto',$Ventas->IdProducto);
                $stmt->bindParam(':IdUsuario',$Ventas->IdUsuario);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }  

        public function modificar($Ventas){
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $sql = "UPDATE ventas SET Cantidad=:cant, FechaVenta=:fecha, IdProducto=:product, IdUsuario=:cliente WHERE IdVenta=:code";

            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':cant',$Ventas->Cantidad);
                $stmt->bindParam(':fecha',$Ventas->FechaVenta);
                $stmt->bindParam(':product',$Ventas->IdProducto);
                $stmt->bindParam(':cliente',$Ventas->IdUsuario);
                $stmt->bindParam(':code',$Ventas->IdVenta);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

        }

        public function eliminar($idVenta){
            $cn = new Conexion();        
            $dbh = $cn->getConexion();
            $sql = "DELETE FROM ventas WHERE IdVenta=:code";
            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':code',$idVenta);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Lo sentimos, no se puede borrar esta venta.";
            }
        }

        public function listaVentas(){
            $sql = "SELECT u.*, v.*, p.* FROM ((ventas v INNER JOIN productos p ON v.IdProducto = p.IdProducto)
            INNER JOIN usuarios u ON v.IdUsuario = u.IdUsuario);";
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $ventas;
        }

        public function mostrarVenta($idVenta){
            $sql = "SELECT u.*, v.*, p.* FROM ((ventas v INNER JOIN productos p ON v.IdProducto = p.IdProducto)
            INNER JOIN usuarios u ON v.IdUsuario = u.IdUsuario) WHERE IdVenta=:code";
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':code',$idVenta);
            $stmt->execute();
            $venta = $stmt->fetch();
            return $venta;
        }

        public function ultimaVenta(){
            $sql = "SELECT u.*, v.*, p.* FROM ((ventas v INNER JOIN productos p ON v.IdProducto = p.IdProducto)
            INNER JOIN usuarios u ON v.IdUsuario = u.IdUsuario) ORDER BY IdVenta DESC LIMIT 1";
            $cn = new Conexion();
            $dbh = $cn->getConexion();
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $venta = $stmt->fetch();
            return $venta;
        }

    }
?>