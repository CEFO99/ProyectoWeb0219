<?php

include_once 'includes/user.php';
include_once 'includes/user_session.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 1:
            header('location: calendario.php');
        break;
        case 2:
        header('location: home.php');
        break;
        default:
    }
}

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once 'calendario.php';
}else if(isset($_POST['username']) && isset($_POST['password'])){
    //echo "validacion de login";
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm, $passForm)){
        //echo "usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        include_once 'calendario.php';
    }else{
        //echo "nombre de ususario y/o contraseña Incorrecta";
        $errorLogin = "nombre de usuario y/o contraseña Incorrecta";
        include_once 'vistas/login.php';
    }
}else{
    echo "login"; 
    include_once 'vistas/login.php';
}
