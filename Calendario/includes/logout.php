<?php

    include_once 'user_Session.php';

    $userSession = new UserSession();
    $userSession->closeSession();

    header("location: ../index.php");
?>