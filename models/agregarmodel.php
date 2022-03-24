<?php

class AgregarModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){

        try{
        
        $query = $this->db->connect()->prepare('INSERT INTO PRODUCTOS (owner_producto,nombre,precio,informacion,url_imagen,stock) VALUES(:owner,:nombre,:precio,:info,:imagen,:stock)');
        $query -> execute(['owner' => $datos['owner'],'nombre' => $datos['nombre'], 'precio' => $datos['precio'], 'info' => $datos['info'], 'imagen' => $datos['imagen'], 'stock' => $datos['stock']]);

        }catch(PDOException $e){
            return false;
        }

        return true;
    }
}

?>