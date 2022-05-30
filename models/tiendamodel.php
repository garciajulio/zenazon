<?php

class TiendaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getProductos($datos){
        try{
        
        $query=$this->db->connect()->prepare('SELECT * FROM PRODUCTOS WHERE id_privado = :unique');
        $query->execute(['unique' => $datos['unique']]);
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;

        }catch(Exception $e){
            return false;
        }
    }

    public function getProduct($datos){
        try{
        
        $query=$this->db->connect()->prepare('SELECT * FROM PRODUCTOS WHERE id_producto = :id');
        $query->execute(['id' => $datos['id']]);
            
        if($query->rowCount()){
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            $data = $data[0];
            return $data;
        }
        
        return false;
        }catch(Exception $e){
            return false;
        }
    }

    public function getTienda($datos){
        try{
        
        $query=$this->db->connect()->prepare('SELECT * FROM TIENDAS,PRODUCTOS WHERE url_tienda = :url');
        $query->execute(['url' => $datos['url']]);
        
        if($query->rowCount()){
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            $data = $data[0];
            return $data;
        }
    
        return false;
            
        }catch(Exception $e){
            return false;
        }
    }
}

?>