<?php

class RecuperarModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        try{
        
        $query=$this->db->connect()->prepare('SELECT email,password FROM USUARIOS WHERE email = :email');
        $query->execute(['email'=>$datos['email']]);

        if($query->rowCount()){
            $data=$query->fetchAll(PDO::FETCH_OBJ);
            return $data[0];
        }

        return null;

        }catch(PDOException $e){
            return null;
        }
    }
}

?>