<?php
include_once 'db.php';
/**Se crea una funcion para guardar los datos que se registraran en la base*/
class User extends DB{
    private $nombre;
    private $username;
    /**funcion para validar si existe el usuario */
    public function userExists($user, $pass){
        $md5pass = md5($pass);
        /**Se crea la conexion a la base de datos  y se selecciona la tabla*/
        $query = $this->connect()->prepare('SELECT * FROM usuarioUCA WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);
        $row = $query->fetch(PDO::FETCH_NUM);
        /**se crea una condicion para validar si el login es correcto*/
        if($row == true){
            // validar rol
            $rol = $row[4];
            $_SESSION['rol'] = $rol;
            switch($_SESSION['rol']){
                case 1:
                    header('location: calendario.php');
                break;
    
                case 2:
                header('location: home.php');
                break;
    
                default:
            }
        }else{
            // no existe el usuario
            echo "El usuario o contraseña son incorrectos";
        }
    }
    /** Se valida el nombre del usuario*/
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarioUCA WHERE username = :user');
        $query->execute(['user' => $user]);
        /**Se obtiene la columna del nombre y el username */
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
        }
    }
    /**Obtiene el nombre de la variable nombre y lo retorna */
    public function getNombre(){
        return $this->nombre;
    }
}
?>