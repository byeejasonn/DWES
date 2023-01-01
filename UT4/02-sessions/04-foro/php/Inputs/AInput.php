<?php

namespace php\Inputs;

use \php\Config as Config;

abstract class AInput {
    protected $type;
    protected $name;
    protected $data;
    protected $error;

    function __construct($name, $data) {
        $this->name = $name;
        $this->data = $data;
        Config\Form::setInput(":".strtolower(str_replace("ñ", "ny",$this->name)), $this);
        // Config\Form::$inputs[":".strtolower(str_replace("ñ", "ny",$this->name))] = $this;
    }

    protected function cleanData() {
        $this->data = trim($this->data);
        $this->data = stripslashes($this->data);
        $this->data = htmlspecialchars($this->data, ENT_QUOTES, "UTF-8");
    }

    // añadir validar si el campo esta vacio
    protected function validar() {
        self::cleanData();

        if(empty($this->data)) {
            $this->error[] = "El campo no puede estar vacio";
            Config\Form::addError();
            // Config\Form::$errors++;
        }
    }

    protected function imprimirErrores() {
        if(!empty($this->error)) : ?>
            <div class="error"><?php foreach ($this->error as $error) { echo "$error<br>"; } ?></div>
<?php   endif;
    }

    abstract function imprimirInput();

    function getType() {
        return $this->type;
    }

    function getData() {
        return $this->data;
    }

    function getName() {
        return $this->name;
    }

    function setError($error) {
        $this->error[] = $error;
        Config\Form::addError();
        // Config\Form::$errors++;
    }
}