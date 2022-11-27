<?php

namespace Inputs;

define("SINGLE", 0);
define("MULTIPLE", 1);

class Select extends AInput {
    private $mode;
    private $options;

    function __construct($name, $data = null, $mode = self::SINGLE,...$options) {
        $this->options = $options;
        $this->mode = $mode;
        parent::__construct($name, $data);
    }

    function validar() {
        
        // hay que comprobar todas las opciones de forma individual por si fuera multiple
        foreach ($this->data as $option) {
            if (!in_array($option, $this->options)) {
                $this->error[] = "$this->name no es válido";
                // para que no se repita el error, solo ocurra una vez
                break;
            }
        }

    }

    function imprimirInput() {
        // como el select puede ser multiple lo queremos guardar en un array ponemos en el name unos "[]"
?>
        <div class="input">
            <?= str_replace("_", " ", $this->name) ?>: <br>
            
            <select name="<?= $this->name ?>[]" <?= ($this->mode)?'multiple':'' ?> >

                <?php foreach ($this->options as $option) :?>
                        <option value="<?= $option ?>" <?= in_array($option, ($this->data == null)? [] :$this->data)?'selected':'' ?> ><?= $option ?></option>
                <?php endforeach; ?>

            </select>
            
            <?php if(!empty($this->error)) : ?>
                <div class="error"><?php foreach ($this->error as $error) { echo "$error<br>"; } ?></div>
            <?php endif; ?>
        </div>
<?php
    }
}