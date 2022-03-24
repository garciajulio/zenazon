<?php

class InicioModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        try{
        
        $query = $this->db->connect()->prepare('SELECT * FROM USUARIOS WHERE email = :email AND password = :password');
        $query -> execute(['email' => $datos['email'], 'password' => $datos['password']]);

        }catch(PDOException $e){
            return false;
        }

        if($query->rowCount()){
            return true;
        }

        return false;

    }
}

?>