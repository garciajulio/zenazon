<?php

class Database{

    private $db;
    private $user;
    private $password;
    private $host;
    private $charset;

    public function __construct(){
        $this->db = constant("DB");
        $this->user = constant("USER");
        $this->password = constant("PASSWORD");
        $this->charset = constant('CHARSET');
        $this->host = constant("HOST");
    }

    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES=>false,
            ];
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;
            
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}


?>