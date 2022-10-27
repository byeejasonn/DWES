<?php

    require('./clases/Circulo.php');
    require('./clases/CuentaBancaria.php');
    require('./clases/Coche.php');
    require('./clases/CocheCargado.php');
    require('./clases/CocheConRemolque.php');
    require('./clases/Usuario.php');
    require('./clases/UsuarioPremium.php');
    require('./clases/UsuarioAdmin.php');

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

        .blue {
            color: #43A6C6;
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
            $cuenta1 = new CuentaBancaria('Milloneti', 1000000);
            $cuenta2 = new CuentaBancaria('Agapito', 30345);
            $cuenta3 = new CuentaBancaria('Pobretón', 10000);

            for($i = 0; $i < 100; $i++) {
                $cuenta1->retirar(1000);
            }
            
            $cuenta2->ingresar(1200);

            print "Cuenta 1: ".$cuenta1->saldo()."<br>Cuenta 2: ".$cuenta2->saldo()."<br>Cuenta 3: ".$cuenta3->saldo()."<br>";

            $cuenta3->unir($cuenta1);

            $cuenta2->transferir($cuenta1, ($cuenta2->saldo())/2);
        ?>
        <br>
        <?= $cuenta1->mostrar() ?>
        <br>
        <?= $cuenta2->mostrar() ?>
        <br>
        <?= $cuenta3->mostrar() ?>
    </section>

    <section>
        <h2>Coche</h2>
        <h3>Coche Con Remolque</h3>
        <?php
            $bmw = new Coche(1000, 'BMW', 30);
            $renault = new CocheConRemolque(1001, 'Renault', 30, 200);
            $porche = new Coche(1002, 'Porche', 40);
            $renaultGrua = new CocheCargado(1003, 'Renault', 20, $porche);
            
            $coches = [
                $bmw,
                $renault,
                $renaultGrua
            ];

            array_walk($coches, function ($coche) {
                echo $coche->pintarInformacion()."<br>";
            });

        ?>
    </section>

    <section>
        <h2>Usuarios</h2>
        <?php

            $premium = new UsuarioPremium('Mario', 'Bros', 'Furbol');

            $premium->introducirResultado('victoria');
            $premium->introducirResultado('victoria');
            $premium->introducirResultado('victoria');

            $premium->introducirResultado('derrota');
            $premium->introducirResultado('derrota');
            $premium->introducirResultado('derrota');

            $premium->imprimirInformacion();


            $jason = new Usuario('Jason', 'Londoño Barreto', 'Fútbol');

            $jason->introducirResultado('empate');

            $jason->introducirResultado('victoria');
            $jason->introducirResultado('victoria');
            $jason->introducirResultado('victoria');
            $jason->introducirResultado('victoria');
            $jason->introducirResultado('victoria');
            $jason->introducirResultado('victoria');

            $jason->introducirResultado('derrota');
            $jason->introducirResultado('derrota');
            $jason->introducirResultado('derrota');
            $jason->introducirResultado('derrota');
            $jason->introducirResultado('derrota');
            $jason->introducirResultado('derrota');

            $jason->imprimirInformacion();


            $admin = new UsuarioAdmin('Luigi', 'Bros', 'Baloncesto');

            $admin->introducirResultado('victoria');
            $admin->introducirResultado('victoria');
            $admin->introducirResultado('victoria');

            $admin->introducirResultado('derrota');
            $admin->introducirResultado('derrota');
            $admin->introducirResultado('derrota');

            $admin->imprimirInformacion();
        ?>
    </section>
</body>
</html>
