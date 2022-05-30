<?php

class CanjearModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM CUPONES WHERE nombre_cupon = :name');
            $query->execute(['name'=>$datos['name']]);

            if($query->rowCount()){
                $data = $query->fetchAll(PDO::FETCH_OBJ);
                return $data[0]->porcentaje;
            }

            return 100;
        }catch(PDOException $e){
            return 100;
        }
    }
}