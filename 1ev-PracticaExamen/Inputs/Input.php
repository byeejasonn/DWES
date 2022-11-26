<?php

namespace Inputs;

class InputText extends AInput {
    use \Traits\Placeholder;

    function __construct($name, $data = null, $placeholder = '') {
        $this->type = \Enum\Type::TEXT->value;
        parent::__construct($name, $data);
    }

    function validar() {
        self::cleandata();

        if (!preg_match($this->regex, $this->data)) {
            $this->error = "$this->name tiene que tener de {self::MINLENGTH} a {self::MAXLENGTH} caracteres";
        }
    }

    function imprimirInput() {
?>
        <label><?= $this->name ?>:
            
            <input type="<?= $this->type ?>" name="<?= $this->name ?>" min="<?= $this->minlength ?>" max="<?= $this->maxlength ?>" placeholder="<?= $this->placeholder ?>" value="<?= $this->data ?>">
        </label>
<?php
    }
}