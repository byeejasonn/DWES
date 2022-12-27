<?php

namespace php\Config;

use PDOException;
use \php\Inputs as Inputs;
use \php\Enum as Enum;

class Form {
    public static $inputs;
    public static $errors;

    function __construct() {}
    
    public function crearInputs($POST) {
        new Inputs\InputText("Usuario", $POST["Usuario"], 3, 20, "Nombre de usuario");
        new Inputs\InputMail("Email", $POST["Email"], "example@example.com", 30);
        new Inputs\InputPassword("Contraseña", $POST["Contraseña"], 8, 16, "Contraseña");
        // print_r(implode(", ",array_keys(self::$inputs)));
    }

    public function crearInputsRegister($POST) {
        new Inputs\InputText("Usuario", $POST["Usuario"], 3, 20, "Nombre de usuario");
        new Inputs\InputMail("Email", $POST["Email"], "example@example.com", 30);
        new Inputs\InputPassword("Contraseña", $POST["Contraseña"], 8, 16, "Contraseña");
        // print_r(implode(", ",array_keys(self::$inputs)));
    }

    public function crearInputsLogin($POST) {
        new Inputs\InputText("Usuario", $POST["Usuario"], 3, 20, "Nombre de usuario");
        new Inputs\InputPassword("Contraseña", $POST["Contraseña"], 8, 16, "Contraseña");
        // print_r(implode(", ",array_keys(self::$inputs)));
    }

    public function crearForm($action, $method) {

        if(isset($_GET['success'])) : ?>
            <div class="success">Usuario añadido con exito</div>
<?php   endif;?>
        <form action="<?= $action ?>" method="<?= $method ?>" class="form">
            <?php
                foreach (self::$inputs as $input) {
                    $input->imprimirInput();
                }
            ?>
            
            <div class="input">
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
<?php
    }

    public function crearFormRegister($action, $method) {

        if(isset($_GET['success'])) : ?>
            <div class="success">Usuario añadido con exito</div>
<?php   endif;?>
        <form action="<?= $action ?>" method="<?= $method ?>" class="form">
            <?php
                foreach (self::$inputs as $input) {
                    $input->imprimirInput();
                }
            ?>
            
            <div class="input">
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
<?php
    }

    public function crearFormLogin($action, $method) {

        if(isset($_GET['success'])) : ?>
            <div class="success">Usuario añadido con exito</div>
<?php   endif;?>
        <form action="<?= $action ?>" method="<?= $method ?>" class="form">
            <?php
                foreach (self::$inputs as $input) {
                    $input->imprimirInput();
                }
            ?>
            
            <div class="input">
                <input type="submit" name="submit" value="Login">
            </div>

            <div class="login__links">
                <a href="logout.php">Cerrar Sesión</a>
                <a href="register.php">Regístrate</a>
            </div>
        </form>
<?php
    }

    public function validarForm() {
        foreach (self::$inputs as $input) {
            $input->validar();
        }
    }

    public function esValido() {
        return (self::$errors == 0);
    }

    public function guardarBBDD() {
        $conn = Conn::singleton()->getConn();

        $stmt = $conn->prepare("INSERT INTO PracticaExamen (Nombre, Apellidos, Genero, Edad, FechaNacimiento, Localidad, Usuario, Email, Contrasenya, Cursos, SobreTi) VALUES (:nombre, :apellidos, :genero, :edad, :fecha_nacimiento, :localidad, :usuario, :email, :contrasenya, :cursos, :sobre_ti)");

        foreach (self::$inputs as $key => $input) {
            if ($input->getType() == Enum\Type::CHECKBOX->value || $input->getType() == Enum\Type::SELECT->value) {
                $stmt->bindValue($key, implode(";",($input->getData() == null)?[]:$input->getData()));
            } else if ($input->getType() == Enum\Type::PASSWORD->value) {
                $stmt->bindValue($key, password_hash($input->getData(), PASSWORD_DEFAULT));
            } else if($input->getType() == Enum\Type::MAIL->value) {
                $stmt->bindValue($key, $input->getData());
            } else {
                $stmt->bindValue($key, ucwords($input->getData()));
            }
        }

        $stmt->execute();
    }

    public function guardarUser() {
        $conn = Conn::singleton()->getConn();

        $stmt = $conn->prepare("INSERT INTO users (user, email, passwd) VALUES (:usuario, :email, :contrasenya)");

        foreach (self::$inputs as $key => $input) {
            if ($input->getType() == Enum\Type::CHECKBOX->value || $input->getType() == Enum\Type::SELECT->value) {
                $stmt->bindValue($key, implode(";",($input->getData() == null)?[]:$input->getData()));
            } else if ($input->getType() == Enum\Type::PASSWORD->value) {
                $stmt->bindValue($key, password_hash($input->getData(), PASSWORD_DEFAULT));
            } else if($input->getType() == Enum\Type::MAIL->value) {
                $stmt->bindValue($key, $input->getData());
            } else {
                $stmt->bindValue($key, ucwords($input->getData()));
            }
        }
        
        try {
            $stmt->execute();
        } catch(PDOException $e) {
            self::$inputs[":usuario"]->setError("Nombre de usuario ya en uso");
            self::$inputs[":email"]->setError("Email ya en uso");
        }
    }

    public function getUser($datos) { 

        $conn = Conn::singleton()->getConn();

        $stmt = $conn->prepare("SELECT user, email, passwd FROM users where user = :usuario");

        $stmt->bindParam(":usuario", $datos["Usuario"]);
        $stmt->execute();

        $user = $stmt->fetch();

        if (!empty($user)) {
            return $user;
        } else {
            self::$inputs[":usuario"]->setError("Usuario inválido");
            self::$inputs[":contrasenya"]->setError("Contraseña inválida");
        }
    }

    public function validateUser($data, $user) {
        return password_verify($data['Contraseña'], $user['passwd']);
    }

    public function getListado() {
        $conn = Conn::singleton()->getConn();
        
        $stmt = $conn->query("SELECT id, Nombre, Apellidos, Genero, Edad, fechanacimiento as 'Fecha Nacimiento', Localidad, Usuario, Email, Cursos FROM PracticaExamen");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function deleteRegistros($post) {
        $conn = Conn::singleton()->getConn();

        $stmt = $conn->prepare(sprintf("DELETE FROM PracticaExamen WHERE id IN (%s)", implode(", ",array_fill(0, count($post), "?"))));

        return $stmt->execute($post);
    }
}