<?php

namespace Inputs;

class InputPassword extends AInput {
    use \Traits\Placeholder;
    use \Traits\RegEx;

    private $minlength;
    private $maxlength;
    private const MINLENGTH = 8;
    private const MAXLENGTH = 16;

    function __construct($name, $data = null, $minlength = self::MINLENGTH, $maxlength = self::MAXLENGTH, $placeholder = '') {
        $this->type = \Enum\Type::PASSWORD->value;
        $this->minlength = $minlength;
        $this->maxlength = $maxlength;
        $this->placeholder = $placeholder;
        $this->regex = \Enum\RegEx::PASSWORD->value;
        parent::__construct($name, $data);
    }

    function validar() {
        parent::validar();

        if (!preg_match($this->regex, $this->data)) {
            $this->error[] = "$this->name tiene que tener de ".$this->minlength." a ".$this->maxlength." caracteres";
            \Config\Form::$errors++;
        }
    }

    function imprimirInput() {
?>
        <div class="input">
            <label><?= str_replace("_", " ", $this->name) ?>:
                
                <input type="<?= $this->type ?>" name="<?= $this->name ?>" minlength="<?= $this->minlength ?>" maxlength="<?= $this->maxlength ?>" placeholder="<?= $this->placeholder ?>" value="<?= $this->data ?>" required>
    
            </label>
            
            <?php parent::imprimirErrores() ?>
        </div>
<?php
    }
}