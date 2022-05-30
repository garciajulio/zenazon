<?php

class ConfiguracionModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function updateStore($datos){
        try{
            $query = $this->db->connect()->prepare('UPDATE TIENDAS SET url_tienda = :url, nombre_tienda = :tienda, info_tienda = :info,  telefono_tienda = :telefono, key_paypal = :paypal WHERE id_privado = :unique');$query -> execute(['unique' => $datos['unique'], 'tienda' => $datos['tienda'], 'telefono' => $datos['telefono'], 'info' => $datos['info'], 'url' => $datos['url'], 'paypal' => $datos['paypal']]);
            return true;
            
        }catch(PDOException $e){
            return false;
        }
    }
}

?>