<?php
    class Productos extends Conectar{
        public function get_productos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM productos";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function get_productos_x_Idd($codigo) {
            $conectar = parent::conexion();
            parent::set_names();
    
            $sql = "SELECT * FROM productos WHERE codigo = ?";
            $stmt = $conectar->prepare($sql);
            $stmt->bindParam(1, $codigo);
            $stmt->execute();
    
            return $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        
        public function insert_productos($nombre, $precio, $cantidad, $fecha_vencimiento) {
            $conectar = parent::conexion();
            parent::set_names();

            $sql = "INSERT INTO productos(codigo, nombre, precio, cantidad, fecha_vencimiento) VALUES (NULL, ?, ?, ?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1, $nombre);
            $sql->bindParam(2, $precio);
            $sql->bindParam(3, $cantidad);
            $sql->bindParam(4, $fecha_vencimiento);
            $sql->execute();

            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        
        public function update_productos($codigo,$nombre,$precio,$cantidad,$fecha_vencimiento){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE productos SET nombre = ?, precio = ?, cantidad = ?, fecha_vencimiento = ? WHERE codigo = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $precio);
            $sql->bindValue(3, $cantidad);
            $sql->bindValue(4, $fecha_vencimiento);
            $sql->bindValue(5, $codigo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        


        public function delete_producto($codigo){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE productos SET
            estado = '0' 
            WHERE codigo = ?";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
            
        }
        
    
?>