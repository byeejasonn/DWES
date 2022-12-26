<?php

namespace php\Inputs;

use \php\Enum as Enum;
use \php\Config as Config;

class InputNumber extends AInput {

    private $min;
    private $max;
    private $step;
    private const MIN = 0;
    private const MAX = 99;
    private const STEP = 1;

    function __construct($name, $data = null, $min = self::MIN, $max = self::MAX, $step = self::STEP) {
        $this->type = Enum\Type::NUMBER->value;
        $this->min = $min;
        $this->max = $max;
        $this->step = $step;
        parent::__construct($name, $data);
    }

    function validar() {
        parent::validar();

        if ($this->data < $this->min || $this->data > $this->max) {
            $this->error[] = "$this->name tiene que estar comprendido entre $this->min y $this->max";
            Config\Form::$errors++;
        }
    }

    function imprimirInput() {
?>
        <div class="input">
            <label for="<?= str_replace("_", " ", $this->name) ?>" ><?= str_replace("_", " ", $this->name) ?>: </label>
            
            <input type="<?= $this->type ?>" name="<?= $this->name ?>" id="<?= str_replace("_", " ", $this->name) ?>" min="<?= $this->min ?>" max="<?= $this->max ?>" step="<?= $this->step ?>" value="<?= $this->data ?>" required>
            
            <?php parent::imprimirErrores() ?>

        </div>
<?php
    }
}