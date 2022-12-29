<?php
    session_start();

    if(isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        unset($_SESSION['id']);
    }

    header('Location: Login.php');
    exit();
?>