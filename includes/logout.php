<?php

    include_once 'user_session.php';
    /**se crea un objeto de tipo user session */
    $userSession = new UserSession();
    $userSession->closeSession();
    /**se crea la localizacion a la hora de cerrar la sesion */
    header("location: ../index.php");
?>
