PDO
=========================================
testConnectionPDO.php<br>
<?php

$host = "localhost";
$dbname = "dwes";
$dsn = "mysql:host=$host;dbname=$dbname"; //data source name
$user = "byeejasonn";
$passwd = "1234";

try {
    $dbh = new PDO($dsn, $user, $passwd);

    // Utilizar la conexión aquí

    $resultado = $dbh->query('SELECT * FROM Ciclistas');

    foreach ($resultado as $fila){
      foreach ($fila as $clave => $valor){
        echo (!is_numeric($clave))?$clave . " " . $valor . "<br>":'';;
      }
      echo "--------------<br>";
    }

    // Ya se ha terminado; se cierra
    $resultado = null;
    $dbh = null;

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "\n";
    die();
}

?>