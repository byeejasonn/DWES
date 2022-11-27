<?php

namespace Inputs;

class InputRadio extends AInput {

    function __construct($name, $data = null, ...$options) {
        $this->type = \Enum\Type::RADIO->value;
        $this->options = $options;
        parent::__construct($name, $data);
    }

    function validar() {
        
        if(!in_array($this->data, $this->options)) {
            $this->error[] = "$this->data no es una opción válida";
        }

    }

    function imprimirInput() {
?>
        <div class="input">
            <?= str_replace("_", " ", $this->name) ?>: <br>
            
            <?php foreach ($this->options as $option) :?>
                <label>
                    
                    <input type="<?= $this->type ?>" name="<?= $this->name ?>" value="<?= $option ?>" <?= ($option == $this->data)?'checked':'' ?> >
                    <?= $option ?>

                </label>
            <?php endforeach; ?>

            <?php if(!empty($this->error)) : ?>
                <div class="error"><?php foreach ($this->error as $error) { echo "$error<br>"; } ?></div>
            <?php endif; ?>
        </div>
<?php
    }
}