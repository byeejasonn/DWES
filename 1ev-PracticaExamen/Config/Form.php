<?php

namespace Config;

class Form {
    public static $inputs;

    function __construct() {}

    public function crearInputs($POST) {
        new \Inputs\InputText("Nombre", $POST["Nombre"], 3, 10, "Nombre");
    }

    public function crearForm($action, $method) {
?>
        <form action="<?= $action ?>" method="<?= $method ?>">
            <?php
                foreach (self::$inputs as $input) {
                    $input->validar();
                    $input->imprimirInput();
                }
            ?>

            <input type="submit" name="submit" value="submit">
        </form>
<?php
    }
}