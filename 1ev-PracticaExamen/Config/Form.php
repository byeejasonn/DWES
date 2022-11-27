<?php

namespace Config;

class Form {
    public static $inputs;

    function __construct() {}

    public function crearInputs($POST) {
        new \Inputs\InputText("Nombre", $POST["Nombre"], 3, 10, "Nombre");
        new \Inputs\InputText("Apellidos", $POST["Apellidos"], 3, 20, "Apellidos");
        new \Inputs\InputRadio("Sexo", $POST["Sexo"], "Hombre", "Mujer");
        new \Inputs\InputNumber("Edad", $POST["Edad"], 10, 75);
        new \Inputs\InputDate("Fecha_nacimiento", $POST["Fecha_nacimiento"]);
        new \Inputs\Select("Localidad", $POST["Localidad"], SINGLE, "Madrid", "Alcorcón", "Getafe");
        new \Inputs\InputText("Usuario", $POST["Usuario"], 3, 20, "Usuario");
        new \Inputs\InputMail("Email", $POST["Email"], "example@example.com");
        new \Inputs\InputPassword("Contraseña", $POST["Contraseña"], 8, 16, "Contraseña");
        new \Inputs\InputCheckbox("Cursos", $POST["Cursos"], "ESO", "Bachillerato", "CFGB", "CFGM", "CFGS");
        new \Inputs\TextArea("Sobre_ti", $POST["Sobre_ti"]);
    }

    public function crearForm($action, $method) {
?>
        <form action="<?= $action ?>" method="<?= $method ?>">
            <?php
                foreach (self::$inputs as $input) {
                    $input->imprimirInput();
                }
            ?>

            <input type="submit" name="submit" value="submit">
        </form>
<?php
    }

    public function validarForm() {
        foreach (self::$inputs as $input) {
            $input->validar();
        }
    }
}