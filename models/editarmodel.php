<?php

class EditarModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function editId($datos){
        try{
        
        $query = $this->db->connect()->prepare('UPDATE PRODUCTOS SET id_privado = :unique, nombre = :nombre, precio = :precio, informacion = :info, url_imagen = :imagen, stock = :stock WHERE id_producto = :id');
        $query -> execute(['unique' => $datos['unique'],'nombre' => $datos['nombre'], 'precio' => $datos['precio'], 'info' => $datos['info'], 'imagen' => $datos['imagen'], 'stock' => $datos['stock'], 'id' => $datos['id']]);
        return true;

        }catch(PDOException $e){
            return false;
        }
    }
}

?>