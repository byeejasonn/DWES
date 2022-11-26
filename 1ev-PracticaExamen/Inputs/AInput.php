<?php

namespace Inputs;

abstract class AInput {
    protected $type;
    protected $name;
    protected $data;
    protected $error;

    function __construct($name, $data) {
        $this->name = $name;
        $this->data = $data;
        \Config\Form::$inputs[] = $this;
    }

    protected function cleanData() {
        $this->data = trim($this->data);
        $this->data = stripslashes($this->data);
        $this->data = htmlspecialchars($this->data, ENT_QUOTES, "UTF-8");
    }

    // añadir validar si el campo esta vacio
    abstract function validar();

    abstract function imprimirInput();

}