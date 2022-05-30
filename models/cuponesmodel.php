<?php

class CuponesModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){

        try{
        
        $query = $this->db->connect()->prepare('INSERT INTO CUPONES (nombre_cupon,porcentaje,id_privado) VALUES(:name,:percent,:unique)');
        $query -> execute(['name' => $datos['name'],'percent' => $datos['percent'], 'unique' => $datos['unique']]);
        return true;

        }catch(PDOException $e){
            return false;
        }
    }
}

?>