<?php

class AgregarModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){

        try{
        
        $query = $this->db->connect()->prepare('INSERT INTO PRODUCTOS (id_privado,nombre,precio,informacion,url_imagen,stock) VALUES(:unique,:nombre,:precio,:info,:imagen,:stock)');
        $query -> execute(['unique' => $datos['unique'],'nombre' => $datos['nombre'], 'precio' => $datos['precio'], 'info' => $datos['info'], 'imagen' => $datos['imagen'], 'stock' => $datos['stock']]);

        }catch(PDOException $e){
            return false;
        }

        return true;
    }
}

?>