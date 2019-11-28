<?php

include_once 'includes/user.php';
include_once 'includes/user_session.php';
/**se inica la nueva sesion */ 
$userSession = new UserSession();
$user = new User();
/**condicion si existe la sesion de user  */
if(isset($_SESSION['user'])){
    //"hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once 'calendario.php';
}else if(isset($_POST['username']) && isset($_POST['password'])){
    //"validacion de login";
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm, $passForm)){
        //"usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        include_once 'calendario.php';
    }else{
        //"nombre de ususario y/o contraseña Incorrecta";
        $errorLogin = "nombre de usuario y/o contraseña Incorrecta";
        include_once 'vistas/login.php';
    }
}else{
    echo "login"; 
    include_once 'vistas/login.php';
}
