<?php

namespace Inputs;

class InputText extends AInput {
    use \Traits\Placeholder;
    use \Traits\RegEx;

    private $minlength;
    private $maxlength;
    private const MINLENGTH = 3;
    private const MAXLENGTH = 12;

    function __construct($name, $data = null, $minlength = self::MINLENGTH, $maxlength = self::MAXLENGTH, $placeholder = '') {
        $this->type = \Enum\Type::TEXT->value;
        $this->placeholder = $placeholder;
        $this->regex = \Enum\RegEx::TEXT->value;
        parent::__construct($name, $data);
    }

    function validar() {
        self::cleandata();

        if (!preg_match($this->regex, $this->data)) {
            $this->error = "$this->name tiene que tener de ".self::MINLENGTH." a ".self::MAXLENGTH." caracteres";
        }
    }

    function imprimirInput() {
?>
        <label><?= $this->name ?>:
            
            <input type="<?= $this->type ?>" name="<?= $this->name ?>" min="<?= $this->minlength ?>" max="<?= $this->maxlength ?>" placeholder="<?= $this->placeholder ?>" value="<?= $this->data ?>">

            <?php if(!empty($this->error)) : ?>
                <div class="error"><?= $this->error ?></div>
            <?php endif; ?>
        </label>
<?php
    }
}