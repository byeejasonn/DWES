<?php

    // autolad (incluye los archivos de las clases que usa el programa)
    // spl_autoload_register( function ($class) {
    //     require("./clases/$class.php");
    // });
    spl_autoload_register( function ($class) {
        $class = str_replace('\\', '/',$class);
        // echo "$class<br>";
        require("./clases/$class.php");
    });

    // // singleton
    // require('./clases/Config.php');
    // // bancos
    // require('./clases/PlataformaPago.php');
    // require('./clases/BancoMalvado.php');
    // require('./clases/BitCoinConan.php');
    // require('./clases/BancoMaloMalisimo.php');
    // // juego (ejercicio completo)
    // require('./clases/Posicion.php');
    // require('./clases/Descripcion.php');
    // require('./clases/Personaje.php');
    // require('./clases/Humano.php');
    // require('./clases/Mago.php');
    // require('./clases/MagoBlanco.php');
    // require('./clases/MagoOscuro.php');
    // require('./clases/Edificio.php');
    // require('./clases/Objeto.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objetos Avanzados</title>
    <style>
        * {
            font-family: Arial;
        }
    </style>
</head>
<body>
    <h2>Singleton</h2>
    <?php

    $config1 = Config::singleton();
    $config1->setNombre('Jason');
    // podemos comprobar que el nombre que tiene el primero objeto es 'Jason'
    echo $config1->getNombre()."<br>";
    
    $config2 = Config::singleton();
    $config2->setNombre('Mario');
    
    // al ser la misma instaciacion se quedan con el nombre que se ha definido por ultima vez
    echo $config1->getNombre()."<br>";
    echo $config2->getNombre()."<br>";
    ?>

    <h2>Interfaces</h2>
    <h3>BancoMalvado</h3>
    <?php
    $bancoMalvado = new BancoMalvado();
    $bancoMalvado->estableceConexion();
    $bancoMalvado->compruebaSeguridad();
    $bancoMalvado->pagar('Jason', 10000);
    ?>

    <h3>Random entre entidades</h3>
    <?php
    $bancoBitCoin = new BitCoinConan();
    $bancoMalisimo = new BancoMaloMalisimo();

    $bancos = [$bancoMalvado, $bancoBitCoin, $bancoMalisimo];

    $bancos[mt_rand(0,2)]->pagar('Jason', 10000);
    $bancos[mt_rand(0,2)]->pagar('Mario', 10000);
    $bancos[mt_rand(0,2)]->pagar('Daniel', 10000);
    ?>

    <h2>Juego</h2>
    <?php
    $humano = new Juego\Humano();
    $humano->atacar();
    $humano->defender();
    $humano->setX(1);
    $humano->setY(2);
    $humano->setZ(3);
    echo $humano->getPosition()."<br>";
    echo "<br>";
    
    $magoBlanco = new Juego\MagoBlanco();
    $magoBlanco->atacar();
    $magoBlanco->defender();
    $magoBlanco->setX(2);
    $magoBlanco->setY(3);
    $magoBlanco->setZ(1);
    echo $magoBlanco->getPosition()."<br>";
    echo "<br>";
    
    $magoOscuro = new Juego\MagoOscuro();
    $magoOscuro->atacar();
    $magoOscuro->defender();
    $magoOscuro->setX(3);
    $magoOscuro->setY(1);
    $magoOscuro->setZ(2);
    echo $magoOscuro->getPosition()."<br>";
    echo "<br>";

    $edificio = new Juego\Edificio();
    $edificio->setAltura(15.3);
    echo $edificio->getAltura()."<br>";
    $edificio->setDescripcion('Edificio alto');
    echo $edificio->getDescripcion()."<br>";
    $edificio->setX(3);
    $edificio->setY(2);
    $edificio->setZ(1);
    echo $edificio->getPosition()."<br>";
    echo "<br>";

    $objeto = new Juego\Objeto();
    $objeto->setPeso(5.5);
    echo $objeto->getPeso()."<br>";
    $objeto->setDescripcion('Objeto pesado');
    echo $objeto->getDescripcion()."<br>";
    $objeto->setY(2);
    $objeto->setZ(1);
    $objeto->setX(3);
    echo $objeto->getPosition()."<br>";

    ?>
    
</body>
</html>