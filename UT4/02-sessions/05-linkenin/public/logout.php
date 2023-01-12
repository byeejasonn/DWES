<?php

require('../src/init.php');

if(isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

header('Location: listado.php');