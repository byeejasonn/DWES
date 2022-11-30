<?php

/*
Debes definir una estructura adecuada para este problema
*/
const MIN = 1;
const MAX = 3;
$tablero = [];
$tablero = fetchTablero();

print_r($_POST);

// Serialización del tablero


$turnos = ["X", "O"];

$posX = 1;
$posY = 1;
$turno;
$errores = [];

if(isset($_POST['submit'])) {
    $posX = $_POST['posx'];
    $posY = $_POST['posy'];
    $turno = $_POST['turno'];
    echo "$posX $posY $turno";

    if ($posX < MIN || $posX > MAX) {
        $errores[] = "La posicion dada no es válida";
    }

    if ($posY < MIN || $posY > MAX) {
        $errores[] = "La posicion dada no es válida";
    }
    
    if (!empty($tablero[$posX-1][$posY-1])) {
        $errores[] = "La posicion ya está seleccionada";
    }

    if (count($errores) == 0) {
        $tablero[$posY-1][$posX-1] = $turno;
        saveTablero($tablero);
    }
}

function pintarTurnos($turnos) {
?>
    Turno:
    <select name="turno">
        <?php foreach ($turnos as $turno) : ?>
            <option value="<?= $turno ?>"><?= $turno ?></option>
        <?php endforeach; ?>
    </select>
<?php
}

function saveTablero($tablero) {
    $file = '';
    if (!empty($tablero)) {
        foreach ($tablero as $fila) {
            $file .= implode(',',$fila).";";
        }
    } else {
        $tablero = array_fill(0, 3, array_fill(0,3, ''));
    }
    
    file_put_contents('tresenraya.csv', $file);
}

function fetchTablero() {
    $file = file_get_contents("tresenraya.csv");
    if ($file == false) {
        file_put_contents('tresenraya.csv', ",,;,,;,,;");
    }

    $file = file_get_contents("tresenraya.csv");

    $tablero = explode(";", $file);
    foreach ($tablero as &$fila) {
        $fila = explode(",", $fila);
    }

    array_pop($tablero);

    print_r($tablero);

    return $tablero;
}

function pintarTablero($tablero) {
?>
    <table>
        <?php foreach($tablero as $fila) : ?>
            <tr>
                <?php foreach($fila as $celda) : ?>
                    <td><?= $celda ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
}

function pintarErrores($errores) {
    foreach ($errores as $error) :
?>
        <div class="error"><?= $error ?></div>
<?php
    endforeach;
}

?>

<html>
<head>
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
  <title>3 en Raya</title>
</head>
<body>
  <h1>3 en raya</h1>
  <?= pintarTablero($tablero) ?>
  <?= pintarErrores($errores) ?>
  <form action="" method="POST">
      <?= pintarTurnos($turnos) ?>
      <br>
      x: <input type="number" name="posx" value="<?= $posX ?>" min="<?= MIN ?>" max="<?= MAX ?>" ><br>
      y: <input type="number" name="posy" value="<?= $posY ?>" min="<?= MIN ?>" max="<?= MAX ?>"><br>
      <button type="submit" name="submit" value="submit">Jugar</button>
  </form>
</body>
</html>
