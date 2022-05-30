<?php

class NuevoModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        try{
        
        $query2 = $this->db->connect()->prepare('INSERT INTO TIENDAS (url_tienda,id_privado,nombre_tienda,info_tienda,telefono_tienda) VALUES(:url,:unique,:tienda,:info,:telefono)');
        $query2 -> execute(['url' => $datos['url'],'unique'=>$datos['unique'],'tienda' => $datos['tienda'], 'info' => $datos['info'], 'telefono' => $datos['telefono']]);


        $query = $this->db->connect()->prepare('INSERT INTO USUARIOS (email, password,id_privado) VALUES(:email,:password,:id)');
        $query -> execute(['email' => $datos['email'], 'password' => $datos['password'],'id' => $datos['unique']]);

        return true;

        }catch(PDOException $e){
            print_r($e);
            return false;
        }
    }
}

?>