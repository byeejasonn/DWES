<?php

session_start();

if (isset($_SESSION['user'])) {
    header('Location: publico.php');
    die();
}

spl_autoload_register(function($class){
    $path = "./";
    $file = str_replace("\\", "/", $class);

    require("$path{$file}.php");
});

$conn = Conn::singleton()->getConn();

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email = "";
$password = "";
// $url = isset($_POST['url'])?$_POST['url']:'';
// if(empty($url)) {
//     $url = isset($_GET['url'])?$_GET['url']:Conn::singleton()->encrypt("./publico.php");
// }

if (isset($_POST['url'])) {
    $url = $_POST['url'];
} elseif (isset($_GET['url'])) {
    $url = $_GET['url'];
} else {
    $url = Conn::singleton()->encrypt("./publico.php");
}

$errorList = [];

if (isset($_POST["submit"])) {
    if (isset($_POST["email"])) {
        $email = clean_input($_POST["email"]);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorList[] = "Usuario inválido";
        //http://php.net/manual/es/filter.filters.php
    }


    if (isset($_POST["password"])) {
        $password = clean_input($_POST["password"]);
    }

    // $us = $_POST['usuario'];
    // $pass = $_POST['pass'];
    // $sql="SELECT * FROM usuarios WHERE user = ? AND password=?";

    // echo "$email <br>";
    // echo "$password <br>";

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(":email", $email);

    $stmt->execute();
    $user = $stmt->fetch();

    // print_r($user);

    if (isset($user) && password_verify($password, $user['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['user'] = explode("@", $email)[0];

        header("Location: ".Conn::singleton()->decrypt($url));
        exit;
    } else {
        $errorList[] = "Clave errónea";
    }
}

if (isset($_GET["error"])) {
    $errorList[] = $_GET["error"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>
<body>
    <!-- <p style="color:white"><?php //echo $url ?></p> -->
    <form action="login.php" method="post" class="login">
        <p>
            <label for="login">Email:</label>
            <input type="text" name="email" id="login" value="<?= $email ?>">
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?= $password ?>">
        </p>

        <?php if (count($errorList) > 0) { ?>
            <p>
                <?php foreach ($errorList as $error) { ?>
                    <div class="error"><?= $error ?></div>
                <?php } ?>
            </p>
        <?php } ?>

        <input type="hidden" name="url" value="<?= $url ?>" >

        <p class="login-submit">
            <label for="submit">&nbsp;</label>
            <button type="submit" name="submit" class="login-button">Login</button>
        </p>
    </form>
</body>
</html>


<!---
<script>alert(document.cookie);</script>
"<script>alert(document.cookie);</script>
"><script>alert(document.cookie);</script>
--->