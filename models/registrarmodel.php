<?php

class RegistrarModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){

        try{
        
        $query = $this->db->connect()->prepare('INSERT INTO VENTAS (precio_total,descripcion,direccion_entrega,telefono_contacto,id_privado) VALUES(:precio,:descripcion,:direccion,:telefono,:id)');

        $query -> execute(['precio' => $datos['precio'],'descripcion' => $datos['descripcion'], 'direccion' => $datos['direccion'], 'telefono' => $datos['telef'], 'id' => $datos['unique']]);

        return true;

        }catch(PDOException $e){
            return false;
        }
    }
}

?>