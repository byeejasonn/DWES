<?php

namespace php\Inputs;

use \php\Enum as Enum;
use \php\Config as Config;
use \php\Traits as Traits;

class InputMail extends AInput {
    use Traits\Placeholder;
    use Traits\RegEx;

    private $maxlength;
    private const MAXLENGTH = 30;

    function __construct($name, $data = null, $placeholder = '', $maxlength = self::MAXLENGTH) {
        $this->type = Enum\Type::MAIL->value;
        $this->placeholder = $placeholder;
        $this->$maxlength = $maxlength;
        $this->regex = Enum\RegEx::MAIL->value;
        parent::__construct($name, $data);
    }

    function validar() {
        parent::validar();

        if (!preg_match($this->regex, $this->data)) {
            $this->error[] = "$this->name tiene que ser un correo válido";
            Config\Form::$errors++;
        }
    }

    function imprimirInput() {
?>
        <div class="input">
            <label for="<?= str_replace("_", " ", $this->name) ?>" ><?= str_replace("_", " ", $this->name) ?>: </label>

            <input type="<?= $this->type ?>" name="<?= $this->name ?>" id="<?= str_replace("_", " ", $this->name) ?>" placeholder="<?= $this->placeholder ?>" value="<?= $this->data ?>" maxlength="<?= $this->maxlength ?>" required>
            
            <?php parent::imprimirErrores() ?>

        </div>
<?php
    }
}