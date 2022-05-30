<?php

class PanelModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getData($unique){
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM TIENDAS WHERE id_privado = :unique');
            $query->execute(['unique'=>$unique]);
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }catch(PDOException $e){
            return false;
        }
    }

    public function getSumTotal($unique){
        try{
            $query = $this->db->connect()->prepare('SELECT SUM(precio_total) AS precio_total FROM VENTAS WHERE id_privado = :unique');
            $query->execute(['unique'=>$unique]);
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            $data = $data[0];
            return $data;
        }catch(PDOException $e){
            return false;
        }
    }


    public function getVentas($unique){
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM VENTAS WHERE id_privado = :unique ORDER BY id_venta DESC');
            $query->execute(['unique'=>$unique]);
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }catch(PDOException $e){
            return false;
        }
    }

    public function getCupones($unique){
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM CUPONES WHERE id_privado = :unique ORDER BY id_cupon DESC');
            $query->execute(['unique'=>$unique]);
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }catch(PDOException $e){
            return false;
        }
    }

    public function getProducts($unique){
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM PRODUCTOS WHERE id_privado = :unique ORDER BY id_producto DESC');
            $query->execute(['unique'=>$unique]);
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }catch(PDOException $e){
            return false;
        }
    }

    public function editId($id,$email){
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM PRODUCTOS WHERE id_producto = :id AND owner_producto = :owner');
            $query->execute(['id' => $id,'owner' => $email]);
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }catch(PDOException $e){
            return false;
        }
    }
}

?>