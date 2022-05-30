<?php

class ProductosModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getProductos($tienda){
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM PRODUCTOS');
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }catch(PDOException $e){
            return false;
        }
    }
}

?>