<?php

namespace php\Inputs;

use \php\Enum as Enum;
use \php\Config as Config;
use \php\Traits as Traits;

class InputPassword extends AInput {
    use Traits\Placeholder;
    use Traits\RegEx;

    private $minlength;
    private $maxlength;
    private const MINLENGTH = 8;
    private const MAXLENGTH = 16;

    function __construct($name, $data = null, $minlength = self::MINLENGTH, $maxlength = self::MAXLENGTH, $placeholder = '') {
        $this->type = Enum\Type::PASSWORD->value;
        $this->minlength = $minlength;
        $this->maxlength = $maxlength;
        $this->placeholder = $placeholder;
        $this->regex = Enum\RegEx::PASSWORD->value;
        parent::__construct($name, $data);
    }

    function validar() {
        parent::validar();

        if (!preg_match($this->regex, $this->data)) {
            $this->error[] = "$this->name tiene que tener de ".$this->minlength." a ".$this->maxlength." caracteres";
            Config\Form::$errors++;
        }
    }

    function imprimirInput() {
?>
        <div class="input">
            <label for="<?= str_replace("_", " ", $this->name) ?>" ><?= str_replace("_", " ", $this->name) ?>: </label>

            <input type="<?= $this->type ?>" name="<?= $this->name ?>" id="<?= str_replace("_", " ", $this->name) ?>" minlength="<?= $this->minlength ?>" maxlength="<?= $this->maxlength ?>" placeholder="<?= $this->placeholder ?>" value="<?= $this->data ?>" required>
            
            <?php parent::imprimirErrores() ?>
        </div>
<?php
    }
}