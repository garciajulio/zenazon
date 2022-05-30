<?php

class InicioModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        try{
        
        $query = $this->db->connect()->prepare('SELECT id_privado FROM USUARIOS WHERE email = :email AND password = :password');
        $query -> execute(['email' => $datos['email'], 'password' => $datos['password']]);

        if($query->rowCount()){
            $key = $query->fetchAll(PDO::FETCH_OBJ);
            $key = $key[0]->id_privado;
            return $key;
        }

        }catch(PDOException $e){
            return false;
        }

        return false;
    }
}

?>