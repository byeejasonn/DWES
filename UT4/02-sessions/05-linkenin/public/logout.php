<?php

require('../src/init.php');

if(isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    unset($_SESSION['id']);
}

header('Location: listado.php');