<?php

namespace php\Inputs;

use \php\Enum as Enum;
use \php\Config as Config;

class TextArea extends AInput {

    private $maxlength;
    private const MAXLENGTH = 255;
    
    function __construct($name, $data, $maxlength = self::MAXLENGTH) {
        $this->type = Enum\Type::TEXTAREA->value;
        $this->maxlength = $maxlength;
        parent::__construct($name, $data);
    }

    function validar() {
        parent::cleanData();
    }

    function imprimirInput() {
?>
        <div class="input">
            <?= str_replace("_", " ", $this->name) ?>:
            <textarea name="<?= $this->name ?>" maxlength="<?= $this->maxlength ?>" id="<?= str_replace("_", " ", $this->name) ?>"><?= $this->data ?></textarea>
        </div>
<?php
    }
}