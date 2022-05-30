<?php

class EliminarModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function deleteVentaId($datos){
        try{
            $query = $this->db->connect()->prepare("DELETE FROM VENTAS WHERE id_venta = :id AND id_privado = :unique");
            $query->execute(['id'=> $datos['id'], 'unique' => $datos['unique']]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function deleteId($datos){
        try{
            $query = $this->db->connect()->prepare("DELETE FROM PRODUCTOS WHERE id_producto = :id AND id_privado = :unique");
            $query->execute(['id'=> $datos['id'], 'unique' => $datos['unique']]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}

?>