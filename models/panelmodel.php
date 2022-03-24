<?php

class PanelModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getProducts($email){
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM PRODUCTOS WHERE owner_producto = :owner ORDER BY id_producto DESC');
            $query->execute(['owner'=>$email]);
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