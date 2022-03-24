<?php

class EliminarModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function deleteId($datos){
        try{
            $query = $this->db->connect()->prepare("DELETE FROM PRODUCTOS WHERE id_producto = :id AND owner_producto = :owner");
            $query->execute(['id'=> $datos['id'], 'owner' => $datos['email']]);
            return true;
        }catch(PDOException $e){
            print_r($e);
            return false;
        }
    }
}

?>