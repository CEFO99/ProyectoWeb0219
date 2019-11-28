<?php
/**Se realiza la sesion y se inicia */
class userSession{
    public function __construct(){
        session_start();
    }
    /**se crea una funcion para agrega un valor a la sesion actual */
    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }
    /**devuelve el valor de la sesion anterior */
    public function getCurrentUser(){
        return $_SESSION['user'];
    }
    /**cierra y destruye las sessiones */
    public function closeSession(){
        session_unset();
        session_destroy();
    }
}
?>