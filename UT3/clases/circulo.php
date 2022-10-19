<?php

class Circulo {
    private $radio = 0;

    function setRadio(int $radio) {
        $this->radio = $radio;
    }

    function getRadio() {
        return $this->radio;
    }

    function getArea() {
        return M_PI * pow($this->radio,2);
    }
}
