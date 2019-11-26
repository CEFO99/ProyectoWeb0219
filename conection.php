<?php

include_once 'includes/user.php';
include_once 'includes/user_session.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once 'vistas/home.php';
}else if(isset($_POST['username']) && isset($_POST['password'])){
    //echo "validacion de login";
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm, $passForm)){
        //echo "usuario validado";
        $userSession->setCurremtUser($userForm);
        $user->setUser($userForm);
        include_once 'vistas/home.php';
    }else{
        //echo "nombre de ususario y/o contraseña Incorrecta";
        $errorLogin = "nombre de ususario y/o contraseña Incorrecta";
        include_once 'login.php';
    }
}else{
    echo "login"; 
    include_once 'login.php';
}