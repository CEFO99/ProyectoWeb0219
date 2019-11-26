<?php

class BD{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host = 'localhost';
        $this->db = 'compras';
        $this->user = 'root';
        $this->password = "123!\".QWE";
        $this->charset = 'utf8mb4';
    }

    function connect(){
        try{
            /**coneccion a la base */
            $connection = "mysql:host" . $this->host . ";dbname=" . $this->db;;
            $options = [
                PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password,$options);
            return $pdo;
        }catch(PdoException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }

} 
?>