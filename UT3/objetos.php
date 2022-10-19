<?php

    require('./clases/circulo.php');

    $circulo = new Circulo;

    $circulo->setRadio(2);
    echo "Radio: ".$circulo->getRadio()."<br>";
    echo "Area: ".$circulo->getArea();
?>