<?php

    require('./clases/circulo.php');
    require('./clases/cuentaBancaria.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases y objetos php</title>
    <style>
        * {
            font-family: Arial;
        }
    </style>
</head>
<body>
    <section>
        <h2>Clase Circulo</h2>
        <?php 
            $circulo = new Circulo;
            $circulo->setRadio(2); 
        ?>
        <p><?= "Radio: ".$circulo->getRadio()."<br>"; ?></p>
        <p><?= "Area: ".$circulo->getArea(); ?></p>
    </section>

    <section>
        <h2>Clase CuentaBancaria</h2>
        <?php 
            $cuenta1 = new CuentaBancaria;
            $cuenta2 = new CuentaBancaria;
            $cuenta3 = new CuentaBancaria;


            $cuenta1->cuentaBancaria('Milloneti',1000000);
            $cuenta2->cuentaBancaria('Agapito', 30345);
            $cuenta3->cuentaBancaria('Pobretón', 10000);

            for($i = 0; $i < 100; $i++) {
                $cuenta1->retirar(1000);
            }
            
            $cuenta2->ingresar(1200);

            print "Cuenta 1: ".$cuenta1->saldo."<br>Cuenta 2: ".$cuenta2->saldo."<br>Cuenta 3: ".$cuenta3->saldo."<br>";

            $cuenta3->unir($cuenta1);

            $cuenta2->transferir($cuenta1, ($cuenta2->saldo)/2);
        ?>
        <br>
        <?= $cuenta1->mostrar() ?>
        <br>
        <?= $cuenta2->mostrar() ?>
        <br>
        <?= $cuenta3->mostrar() ?>
    </section>
</body>
</html>
