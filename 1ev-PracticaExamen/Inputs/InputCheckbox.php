<?php

namespace Inputs;

class InputCheckbox extends AInput {

    private $options;

    function __construct($name, $data = null, ...$options) {
        $this->type = \Enum\Type::CHECKBOX->value;
        $this->options = $opciones;
        parent::__construct($name, $data);
    }

    function validar() {
        parent::validar();

        if (!in_array($this->data, $this->options)) {
            $this->error[] = "$this->name no es válido";
        }
    }

    function imprimirInput() {
?>
        <label><?= $this->name ?>:
            
            <input type="<?= $this->type ?>" name="<?= $this->name ?>" min="<?= $this->minlength ?>" max="<?= $this->maxlength ?>" placeholder="<?= $this->placeholder ?>" value="<?= $this->data ?>" required>

            <?php if(!empty($this->error)) : ?>
                <div class="error"><?php foreach ($this->error as $error) { echo "$error<br>"; } ?></div>
            <?php endif; ?>
        </label>
<?php
    }
}