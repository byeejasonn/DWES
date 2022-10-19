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
</head>
<body>
    <section>
        <h2>Clase circulo</h2>
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
            $cuenta = new CuentaBancaria;
            
            $cuentaJason->cuentaBancaria('Jason',1000000);
            $cuenta2->cuentaBancaria('Agapito', 30345);
            $cuenta3->cuentaBancaria('Pobretón', 10000);
            $cuentaJason->ingresa(1000);
            $cuentaJason->retirar(100);

        ?>
        <p><?= "Radio: ".$circulo->getRadio()."<br>"; ?></p>
        <p><?= "Area: ".$circulo->getArea(); ?></p>
    </section>
</body>
</html>
