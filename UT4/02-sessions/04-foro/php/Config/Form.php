<?php

namespace php\Config;

use PDO;
use DateTime;
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

    public function crearInputsThread($POST) {
        new Inputs\InputText("Titulo", $POST["Titulo"], 3, 30, "Titulo del hilo");
        new Inputs\TextArea("Mensaje", $POST["Mensaje"], 255);
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
        // session_start();

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

                <?php if(!isset($_SESSION['user'])) : ?>
                    <a href="register.php">Regístrate</a>
                <?php else: ?>    
                    <a href="logout.php">Cerrar Sesión</a>
                <?php endif; ?>
                
            </div>
        </form>
<?php
    }

    public function crearFormThread($action, $method) {

?>
        <form action="<?= $action ?>" method="<?= $method ?>" class="form">
            <?php
                foreach (self::$inputs as $input) {
                    $input->imprimirInput();
                }
            ?>
            
            <div class="input">
                <input type="submit" name="thread" value="Enviar">
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

    public function guardarThread($userid) {
        $conn = Conn::singleton()->getConn();

        date_default_timezone_set('Europe/Madrid');

        $stmt = $conn->prepare("INSERT INTO thread (title, body, userid, publishDate) VALUES (:titulo, :mensaje, :userid, now())");

        foreach (self::$inputs as $key => $input) {
            if ($input->getType() == Enum\Type::CHECKBOX->value || $input->getType() == Enum\Type::SELECT->value) {
                $stmt->bindValue($key, implode(";",($input->getData() == null)?[]:$input->getData()));
            } else if ($input->getType() == Enum\Type::PASSWORD->value) {
                $stmt->bindValue($key, password_hash($input->getData(), PASSWORD_DEFAULT));
            } else if($input->getType() == Enum\Type::MAIL->value) {
                $stmt->bindValue($key, $input->getData());
            } else {
                $stmt->bindValue($key, ucfirst($input->getData()));
            }
        }

        $stmt->bindParam(':userid', $userid);
        
        try {
            $stmt->execute();
        } catch(PDOException $e) {
            // echo "ERROR $e";
        }
    }

    public function getUser($datos) { 

        $conn = Conn::singleton()->getConn();

        $stmt = $conn->prepare("SELECT id, user, email, passwd FROM users where user = :usuario");

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

    public function getThreads() {

        $conn = Conn::singleton()->getConn();

        $stmt = $conn->prepare("SELECT T.id, title, body, user, publishDate FROM thread AS T LEFT JOIN users AS U ON U.id = T.userid order by publishDate desc");

        $stmt->execute();

        $thread = $stmt->fetchAll();

        return $thread;

    }

    public function getReplies($threadid) {

        $conn = Conn::singleton()->getConn();

        $stmt = $conn->prepare("SELECT R.id, threadid, user, body, publishDate FROM replies AS R LEFT JOIN users AS U ON U.id = R.userid where threadid = :threadid order by publishDate desc");

        $stmt->bindParam(":threadid", $threadid);

        $stmt->execute();

        $replies = $stmt->fetchAll();

        return $replies;

    }

    public function printThreads() {

        $threads = self::getThreads();

        foreach ($threads as $thread) : 
            $replies = self::getReplies($thread['id']);
        ?>
            <article class="thread">
                <div class="foro-header">
                    <h4 class="user"><?= $thread['user'] ?></h4>
                    <span class="date"><?= date_format(new DateTime($thread['publishDate']), "d-m-Y H:i") ?></span>
                </div>
                <h3 class="foro-title"><?= $thread['title'] ?></h3>
                <p><?= $thread['body'] ?></p>
                
                <?php if(count($replies) > 0): ?>
                    <div class="thread-replies">

                        <?php foreach ($replies as $reply): ?>
                            <div class="reply">
                                <i class="bi bi-arrow-return-right icon-reply"></i>
                                <div class="foro-header">
                                    <h4 class="user"><?= $reply['user'] ?></h4>
                                    <span class="date"><?= date_format(new DateTime($reply['publishDate']), "d-m-Y H:i") ?></span>
                                </div>
                                <p><?= $reply['body'] ?></p>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endif; ?>
                
            </article>
<?php
        endforeach;

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