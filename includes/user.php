<?php
include_once 'db.php';
class User extends DB{
    private $nombre;
    private $username;
    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuarioUCA WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);
        $row = $query->fetch(PDO::FETCH_NUM);
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
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarioUCA WHERE username = :user');
        $query->execute(['user' => $user]);
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
        }
    }
    public function getNombre(){
        return $this->nombre;
    }
}
?>