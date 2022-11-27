<?php

namespace Inputs;

class InputDate extends AInput {
    
    private $mindate;
    private $maxdate;
    private $minage;
    private const MINDATE = "1980-01-01";
    private const MINAGE = 18;

    function __construct($name, $data, $minage = self::MINAGE ,$mindate = self::MINDATE){
        $this->type = \Enum\Type::DATE->value;
        $this->mindate = new \DateTime($mindate, new \DateTimeZone("Europe/Madrid"));
        $this->minage = $minage;
        $this->maxdate = new \DateTime("now", new \DateTimeZone("Europe/Madrid"));
        $this->maxdate->sub(new \DateInterval("P".$this->minage."Y"));
        parent::__construct($name, $data);
    }

    function validar() {
        parent::validar();

        $this->data = new \DateTime($this->data, new \DateTimeZone("Europe/Madrid"));

        if ($this->data > $this->maxdate || $this->data < $this->mindate) {
            $this->error[] = $this->data->format("Y-m-d")." no válida";
        }

    }

    function imprimirInput() {
?>
        <div class="input">
            <label><?= str_replace("_", " ", $this->name) ?>:
                
                <input type="<?= $this->type ?>" name="<?= $this->name ?>" min="<?= $this->mindate->format("Y-m-d") ?>" max="<?= $this->maxdate->format("Y-m-d") ?>" value="<?= $this->data->format("Y-m-d") ?>" required>
    
            </label>
            
            <?php if(!empty($this->error)) : ?>
                <div class="error"><?php foreach ($this->error as $error) { echo "$error<br>"; } ?></div>
            <?php endif; ?>
        </div>
<?php
    }
}