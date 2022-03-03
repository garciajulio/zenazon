<?php

class NuevoModel extends Model{

public function __construct(){
    parent::__construct();
}

public function insert($datos){

    try{
        
        $query = $this->db->connect()->prepare('INSERT INTO USUARIOS (email, password) VALUES(:email,:password)');
        $query -> execute(['email' => $datos['email'], 'password' => $datos['password']]);


        /*$query2 = $this->db->connect()->prepare('INSERT INTO TIENDAS (url_tienda, nombre_tienda,owner_tienda,info_tienda,telefono_tienda) VALUES(:url,:tienda,:email,:info,:telefono)');
        $query2 -> execute(['url' => $datos['tienda'], 'tienda' => $datos['tienda'], 'email' => $datos['email'], 'info' => $datos['info'], 'telefono' => $datos['telefono']]);*/

        return true;

    }catch(PDOException $e){

        echo $e->getMessage();
        echo "Ya existe";
        return false;
    }
    
}

}


?>