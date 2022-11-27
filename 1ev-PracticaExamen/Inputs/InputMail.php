<?php

namespace Inputs;

class InputMail extends AInput {
    use \Traits\Placeholder;
    use \Traits\RegEx;

    function __construct($name, $data = null, $placeholder = '') {
        $this->type = \Enum\Type::MAIL->value;
        $this->placeholder = $placeholder;
        $this->regex = \Enum\RegEx::MAIL->value;
        parent::__construct($name, $data);
    }

    function validar() {
        parent::validar();

        if (!preg_match($this->regex, $this->data)) {
            $this->error[] = "$this->name tiene que ser un correo válido";
        }
    }

    function imprimirInput() {
?>
        <label><?= $this->name ?>:
            
            <input type="<?= $this->type ?>" name="<?= $this->name ?>" placeholder="<?= $this->placeholder ?>" value="<?= $this->data ?>" required>

            <?php if(!empty($this->error)) : ?>
                <div class="error"><?php foreach ($this->error as $error) { echo "$error<br>"; } ?></div>
            <?php endif; ?>
        </label>
<?php
    }
}