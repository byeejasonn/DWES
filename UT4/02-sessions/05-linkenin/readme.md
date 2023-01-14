- recuerdame
- email
- subir imagenes

## Script base de datos

```sql
-- DECLARE @DAY AS INT;
SET @DAY = 7;

DROP TABLE IF EXISTS token;
DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
    id int auto_increment PRIMARY KEY,
    nombre VARCHAR(255),
    passwd VARCHAR(255),
    img    VARCHAR(255),
    correo VARCHAR(255) unique,
    descripcion TEXT
);

CREATE TABLE token (
    id int auto_increment PRIMARY KEY,
    id_usuario int,
    valor VARCHAR(255),
    expiracion DATETIME DEFAULT (NOW() + INTERVAL @DAY DAY),
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

```

## Ficheros

- \+ listado.php /listado/< nombre >
- \+ detalle.php /detalle/< id >
- \+ login.php /login/
- \- logout.php /logout/
- \+ registro.php
- \- edit.php /perfil/
- \+ recuperar.php

## Composer

Instala *composer* y luego instala *dotenv* y *phpmailer*

- dotenv
```s
$ composer require vlucas/phpdotenv
```

- phpmailer
```s
$ composer require phpmailer/phpmailer
```

Para hacer que funcione correctamente *dotenv* en nuestro archivo de **init** escribiremos las siguientes tres líneas:

```php
require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
```

Y habrá que poner esto para que funcione *phpmailer*
```php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

// cambiamos el autoloader del ejemplo por el init que cargará las clases (en este ejemplo está cambiado en la clase Mailer)
require('../src/init.php');
```

Ejemplo de .env que se crea en la carpeta *src* :

```t
TITLE = "Linkenin"
DB_NAME = "linkenin"
DB_USER = "linkenin"
DB_PASS = "linkenin"
DB_HOST = "localhost"

Llamas a las variables mediante la variable global $_ENV

ejemplo -> $_ENV['DB_NAME']
```

## Mailer

Clase estatica de tres parametros:
- correo
- nombre de usuario
- subject