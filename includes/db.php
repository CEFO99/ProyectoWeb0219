<?php
/**se crea una clase con variables */
class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    public function __construct(){
        $this->host     = 'localhost';
        $this->db       = 'sistema';
        $this->user     = 'root';
        $this->password = '';
        $this->charset  = 'utf8mb4';
    }
    /**se crea la funcion de la conexion  */
    function connect(){
    
        try{
            
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;
            /**se envia un error en caso del fallo de la conexion */
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}
?>
