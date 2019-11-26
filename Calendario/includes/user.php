<?php

include_once 'db.php';

class user extends DB{
    private $nombre;
    private $username;

    public function userExists($user,$pass){
        $md5pass = md5($pass);
        /** Colocar la tabla de la base de datos */
        $query = $this->connect()->prepare('Select*from usuario WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        /**Selecionar la tabla del usuario */
        $query = $this->connect()->prepare('SELECT*FROM usuario WHERE username = :user');
        $query->execute(['user'=>$user]);
        foreach($query as $currentUser){
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}
?>