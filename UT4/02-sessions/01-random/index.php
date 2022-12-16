<?php
session_start();

const MIN=0;
const MAX=10;
const INTENTOS=3;

if(isset($_GET['restart'])) {
    $_SESSION['num'] = rand(MIN,MAX);
    $_SESSION['intentos'] = INTENTOS;  
    header('Location: index.php');
}

$num = isset($_SESSION['num'])?$_SESSION['num']:rand(MIN,MAX);
$intentos = isset($_SESSION['intentos'])?$_SESSION['intentos']:INTENTOS;
$guess = 0;
$error = true;

$_SESSION['num'] = $num;
$_SESSION['intentos'] = $intentos;

// print_r($_SESSION);
// print_r($_POST);
if(isset($_POST['enviar'])) {
    $guess = $_POST['num'];
    if($num != $guess) {
        $_SESSION['intentos']--;
        $error = true;
        // header('Location: index.php?error');
    } else {
        $error = false;
    }
}

function mensaje($error, $guess, $num) {
    if($error) :
?>
        <p class="error">Número erróneo</p>
<?php
        if ($num > $guess) :
?>
            <p>El número es mayor de <?= $guess ?></p>
<?php
        elseif($num < $guess) :
?>
            <p>El número es menor de <?= $guess ?></p>
<?php
        endif;
    else:
?>
        <p class="success">Correcto</p>
<?php
    endif;

}

function finish($error) {
    if(!$error || $_SESSION['intentos'] == 0){
        return "disabled";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .input {
            margin: 12px 0;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <main class="main">

        <?= mensaje($error, $guess, $num) ?>
        <h3>Te quedan <?= $intentos ?> intentos</h3>
        <form action="" method="POST">
            <div class="input">
                <label for="">
                    Número: <input type="number" name="num" min="<?= MIN ?>" max="<?= MAX ?>" value="<?= $guess ?>" <?= finish($error) ?> >
                </label>
            </div>

            <div class="input">
                <input type="submit" value="Enviar" name="enviar" <?= finish($error) ?> >
            </div>
        </form>
        <a href="./index.php?restart">Reiniciar</a>
    </main>
</body>
</html>